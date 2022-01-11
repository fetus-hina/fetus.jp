<?php

declare(strict_types=1);

use yii\helpers\ArrayHelper;
use yii\web\AssetManager;

Yii::$container->set(AssetManager::class, [
    'hashCallback' => function (string $path): string {
        $path = is_file($path)
            ? dirname($path)
            : $path;

        $deployId = ArrayHelper::getValue((array)Yii::$app->params, 'deployId', '');

        return vsprintf('%s/%s', [
            substr(
                hash_hmac(
                    'sha256',
                    is_string($deployId) ? $deployId : '',
                    Yii::getVersion(),
                    false
                ),
                0,
                16
            ),
            substr(
                hash(
                    'sha256',
                    $path . '|' . filemtime($path),
                    false
                ),
                0,
                16
            ),
        ]);
    },
]);
