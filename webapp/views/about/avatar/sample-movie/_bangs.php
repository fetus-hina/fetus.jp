<?php

declare(strict_types=1);

use app\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 */

echo Html::tag(
  'p',
  Html::encode('※動画はCOM3D2 v1.63.1+CRES 1.7.2で撮影しているため、COM3D2.5(CRES)モデルの前髪の処理に問題が発生しています。'),
  [
    'class' => 'text-muted small',
  ]
);
