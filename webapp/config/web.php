<?php

declare(strict_types=1);

$params = require(__DIR__ . '/params.php');
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
            'cookieValidationKey' => include(__DIR__ . '/cookie-secret.php'),
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
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

                // api
                'GET,HEAD api/<_c:[a-z0-9-]+>' => '/api/<_c>/index',
                'POST api/<_c:[a-z0-9-]+>' => '/api/<_c>/create',
                'GET,HEAD api/<_c:[a-z0-9-]+>/<id:[0-9]+>' => '/api/<_c>/view',

                '<_c:[a-z0-9-]+>' => '/<_c>/index',
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
