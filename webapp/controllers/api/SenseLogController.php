<?php
namespace app\controllers\api;

use Yii;
use app\filters\auth\ApiAuth;
use app\models\SenseLog;
use yii\filters\ContentNegotiator;
use yii\rest\Controller;
use yii\web\Response;

class SenseLogController extends Controller
{
    public function behaviors()
    {
        return \array_merge(parent::behaviors(), [
            'contentNegotiator' => [
                'class' => ContentNegotiator::class,
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
            'authenticator' => [
                'class' => ApiAuth::class,
                'except' => [
                    'index',
                ],
            ],
        ]);
    }

    protected function verbs()
    {
        return [
            'index' => ['GET', 'HEAD'],
            'view' => ['GET', 'HEAD'],
            'create' => ['POST'],
            'update' => ['PUT', 'PATCH'],
        ];
    }

    public function actionIndex()
    {
        $query = SenseLog::find()
            ->with(['barometer', 'hygrothermograph', 'sensor'])
            ->orderBy(['{{sense_log}}.[[id]]' => SORT_DESC])
            ->limit(100);
        return array_map(
            function (SenseLog $log) : array {
                return $log->toApiResponse();
            },
            $query->all()
        );
    }
}
