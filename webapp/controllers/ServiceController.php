<?php

declare(strict_types=1);

namespace app\controllers;

use yii\web\Controller;

class ServiceController extends Controller
{
    public function actionIndex(): string
    {
        return $this->render('index');
    }
}
