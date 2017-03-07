<?php
namespace app\assets;

use yii\web\AssetBundle;

class BlogFeedAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
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
