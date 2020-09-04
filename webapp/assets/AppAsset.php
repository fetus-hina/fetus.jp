<?php

declare(strict_types=1);

namespace app\assets;

use jp3cki\yii2\mplus1p\MPlus1pFontAsset;
use jp3cki\yii2\ubuntu\UbuntuMonoFontAsset;
use rmrevin\yii\fontawesome\AssetBundle as FontAwesomeAsset;
use yii\bootstrap4\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

class AppAsset extends AssetBundle
{
    public $sourcePath = '@app/resource';
    public $css = [
        'css/site.min.css',
    ];
    public $js = [
    ];
    public $depends = [
        BootstrapAsset::class,
        FontAwesomeAsset::class,
        MPlus1pFontAsset::class,
        UbuntuMonoFontAsset::class,
        YiiAsset::class,
    ];
}
