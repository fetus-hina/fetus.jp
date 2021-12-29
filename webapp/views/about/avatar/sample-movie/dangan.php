<?php

declare(strict_types=1);

use app\helpers\Icon;
use yii\bootstrap5\Html;
use yii\web\View;

/**
 * @var View $this
 */

?>
<div class="mb-0-last">
  <?= $this->render('//about/avatar/sample-movie/_youtube', ['video' => 'cBk4K2bLx_o']) . "\n" ?>
  <p class="text-muted"><?= implode(' ', [
    Icon::r18(),
    Html::a(
      Html::encode('DAN! GAN! パーティ!!'),
      'http://com3d2.jp/gp02/#update03',
      ['class' => 'text-muted']
    ),
    Html::encode('© KISS'),
  ]) ?></p>
  <?= $this->render('//about/avatar/sample-movie/_bangs') . "\n" ?>
</div>
