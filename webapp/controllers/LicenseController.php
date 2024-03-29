<?php

declare(strict_types=1);

namespace app\controllers;

use app\actions\license\LicenseAction;
use yii\web\Controller;

class LicenseController extends Controller
{
    public function actions()
    {
        $license = fn ($title, $dir) => [
            'class' => LicenseAction::class,
            'directory' => $dir,
            'title' => $title,
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
