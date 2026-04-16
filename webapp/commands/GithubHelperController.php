<?php

declare(strict_types=1);

namespace app\commands;

use Yii;
use app\helpers\IpRangeHelper;
use yii\console\Application;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\httpclient\Client;

use function count;
use function file_put_contents;
use function implode;
use function is_int;

/**
 * @extends Controller<Application>
 */
final class GithubHelperController extends Controller
{
    private const API_URL = 'https://api.github.com/meta';

    public function actionIpRanges(): int
    {
        $this->stdout("Fetching GitHub Actions IP ranges...\n");

        $client = new Client();
        $response = $client->get(self::API_URL, [], [
            'User-Agent' => 'fetus.jp-github-helper',
            'Accept' => 'application/vnd.github.v3+json',
        ])->send();

        if (!$response->isOk) {
            $this->stderr("Failed to fetch GitHub meta API\n");
            return ExitCode::UNSPECIFIED_ERROR;
        }

        /** @var array{actions: string[]} $data */
        $data = $response->data;
        $ranges = $data['actions'];

        $result = IpRangeHelper::separateAndSort($ranges);

        $runtimePath = (string)Yii::getAlias('@runtime');

        $ok = true;
        foreach (['ipv4' => $result['ipv4'], 'ipv6' => $result['ipv6']] as $name => $list) {
            $path = "{$runtimePath}/github-actions-{$name}.txt";
            $status = file_put_contents($path, implode("\n", $list) . "\n");
            if (!is_int($status) || $status <= 0) {
                $this->stderr("Failed to write {$path}\n");
                $ok = false;
            } else {
                $this->stdout("Wrote {$path} (" . count($list) . " ranges)\n");
            }
        }

        return $ok ? ExitCode::OK : ExitCode::UNSPECIFIED_ERROR;
    }
}
