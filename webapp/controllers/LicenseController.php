<?php

declare(strict_types=1);

namespace app\controllers;

use Yii;
use app\actions\license\LicenseAction;
use yii\web\Controller;
use yii\web\Response;

class LicenseController extends Controller
{
    public function actions()
    {
        $license = fn($title, $dir) => [
            'class' => LicenseAction::class,
            'title' => $title,
            'directory' => $dir,
        ];

        return [
            'composer' => $license('Composer Packages', '@app/data/licenses/composer'),
            'npm' => $license('NPM Packages', '@app/data/licenses/npm'),
        ];
    }

    public function actionIndex(): string
    {
        return $this->render('index');
    }
}
