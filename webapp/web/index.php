<?php // phpcs:disable PSR1.Files.SideEffects.FoundWithSymbols

declare(strict_types=1);

use yii\web\Application;

if (file_exists(__DIR__ . '/../.production')) {
    defined('YII_DEBUG') or define('YII_DEBUG', false);
    defined('YII_ENV') or define('YII_ENV', 'prod');
} elseif (($_SERVER['HTTP_X_TEST_ENV'] ?? null) === '1') {
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_ENV') or define('YII_ENV', 'test');
} else {
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_ENV') or define('YII_ENV', 'dev');
}

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../config/di.php');

$config = require(__DIR__ . '/../config/web.php');
if (defined('YII_ENV') && YII_ENV === 'test') {
    $config['components']['db'] = require(__DIR__ . '/../config/test_db.php');
}

(new Application($config))->run();
