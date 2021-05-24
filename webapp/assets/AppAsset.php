<?php

declare(strict_types=1);

namespace app\assets;

use jp3cki\yii2\ubuntu\UbuntuMonoFontAsset;
use rmrevin\yii\fontawesome\NpmFreeAssetBundle as FontAwesomeAsset;
use yii\bootstrap4\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

class AppAsset extends AssetBundle
{
    public $sourcePath = '@app/resource';
    public $css = [
        'css/floating-action-button.min.css',
        'css/site.min.css',
    ];
    public $js = [
    ];
    public $depends = [
        BootstrapAsset::class,
        FontAwesomeAsset::class,
        UbuntuMonoFontAsset::class,
        YiiAsset::class,
    ];
}
