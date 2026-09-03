<?php

declare(strict_types=1);

use yii\helpers\ArrayHelper;

return (function (): array {
    $config = require __DIR__ . '/web.php';
    if (!is_array($config)) {
        throw new TypeError('config/web.php must return an array');
    }

    $id = $config['id'] ?? null;
    $components = $config['components'] ?? [];
    $bootstrap = $config['bootstrap'] ?? [];
    $modules = $config['modules'] ?? [];
    if (
        !is_string($id) ||
        !is_array($components) ||
        !is_array($bootstrap) ||
        !is_array($modules)
    ) {
        throw new TypeError('config/web.php returned an unexpected structure');
    }

    foreach (['debug', 'gii'] as $module) {
        ArrayHelper::removeValue($bootstrap, $module);
        unset($modules[$module]);
    }

    $config['id'] = $id . '-tests';
    $config['bootstrap'] = $bootstrap;
    $config['modules'] = $modules;
    $config['components'] = ArrayHelper::merge($components, [
        'db' => require __DIR__ . '/test_db.php',
        'assetManager' => [
            'basePath' => __DIR__ . '/../web/assets',
        ],
        'urlManager' => [
            'enablePrettyUrl' => false,
            'showScriptName' => true,
        ],
        'request' => [
            'cookieValidationKey' => 'test',
            'enableCsrfValidation' => false,
        ],
    ]);

    return $config;
})();
