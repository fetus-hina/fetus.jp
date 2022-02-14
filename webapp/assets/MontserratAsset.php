<?php

declare(strict_types=1);

namespace app\assets;

use yii\web\AssetBundle;

final class MontserratAsset extends AssetBundle
{
    public $sourcePath = '@app/resource';
    public $css = [
        'fonts/montserrat/montserrat.min.css',
    ];
}
