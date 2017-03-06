<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\ErrorAction;

class SiteController extends Controller
{
    public $layout = 'main.tpl';

    public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index.tpl');
    }
}
