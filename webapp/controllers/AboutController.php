<?php

declare(strict_types=1);

namespace app\controllers;

use Yii;
use app\models\AvatarDownloadForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

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

    public function actionDownloadAvatarPreset(): void
    {
        $form = Yii::createObject(AvatarDownloadForm::class);
        $form->attributes = (array)Yii::$app->request->get();
        if (!$form->download(Yii::$app->response)) {
            throw new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        }
    }
}
