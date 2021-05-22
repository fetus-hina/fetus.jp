<?php

declare(strict_types=1);

namespace app\actions\license;

use DirectoryIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Yii;
use stdClass;
use yii\base\Action;
use yii\helpers\Html;

use function array_merge;
use function call_user_func;
use function file_get_contents;
use function ltrim;
use function strcmp;
use function strlen;
use function strnatcasecmp;
use function strtolower;
use function substr;
use function trim;
use function usort;

class LicenseAction extends Action
{
    public string $view = '//license/license';
    public string $title = 'Licenses';
    public string $directory;

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
            }
        );
        return $ret;
    }

    private function loadFiles(string $directory): array
    {
        $basedir = Yii::getAlias($directory);
        $ret = [];
        $it = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($basedir)
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
                fn($t) => (bool)preg_match('/copyright|licen[cs]e/i', $t),
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
        return ($text !== null)
            ? Html::tag('pre', Html::encode($text), ['class' => 'm-0'])
            : null;
    }

    private function loadFile(string $path, ?callable $checker): ?string
    {
        $text = file_get_contents($path, false);
        if ($checker && !call_user_func($checker, $text)) {
            return null;
        }
        return $text;
    }
}
