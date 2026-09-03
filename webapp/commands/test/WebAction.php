<?php

declare(strict_types=1);

namespace app\commands\test;

use Yii;
use yii\base\Action;
use yii\console\Controller;

use function array_filter;
use function array_map;
use function array_values;
use function escapeshellarg;
use function exec;
use function fclose;
use function fwrite;
use function is_int;
use function is_numeric;
use function passthru;
use function posix_kill;
use function proc_close;
use function proc_get_status;
use function proc_open;
use function proc_terminate;
use function vsprintf;

use const STDERR;

/**
 * @extends Action<Controller>
 */
final class WebAction extends Action
{
    private const SIGTERM = 15;

    /** @var array{handle: resource, pid: int, pipes: array<int, resource>}|null */
    private ?array $serverProcess = null;

    public function __destruct()
    {
        $this->stopServer();
    }

    /** @return int */
    public function run()
    {
        if (!$this->startServer()) {
            return 1;
        }

        $cmdline = vsprintf('/usr/bin/env %s run web', [
            escapeshellarg((string)Yii::getAlias('@app/vendor/bin/codecept')),
        ]);
        $status = null;
        passthru($cmdline, $status);
        return $status;
    }

    private function startServer(): bool
    {
        $this->stopServer();

        fwrite(STDERR, "\nStarting test server on 127.0.0.1:58420\n\n");

        $cmdline = vsprintf('/usr/bin/env %s serve %s --interactive=0 --docroot=%s 2>&1', [
            escapeshellarg((string)Yii::getAlias('@app/tests/bin/yii')),
            escapeshellarg('127.0.0.1:58420'),
            escapeshellarg('@app/web'),
        ]);

        $descSpec = [
            ['pipe', 'r'],
            ['pipe', 'w'],
        ];
        $pipes = [];
        if (!$handle = @proc_open($cmdline, $descSpec, $pipes)) {
            return false;
        }
        $status = proc_get_status($handle);
        $this->serverProcess = [
            'handle' => $handle,
            'pid' => (int)$status['pid'],
            'pipes' => $pipes,
        ];

        return true;
    }

    private function stopServer(): void
    {
        if (!$this->serverProcess) {
            $this->serverProcess = null;
            return;
        }

        $process = $this->serverProcess;
        $this->serverProcess = null;

        fwrite(STDERR, "\nStopping test server (pid={$process['pid']})\n\n");
        @fclose($process['pipes'][0]);
        @fclose($process['pipes'][1]);

        if ($process['pid']) {
            $this->killDescendants($process['pid'], static::SIGTERM);
        }

        proc_terminate($process['handle'], static::SIGTERM);
        proc_close($process['handle']);
    }

    private function killDescendants(int $parentPID, int $signal): void
    {
        foreach ($this->getChildren($parentPID) as $pid) {
            $this->killDescendants($pid, $signal);
            @posix_kill($pid, $signal);
        }
    }

    /**
     * @return int[]
     */
    private function getChildren(int $pid): array
    {
        $cmdline = vsprintf('/usr/bin/env %s --ppid %s -o %s --no-heading', [
            escapeshellarg('ps'),
            escapeshellarg((string)$pid),
            escapeshellarg('pid'),
        ]);
        exec($cmdline, $lines, $status);
        if ($status !== 0) {
            return [];
        }

        return array_values(
            array_filter(
                array_map(
                    fn ($v) => is_numeric($v) ? (int)$v : null,
                    $lines,
                ),
                fn ($v) => is_int($v) && $v > 0,
            ),
        );
    }
}
