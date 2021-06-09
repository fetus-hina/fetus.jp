<?php // phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace

declare(strict_types=1);

use Codeception\Util\HttpCode;
use yii\helpers\Url;

class AccessCest
{
    public function indexTest(WebTester $I): void
    {
        $I->wantTo('トップページテスト');
        $I->sendGet('http://localhost:58420/index.test.php');
        $I->seeResponseCodeIs(HttpCode::OK);
    }

    public function notFoundTest(WebTester $I): void
    {
        $I->wantTo('404ページテスト');
        $I->sendGet('http://localhost:58420/index.test.php?r=foo/foo');
        $I->seeResponseCodeIs(HttpCode::NOT_FOUND);
    }
}
