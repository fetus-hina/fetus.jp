<?php

declare(strict_types=1);

namespace app\assets;

use yii\bootstrap5\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

final class AppAsset extends AssetBundle
{
    public $sourcePath = '@app/resource';
    public $css = [
        'css/site.min.css',
    ];
    public $js = [
        'js/twitter-web-intents.min.js',
    ];
    public $depends = [
        BootstrapAsset::class,
        YiiAsset::class,
    ];
}
