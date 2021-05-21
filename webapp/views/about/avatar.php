<?php

declare(strict_types=1);

use app\assets\AppAsset;
use rmrevin\yii\fontawesome\FAS;
use yii\helpers\Html;

?>
<div class="btn-group mb-3" role="group">
  <?= Html::a(
    (string)FAS::icon('angle-double-left') . ' ' . Html::encode('Home'),
    ['site/index'],
    ['class' => 'btn btn-outline-primary']
  ) . "\n" ?>
  <?= Html::a(
    (string)FAS::icon('angle-double-left') . ' ' . Html::encode('About'),
    ['about/index'],
    ['class' => 'btn btn-outline-primary']
  ) . "\n" ?>
</div>

<h2>Avatar</h2>
<p>
  需要はないと思いますが、私が使用しているアバターを再現して利用することができます。
</p>
<p>
  その際は、私の発言ととらえられないようにしてください（例えばご自分のアバターとしての利用は不可）。
  また、営利目的での利用はできません。
</p>
<p>
  <?= vsprintf('%s を利用する場合、%sが同時に適用されます。', [
    implode(', ', [
      Html::a(
        Html::encode('カスタムメイド 3D2 (CM3D2)'),
        'http://www.kisskiss.tv/cm3d2/',
        [
          'rel' => 'noopener noreferrer',
          'target' => '_blank',
        ]
      ),
      Html::a(
        Html::encode('カスタムオーダーメイド 3D2 (COM3D2)'),
        'https://com3d2.jp/',
        [
          'rel' => 'noopener noreferrer',
          'target' => '_blank',
        ]
      ),
      Html::a(
        Html::encode('CR EditSystem (CRES)'),
        'http://cr-edit.jp/',
        [
          'rel' => 'noopener noreferrer',
          'target' => '_blank',
        ]
      ),
    ]),
    Html::a(
      Html::encode('kiss の規約'),
      'http://www.kisskiss.tv/kiss/support.html#kiyaku',
      [
        'rel' => 'noopener noreferrer',
        'target' => '_blank',
      ]
    ),
  ]) . "\n" ?>
</p>
<p>
  <?= vsprintf('%s を利用する場合、%sが同時に適用されます。', [
    Html::a(
      Html::encode('カスタムキャスト'),
      'https://customcast.jp/',
      [
        'rel' => 'noopener noreferrer',
        'target' => '_blank',
      ]
    ),
    Html::a(
      Html::encode('カスタムキャストのガイドライン'),
      'https://customcast.jp/guidelines/',
      [
        'rel' => 'noopener noreferrer',
        'target' => '_blank',
      ]
    ),
  ]) . "\n" ?>
</p>
<p>
  その他のツールを使用する場合はそれぞれのツールの規約やガイドラインが同時に適用されます。
</p>
<hr>
<div class="mb-5">
  <?= $this->render('//about/avatar/sample-movie') ?><?= "\n" ?>
</div>
<hr>
<div class="mb-5">
  <?= $this->render('//about/avatar/cres') ?><?= "\n" ?>
</div>
<hr>
<div class="mb-5">
  <?= $this->render('//about/avatar/com3d2') ?><?= "\n" ?>
</div>
<hr>
<div class="mb-5">
  <?= $this->render('//about/avatar/cm3d2') ?><?= "\n" ?>
</div>
