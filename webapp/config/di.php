<?php

declare(strict_types=1);

use app\helpers\TypeHelper;
use yii\base\Application;
use yii\helpers\ArrayHelper;
use yii\web\AssetManager;

Yii::$container->set(AssetManager::class, [
    'hashCallback' => function (string $path): string {
        $path = is_file($path)
            ? dirname($path)
            : $path;

        $app = TypeHelper::instanceOf(Yii::$app, Application::class);
        $deployId = ArrayHelper::getValue($app->params, 'deployId', '');

        return vsprintf('%s/%s', [
            substr(
                hash_hmac(
                    'sha256',
                    is_string($deployId) ? $deployId : '',
                    Yii::getVersion(),
                    false,
                ),
                0,
                16,
            ),
            substr(
                hash(
                    'sha256',
                    $path . '|' . filemtime($path),
                    false,
                ),
                0,
                16,
            ),
        ]);
    },
]);
