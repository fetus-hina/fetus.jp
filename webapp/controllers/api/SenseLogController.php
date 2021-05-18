<?php

declare(strict_types=1);

namespace app\controllers\api;

use Yii;
use app\filters\auth\ApiAuth;
use app\models\SenseLog;
use app\models\api\SenseLog as PostSenseLogForm;
use yii\filters\ContentNegotiator;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class SenseLogController extends Controller
{
    public function init()
    {
        Yii::$app->user->enableSession = false;
        Yii::$app->language = 'ja-JP';
        Yii::$app->timeZone = 'Etc/UTC';
        parent::init();
    }

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
                    'view',
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
        ];
    }

    public function actionIndex()
    {
        $query = SenseLog::find()
            ->with(['barometer', 'hygrothermograph', 'sensor'])
            ->orderBy(['{{sense_log}}.[[id]]' => SORT_DESC])
            ->limit(100);
        return array_map(
            function (SenseLog $log): array {
                return $log->toApiResponse();
            },
            $query->all()
        );
    }

    public function actionView($id)
    {
        $model = null;
        if (is_string($id) && preg_match('/^\d+$/', $id)) {
            $model = SenseLog::findOne(['id' => $id]);
        }
        if (!$model) {
            throw new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        }
        return $model->toApiResponse();
    }

    public function actionCreate()
    {
        $req = Yii::$app->request;
        $form = Yii::createObject(array_merge($req->post(), [
            'class'         => PostSenseLogForm::class,
            'sensor_id'     => Yii::$app->user->identity->id,
            'remote_addr'   => $req->userIP,
        ]));
        if (!$form->validate()) {
            Yii::$app->response->statusCode = 400;
            return $form->getErrors();
        }
        $transaction = Yii::$app->db->beginTransaction();
        if (!$log = $form->save()) {
            $transaction->rollBack();
            Yii::$app->response->statusCode = 500;
            return 'Failed to save a log';
        }
        $log->refresh();
        $transaction->commit();

        return $log->toApiResponse();
    }
}
