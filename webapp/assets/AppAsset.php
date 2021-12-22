<?php

declare(strict_types=1);

namespace app\assets;

use jp3cki\yii2\ubuntu\UbuntuMonoFontAsset;
use yii\bootstrap5\BootstrapAsset;
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
        UbuntuMonoFontAsset::class,
        YiiAsset::class,
    ];
}
