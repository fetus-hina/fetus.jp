<?php

declare(strict_types=1);

namespace app\controllers;

use Yii;
use yii\web\Controller;

class AboutController extends Controller
{
    public function actionIndex(): string
    {
        return $this->render('index');
    }

    public function actionPgp(): string
    {
        return $this->render('pgp');
    }

    public function actionAvatar(): string
    {
        return $this->render('avatar');
    }
}
