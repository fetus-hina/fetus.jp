<?php

declare(strict_types=1);

$optional = fn($path, $default = null) => @(file_exists($path) && is_readable($path))
    ? require($path)
    : $default;

return [
    'deployId' => $optional(__DIR__ . '/deploy-id.php'),
];
