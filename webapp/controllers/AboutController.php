<?php

declare(strict_types=1);

namespace app\controllers;

use Yii;
use yii\web\Controller;

class AboutController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionPgp()
    {
        return $this->render('pgp');
    }
}
