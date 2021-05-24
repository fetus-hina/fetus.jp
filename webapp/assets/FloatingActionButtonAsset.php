<?php

declare(strict_types=1);

namespace app\assets;

use yii\web\AssetBundle;

final class FloatingActionButtonAsset extends AssetBundle
{
    public $sourcePath = '@app/resource';
    public $css = [
        'css/floating-action-button.min.css',
    ];
}
