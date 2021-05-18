<?php

declare(strict_types=1);

namespace app\assets;

use yii\web\AssetBundle;

class BlogFeedAsset extends AssetBundle
{
    public $sourcePath = '@app/resource';
    public $css = [
        'css/blog-feed.min.css',
    ];
    public $js = [
        'js/blog-feed.min.js',
    ];
    public $depends = [
        AppAsset::class,
    ];
}
