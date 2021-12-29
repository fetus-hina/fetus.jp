<?php

declare(strict_types=1);

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

final class TwemojiAsset extends AssetBundle
{
    public $sourcePath = '@app/resource';
    public $css = [
        'css/twemoji.min.css',
    ];
    public $js = [
        'js/twemoji.min.js',
    ];
    public $depends = [
        JqueryAsset::class,
        TwemojiNpmAsset::class,
    ];
}
