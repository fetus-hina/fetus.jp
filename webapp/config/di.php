<?php

declare(strict_types=1);

use kartik\dialog\Dialog;
use yii\helpers\ArrayHelper;
use yii\web\AssetManager;

Yii::$container->set(Dialog::class, [
    'bsVersion' => '5',
]);

Yii::$container->set(AssetManager::class, [
    'hashCallback' => function (string $path): string {
        $path = is_file($path)
            ? dirname($path)
            : $path;

        return vsprintf('%s/%s', [
            substr(
                hash_hmac(
                    'sha256',
                    (string)ArrayHelper::getValue(Yii::$app->params, 'deployId', ''),
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
