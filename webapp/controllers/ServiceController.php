<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;

class ServiceController extends Controller
{
    public $layout = 'main.tpl';

    public function actionIndex()
    {
        return $this->render('index.tpl');
    }
}
