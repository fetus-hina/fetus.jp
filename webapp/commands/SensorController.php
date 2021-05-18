<?php

declare(strict_types=1);

namespace app\commands;

use Normalizer;
use Yii;
use app\models\Sensor;
use yii\console\Controller;
use yii\helpers\Console;

class SensorController extends Controller
{
    public function actionCreate(string $name)
    {
        $name = Normalizer::normalize($name, Normalizer::FORM_C);
        $name = trim(mb_convert_kana($name, 'asKV', 'UTF-8'));
        if ($name === '') {
            $this->stderr('No name given.', Console::FG_RED);
            return 1;
        }
        if (!$this->confirm("Create new sensor named \"{$name}\"?")) {
            return 2;
        }
        $this->stderr("Creating {$name}...\n");

        $model = Yii::createObject([
            'class'     => Sensor::class,
            'name'      => $name,
            'enabled'   => true,
        ]);
        if (!$model->save()) {
            $this->stderr("Failed to create \"{$name}\"", Console::FG_RED);
            return 1;
        }
        $this->stdout("Registered new sensor.\n", Console::FG_GREEN);
        $this->stdout("Auth key is: {$model->auth_key}\n", Console::FG_GREEN);
        $this->stdout("Auth secret is: {$model->auth_secret}\n", Console::FG_GREEN);
        return 0;
    }
}
