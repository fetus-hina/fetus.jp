<?php

declare(strict_types=1);

use yii\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 */

?>
<?= $this->render('//about/avatar/sample-movie/_youtube', ['video' => 'cBk4K2bLx_o']) . "\n" ?>
<p class="text-muted mb-0"><?= implode(' ', [
  '&#x1f51e;',
  Html::a(
    Html::encode('DAN! GAN! パーティ!!'),
    'http://com3d2.jp/gp02/#update03',
    [
      'class' => 'text-muted',
      'rel' => 'noopener noreferrer',
      'target' => '_blank',
    ]
  ),
  Html::encode('© KISS'),
]) ?></p>
