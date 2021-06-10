<?php // phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace

declare(strict_types=1);

use Codeception\Example;
use Codeception\Util\HttpCode;
use yii\helpers\Url;

class AccessCest
{
    /**
     * @dataProvider getSimpleAccessTestData
     */
    public function simpleAccessTest(WebTester $I, Example $data): void
    {
        $I->wantTo(vsprintf('単純ステータスチェック %s => %d', [
            $data['path'],
            $data['status'],
        ]));
        $I->amOnPage($data['path']);
        $I->seeResponseCodeIs($data['status']);
    }

    protected function getSimpleAccessTestData(): array
    {
        $data = [
            '/notfound' => HttpCode::NOT_FOUND,

            '/' => HttpCode::OK,
            '/about' => HttpCode::OK,
            '/about/avatar' => HttpCode::OK,
            '/about/pgp' => HttpCode::OK,
            '/license' => HttpCode::OK,
            '/license/composer' => HttpCode::OK,
            '/license/npm' => HttpCode::OK,
            '/service' => HttpCode::OK,

            '/ads.txt' => HttpCode::OK,
            '/images/avatar-cm3d2.jpg' => HttpCode::OK,
            '/images/avatar-com3d2.jpg' => HttpCode::OK,
            '/images/avatar-cres.jpg' => HttpCode::OK,
            '/robots.txt' => HttpCode::OK,
        ];

        return array_map(
            fn($path, $status) => [
                'path' => $path,
                'status' => $status,
            ],
            array_keys($data),
            array_values($data),
        );
    }

    /**
     * @dataProvider getSHA256TestData
     */
    public function sha256Test(WebTester $I, Example $data): void
    {
        $I->wantTo(vsprintf('ハッシュ値チェック %s', [
            $data['path'],
        ]));
        $I->amOnPage($data['path']);
        $I->seeResponseCodeIs(HttpCode::OK);
        if ($data['contentType']) {
            $actual = (string)$I->grabHttpHeader('Content-Type');
            $pos = strpos($actual, ';');
            if ($pos !== false) {
                $actual = substr($actual, 0, $pos);
            }
            $I->assertEquals(
                strtolower($data['contentType']),
                strtolower($actual),
            );
        }

        $content = $I->grabResponse();
        $I->assertEquals(
            strtolower($data['hash']),
            strtolower(hash('sha256', $content)),
        );
    }

    protected function getSHA256TestData(): array
    {
        $data = [
            '/images/avatar-cm3d2.jpg' => [
                'image/jpeg',
                '67c8c21dad97190f81fa7367e67077910a48b44e6065e35231af55904991944e',
            ],
            '/images/avatar-com3d2.jpg' => [
                'image/jpeg',
                '2d27d399bbd0274df72d1986350eb80d790d0b9ca3aeb55a591ecd9e14e7c689',
            ],
            '/images/avatar-cres.jpg' => [
                'image/jpeg',
                '4c1f234437327a9b3570acea8bfffa9a135bea12b418aab4102c632eb220d498',
            ],
            '/about/avatar/preset?category=cm3d2&file=pre_hina_cm3d2.preset' => [
                'application/octet-stream',
                '562b88af3c34c922a7e2fb8eeb686434644434f6d7ef53a1d3f2f698505811c6',
            ],
            '/about/avatar/preset?category=com3d2&file=pre_hina_com3d2.preset' => [
                'application/octet-stream',
                '1301cc9feeb4c5546eb83eba3a16bf5411642326fd4a43b159ccbfc935e4e4d8',
            ],
            '/about/avatar/preset?category=cres&file=001-hina.perset' => [
                'application/octet-stream',
                '3ac3b73d86fa98740f9937e3736088f9586797ad772bbe655de94ba786cef4ec',
            ],
        ];

        return array_map(
            fn($path, $data) => [
                'path' => $path,
                'contentType' => $data[0],
                'hash' => $data[1],
            ],
            array_keys($data),
            array_values($data),
        );
    }

    public function indexTest(WebTester $I): void
    {
        $I->wantTo('トップページテスト');
        $I->amOnPage('/');
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeElement('html', ['lang' => 'ja-JP']);
        $I->seeElement('.btn', ['href' => '/service']);
        $I->seeElement('.btn', ['href' => '/about']);
        $I->see('Copyright © AIZAWA Hina');
    }
}
