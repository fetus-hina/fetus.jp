<?php

declare(strict_types=1);

use yii\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 */

?>
<div class="mb-0-last">
  <?= $this->render('//about/avatar/sample-movie/_youtube', ['video' => '2TwJ7OmE5Bk']) . "\n" ?>
  <p class="text-muted"><?= vsprintf('%s（%s）%s', [
    Html::a(
      Html::encode('メイド体操第一'),
      'https://com3d2-shop.s-court.me/item.php?iid=1268',
      ['class' => 'text-muted']
    ),
    Html::encode('みんなでメイド体操第一 ver.御苑生メイ'),
    Html::encode('© KISS'),
  ]) ?></p>
  <p>
    中央: <a href="#com3d25">COM3D2.5 (CRES) モデル</a><br>
    左: <a href="#com3d2">COM3D2モデル</a><br>
    右: <a href="#cm3d2">CM3D2モデル</a>
  </p>
  <?= $this->render('//about/avatar/sample-movie/_bangs') . "\n" ?>
</div>