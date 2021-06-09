<?php

declare(strict_types=1);

use yii\helpers\ArrayHelper;

return (function (): array {
    $config = require(__DIR__ . '/web.php');
    $config['id'] .= '-tests';
    $config['components'] = ArrayHelper::merge($config['components'], [
        'db' => require(__DIR__ . '/test_db.php'),
        'mailer' => [
            'useFileTransport' => true,
        ],
        'assetManager' => [
            'basePath' => __DIR__ . '/../web/assets',
        ],
        'urlManager' => [
            'showScriptName' => true,
        ],
        'request' => [
            'cookieValidationKey' => 'test',
            'enableCsrfValidation' => false,
        ],
    ]);

    foreach (['debug', 'gii'] as $module) {
        ArrayHelper::removeValue($config['bootstrap'], $module);
        unset($config['modules'][$module]);
    }

    return $config;
})();
