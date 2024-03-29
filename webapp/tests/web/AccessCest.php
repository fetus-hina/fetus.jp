<?php // phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace

declare(strict_types=1);

use Codeception\Example;
use Codeception\Util\HttpCode;

class AccessCest
{
    /**
     * @dataProvider getSimpleAccessTestData
     */
    public function simpleAccessTest(WebTester $i, Example $data): void
    {
        $i->wantTo(vsprintf('単純ステータスチェック %s => %d', [
            $data['path'],
            $data['status'],
        ]));
        $i->amOnPage($data['path']);
        $i->seeResponseCodeIs($data['status']);
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
            '/images/avatar-com3d25.jpg' => HttpCode::OK,
            '/robots.txt' => HttpCode::OK,
        ];

        return array_map(
            fn ($path, $status) => [
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
    public function sha256Test(WebTester $i, Example $data): void
    {
        $i->wantTo(vsprintf('ハッシュ値チェック %s', [
            $data['path'],
        ]));
        $i->amOnPage($data['path']);
        $i->seeResponseCodeIs(HttpCode::OK);
        if ($data['contentType']) {
            $actual = (string)$i->grabHttpHeader('Content-Type');
            $pos = strpos($actual, ';');
            if ($pos !== false) {
                $actual = substr($actual, 0, $pos);
            }
            $i->assertEquals(
                strtolower($data['contentType']),
                strtolower($actual),
            );
        }

        $content = $i->grabResponse();
        $i->assertEquals(
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
            '/images/avatar-com3d25.jpg' => [
                'image/jpeg',
                '4c1f234437327a9b3570acea8bfffa9a135bea12b418aab4102c632eb220d498',
            ],
            '/about/avatar/preset?category=cm3d2&file=pre_hina_cm3d2.preset' => [
                'application/octet-stream',
                '562b88af3c34c922a7e2fb8eeb686434644434f6d7ef53a1d3f2f698505811c6',
            ],
            '/about/avatar/preset?category=com3d2&file=pre_hina_com3d2.preset' => [
                'application/octet-stream',
                '544c7631fa0f3f94ccb66bea5d567733a624f2b2e4e73ebfb4c929de99223175',
            ],
            '/about/avatar/preset?category=com3d2&file=pre_hina_com3d25.preset' => [
                'application/octet-stream',
                '1301cc9feeb4c5546eb83eba3a16bf5411642326fd4a43b159ccbfc935e4e4d8',
            ],
            '/about/avatar/preset?category=com3d25&file=001-hina.perset' => [
                'application/octet-stream',
                '3ac3b73d86fa98740f9937e3736088f9586797ad772bbe655de94ba786cef4ec',
            ],
        ];

        return array_map(
            fn ($path, $data) => [
                'path' => $path,
                'contentType' => $data[0],
                'hash' => $data[1],
            ],
            array_keys($data),
            array_values($data),
        );
    }

    public function indexTest(WebTester $i): void
    {
        $i->wantTo('トップページテスト');
        $i->amOnPage('/');
        $i->seeResponseCodeIs(HttpCode::OK);
        $i->seeElement('html', ['lang' => 'ja-JP']);
        $i->seeElement('.btn', ['href' => '/service']);
        $i->seeElement('.btn', ['href' => '/about']);
        $i->see('Copyright © AIZAWA Hina');
    }
}
