<?php

declare(strict_types=1);

namespace tests\models;

use Codeception\Test\Unit;
use UnitTester;
use Yii;
use app\models\AvatarDownloadForm;
use yii\web\Response;

use function fclose;
use function fseek;
use function hash;
use function is_array;
use function sprintf;
use function stream_get_contents;

use const SEEK_SET;

final class AvatarDownloadFormTest extends Unit
{
    protected UnitTester $tester;

    public function testInvalidInputs(): void
    {
        $oldEnv = $this->tester->english();

        $model = Yii::createObject(AvatarDownloadForm::class);
        $this->assertFalse($model->validate());

        foreach (['category', 'file'] as $attr) {
            $this->assertTrue($model->hasErrors($attr));
            $this->assertStringContainsString(' cannot be blank.', $model->getFirstError($attr));
        }

        unset($oldEnv);
    }

    /**
     * @dataProvider categoriesDataProvider
     */
    public function testCategories(string $category, bool $beSuccess): void
    {
        $oldEnv = $this->tester->english();

        $model = Yii::createObject([
            'class' => AvatarDownloadForm::class,
            'category' => $category,
        ]);
        $this->assertFalse($model->validate());

        if ($beSuccess) {
            $this->assertFalse($model->hasErrors('category'));
        } else {
            $this->assertTrue($model->hasErrors('category'));
            $this->assertStringContainsString(' is invalid.', $model->getFirstError('category'));
        }

        unset($oldEnv);
    }

    /**
     * @return array{string, bool}[]
     */
    public function categoriesDataProvider(): array
    {
        // 0: string, カテゴリ名
        // 1: bool, 成功すべきか
        return [
            ['cm3d2', true],
            ['com3d2', true],
            ['com3d25', true],
            ['cres', false],
            ['cm3d', false],
            ['../avatar/com3d2', false],
        ];
    }

    /**
     * @dataProvider filesProvider
     */
    public function testFiles(string $fileName, bool $beSuccess): void
    {
        $oldEnv = $this->tester->english();

        $model = Yii::createObject([
            'class' => AvatarDownloadForm::class,
            'category' => 'com3d2',
            'file' => $fileName,
        ]);
        $this->assertFalse($model->validate());
        $this->assertTrue($model->hasErrors('file')); // ファイルは存在しないので絶対エラーになるのは変わらない

        if ($beSuccess) {
            $this->assertStringNotContainsString(' is invalid.', $model->getFirstError('file'));
            $this->assertEquals('file does not exist', $model->getFirstError('file'));
        } else {
            $this->assertStringContainsString(' is invalid.', $model->getFirstError('file'));
        }

        unset($oldEnv);
    }

    /**
     * @return array{string, bool}
     */
    public function filesProvider(): array
    {
        // 0: ファイル名
        // 1: 成功すべきか
        return [
            ['hoge', true],
            ['hoge.txt', true],
            ['../hoge.txt', false],
            ['/hoge.txt', false],
            ['hoge<', false],
            ['hoge>', false],
        ];
    }

    /**
     * @dataProvider getPresets
     */
    public function testFileExists(string $category, string $fileName): void
    {
        $model = Yii::createObject([
            'class' => AvatarDownloadForm::class,
            'category' => $category,
            'file' => $fileName,
        ]);
        $this->assertTrue($model->validate());
    }

    public function testDownloadFailed(): void
    {
        $model = Yii::createObject([
            'class' => AvatarDownloadForm::class,
            'category' => '',
            'file' => '',
        ]);

        $this->assertFalse($model->download(
            Yii::createObject(Response::class),
        ));
    }

    /**
     * @dataProvider getPresets
     */
    public function testDownload(string $category, string $fileName, string $sha256sum): void
    {
        $model = Yii::createObject([
            'class' => AvatarDownloadForm::class,
            'category' => $category,
            'file' => $fileName,
        ]);

        $resp = Yii::createObject(Response::class);
        $this->assertTrue($model->download($resp));

        $headers = $resp->headers;
        $this->assertEquals('application/octet-stream', $headers->get('Content-Type'));
        $this->assertEquals(
            sprintf('attachment; filename="%s"', $fileName),
            $headers->get('Content-Disposition'),
        );
        $this->assertGreaterThan(1024, $headers->get('Content-Length'));

        if (is_array($resp->stream)) {
            [$handle] = $resp->stream;
            fseek($handle, 0, SEEK_SET);
            $content = stream_get_contents($handle);
            fclose($handle);
            $resp->stream = null;
        } else {
            $content = stream_get_contents($resp->stream);
            fclose($resp->stream);
            $resp->stream = null;
        }
        $this->assertEquals($sha256sum, hash('sha256', $content));
    }

    /**
     * @return array{string, string, string}[]
     */
    public function getPresets(): array
    {
        return [
            ['cm3d2', 'pre_hina_cm3d2.preset', '562b88af3c34c922a7e2fb8eeb686434644434f6d7ef53a1d3f2f698505811c6'],
            ['com3d2', 'pre_hina_com3d2.preset', '544c7631fa0f3f94ccb66bea5d567733a624f2b2e4e73ebfb4c929de99223175'],
            ['com3d2', 'pre_hina_com3d25.preset', '1301cc9feeb4c5546eb83eba3a16bf5411642326fd4a43b159ccbfc935e4e4d8'],
            ['com3d25', '001-hina.perset', '3ac3b73d86fa98740f9937e3736088f9586797ad772bbe655de94ba786cef4ec'],
        ];
    }
}
