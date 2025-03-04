<?php

declare(strict_types=1);

use app\models\User as UserIdentity;
use yii\bootstrap5\BootstrapAsset;
use yii\bootstrap5\BootstrapPluginAsset;
use yii\caching\FileCache;
use yii\log\FileTarget as LogFileTarget;

$params = require __DIR__ . '/params.php';
$config = [
    'id' => 'fetusjp',
    'name' => 'fetus.jp',
    'language' => 'ja-JP',
    'timeZone' => 'Asia/Tokyo',
    'basePath' => dirname(__DIR__),
    'aliases' => [
        '@bower' => '@app/node_modules',
        '@npm' => '@app/node_modules',
    ],
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            'cookieValidationKey' => file_exists(__DIR__ . '/cookie-secret.php')
                ? include(__DIR__ . '/cookie-secret.php')
                : str_repeat('A', 44),
        ],
        'cache' => [
            'class' => FileCache::class,
        ],
        'user' => [
            'identityClass' => UserIdentity::class,
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => LogFileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => '/site/index',
                'about/avatar/preset' => '/about/download-avatar-preset',

                '<_c:[a-z0-9-]+>' => '/<_c>/index',
            ],
        ],
        'assetManager' => [
            'bundles' => [
                BootstrapAsset::class => [
                    'sourcePath' => '@npm/@jp3cki/fetus.css/dist',
                    'css' => [
                        'bootstrap-lineseedjp.min.css',
                    ],
                ],
                BootstrapPluginAsset::class => [
                    'sourcePath' => '@npm/bootstrap/dist/js',
                    'js' => [
                        'bootstrap.bundle.min.js',
                    ],
                    'depends' => [
                        BootstrapAsset::class,
                    ],
                ],
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
