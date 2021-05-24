<?php

declare(strict_types=1);

namespace app\assets;

use rmrevin\yii\fontawesome\NpmFreeAssetBundle as FontAwesomeAsset;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;

final class BackToTopAsset extends AssetBundle
{
    public $sourcePath = '@app/resource';
    public $js = [
        'js/back-to-top.min.js',
    ];
    public $depends = [
        FloatingActionButtonAsset::class,
        FontAwesomeAsset::class,
        JqueryAsset::class,
    ];
}
