<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;

class AboutController extends Controller
{
    public $layout = 'main.tpl';

    public function actionIndex()
    {
        return $this->render('index.tpl');
    }

    public function actionPgp()
    {
        return $this->render('pgp.tpl');
    }
}
