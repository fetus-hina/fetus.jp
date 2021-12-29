<?php

declare(strict_types=1);

namespace app\assets;

use yii\web\AssetBundle;

final class TwemojiNpmAsset extends AssetBundle
{
    public $sourcePath = '@npm/twemoji/dist';
    public $js = [
        'twemoji.min.js',
    ];
}
