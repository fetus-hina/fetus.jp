<?php

declare(strict_types=1);

namespace app\assets;

use yii\web\AssetBundle;

final class SampleVideoAsset extends AssetBundle
{
    public $sourcePath = '@app/resource';
    public $css = [
        'css/sample-video.min.css',
    ];
    public $depends = [
        AppAsset::class,
    ];
}
