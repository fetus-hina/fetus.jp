<?php

declare(strict_types=1);

namespace app\assets;

use yii\web\AssetBundle;

final class KosugiMaruAsset extends AssetBundle
{
    public $sourcePath = '@app/resource';
    public $css = [
        'fonts/kosugi-maru/kosugi-maru.min.css',
    ];
}
