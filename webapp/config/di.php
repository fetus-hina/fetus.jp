<?php

declare(strict_types=1);

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\AssetManager;

Yii::$classMap[Html::class] = __DIR__ . '/../overwrite/yii2/helpers/Html.php';

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
