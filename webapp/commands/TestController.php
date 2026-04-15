<?php

declare(strict_types=1);

namespace app\commands;

use app\commands\test\WebAction;
use yii\console\Application;
use yii\console\Controller;

/**
 * @extends Controller<Application>
 */
class TestController extends Controller
{
    public function actions()
    {
        return [
            'web' => WebAction::class,
        ];
    }
}
