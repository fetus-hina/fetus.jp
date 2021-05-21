<?php

declare(strict_types=1);

use yii\helpers\Html;

?>
<h3 id="sample">サンプル動画</h3>
<div class="ratio ratio-16x9" style="max-width:853px">
  <?= HTml::tag('iframe', '', [
    'allow' => implode('; ', [
        'accelerometer',
        'autoplay',
        'clipboard-write',
        'encrypted-media',
        'gyroscope',
        'picture-in-picture',
    ]),
    'allowfullscreen' => null,
    'frameborder' => '0',
    'src' => 'https://www.youtube-nocookie.com/embed/2TwJ7OmE5Bk',
    'title' => 'YouTube video player',
  ]) . "\n" ?>
</div>
<p class="text-muted"><?= vsprintf('%s（%s）%s', [
  Html::a(
    Html::encode('メイド体操第一'),
    'https://com3d2-shop.s-court.me/item.php?iid=1268',
    [
      'class' => 'text-muted',
      'rel' => 'noopener noreferrer',
      'target' => '_blank',
    ]
  ),
  Html::encode('みんなでメイド体操第一 ver.御苑生メイ'),
  Html::encode('© KISS'),
]) ?></p>
<p>
  中央: <a href="#cres">COM3D2+CRESモデル</a><br>
  左: <a href="#com3d2">COM3D2モデル</a><br>
  右: <a href="#cm3d2">CM3D2モデル</a>
</p>
