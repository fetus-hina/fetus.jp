<?php

declare(strict_types=1);

namespace app\actions\license;

use FilesystemIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Yii;
use app\helpers\Html;
use stdClass;
use yii\base\Action;

use function call_user_func;
use function file_get_contents;
use function is_string;
use function ltrim;
use function preg_match;
use function preg_replace;
use function strcmp;
use function strlen;
use function strnatcasecmp;
use function substr;
use function trim;
use function usort;

class LicenseAction extends Action
{
    public string $view = '//license/license';
    public string $title = 'Licenses';
    public string $directory;

    /**
     * @return string
     */
    public function run()
    {
        return $this->controller->render($this->view, [
            'depends' => $this->loadDepends(),
            'title' => $this->title,
        ]);
    }

    private function loadDepends(): array
    {
        $ret = $this->loadFiles($this->directory);
        usort(
            $ret,
            function (stdClass $a, stdClass $b): int {
                $aName = trim(preg_replace('/[^0-9A-Za-z]+/', ' ', $a->name));
                $aName2 = ltrim($aName, '@');
                $bName = trim(preg_replace('/[^0-9A-Za-z]+/', ' ', $b->name));
                $bName2 = ltrim($bName, '@');
                return strnatcasecmp($aName2, $bName2)
                    ?: strnatcasecmp($aName, $bName)
                    ?: strcmp($aName, $bName);
            },
        );
        return $ret;
    }

    private function loadFiles(string $directory): array
    {
        $basedir = (string)Yii::getAlias($directory);
        $ret = [];
        /**
         * @var iterable<FilesystemIterator> $it
         */
        $it = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($basedir),
        );
        foreach ($it as $entry) {
            if (!$entry->isFile()) {
                continue;
            }

            $pathname = $entry->getPathname();
            if (substr($pathname, 0, strlen($basedir)) !== $basedir) {
                continue;
            }

            if (substr($pathname, -12) !== '-LICENSE.txt') {
                continue;
            }

            $basename = substr($pathname, strlen($basedir));
            $html = $this->loadPlain(
                $entry->getPathname(),
                fn ($t) => (bool)preg_match('/copyright|licen[cs]e/i', $t),
            );
            if ($html) {
                $ret[] = (object)[
                    'name' => ltrim(substr($basename, 0, strlen($basename) - 12), '/'),
                    'html' => $html,
                ];
            }
        }

        return $ret;
    }

    private function loadPlain(string $path, ?callable $checker = null): ?string
    {
        $text = $this->loadFile($path, $checker);
        return $text !== null
            ? Html::tag('pre', Html::encode($text), ['class' => 'm-0 fs-6 lh-sm'])
            : null;
    }

    private function loadFile(string $path, ?callable $checker): ?string
    {
        $text = file_get_contents($path, false);
        if (!is_string($text)) {
            return null;
        }

        if ($checker && !call_user_func($checker, $text)) {
            return null;
        }

        return $text;
    }
}
