<?php

declare(strict_types=1);

namespace app\controllers;

use yii\web\Application;
use yii\web\Controller;

/**
 * @extends Controller<Application>
 */
class ServiceController extends Controller
{
    public function actionIndex(): string
    {
        return $this->render('index');
    }
}
