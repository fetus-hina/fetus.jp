<?php

declare(strict_types=1);

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

final class RgbAsset extends AssetBundle
{
    public $sourcePath = '@app/resource';
    public $js = [
        'js/rgb.min.js',
    ];
    public $depends = [
        JqueryAsset::class,
    ];
}
