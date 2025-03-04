<?php

declare(strict_types=1);

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;

use function assert;
use function file_put_contents;
use function implode;
use function is_int;
use function vsprintf;

final class ConfigController extends Controller
{
    public function actionGenerateDeployId(): int
    {
        return $this->generateRandomIdFile('@app/config/deploy-id.php');
    }

    private function generateRandomIdFile(string $path, int $length = 32): int
    {
        assert(0 < $length && $length <= 64);

        $status = file_put_contents(
            (string)Yii::getAlias($path),
            implode("\n", [
                '<?php',
                '',
                'declare(strict_types=1);',
                '',
                'return (function (): string {',
                vsprintf("    return '%s';", [
                    Yii::$app->security->generateRandomString($length),
                ]),
                '})();',
            ]) . "\n",
        );

        return is_int($status) && $status > 0
            ? ExitCode::OK
            : ExitCode::UNSPECIFIED_ERROR;
    }
}
