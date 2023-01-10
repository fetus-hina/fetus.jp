<?php

declare(strict_types=1);

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ErrorAction;
use yii\web\Response;

use function function_exists;
use function opcache_reset;

class SiteController extends Controller
{
    /**
     * @return array<string, array>
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => [
                    'clear-opcache',
                ],
                'rules' => [
                    [
                        'allow' => true,
                        'ips' => [
                            '127.0.0.0/8',
                            '::1',
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * @return array<string, string|array>
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
            ],
        ];
    }

    public function actionIndex(): string
    {
        return $this->render('index');
    }

    public function actionClearOpcache(): string
    {
        $r = Yii::$app->response;
        $r->format = Response::FORMAT_RAW;
        $r->headers->set('Content-Type', 'text/plain; charset=UTF-8');

        if (function_exists('opcache_reset')) {
            opcache_reset();
            return 'ok';
        }

        $r->statusCode = 501;
        return 'not ok';
    }
}
