<?php

declare(strict_types=1);

use app\assets\AppAsset;
use app\helpers\Icon;
use app\helpers\Unicode;
use app\widgets\Twemoji;
use app\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 */

$this->registerMetaTag([
  'name' => 'description',
  'content' => '相沢陽菜のアバター情報です。この設定を基に自由に再現して利用できます。カスタムメイド3D2シリーズのプリセットのダウンロードも可能です。',
]);

?>
<div class="btn-group mb-3" role="group">
  <?= Html::a(
    Icon::previous() . ' ' . Html::encode('Home'),
    ['site/index'],
    ['class' => 'btn btn-outline-primary']
  ) . "\n" ?>
  <?= Html::a(
    Icon::previous() . ' ' . Html::encode('About'),
    ['about/index'],
    ['class' => 'btn btn-outline-primary']
  ) . "\n" ?>
</div>

<h2><?= Icon::avatar() ?> Avatar</h2>
<p class="smoothing">
  需要はないと思いますが、私が使用しているアバターを再現して利用することができます。
</p>
<p class="smoothing">
  その際は、私の発言ととらえられないようにしてください（例えばご自分のアバターとしての利用は不可）。<br>
  また、営利目的での利用はできません。<br>
  アダルト方面の制限はありません<?= Twemoji::widget([
    'text' => Unicode::fromCodepoint([
      0x1F60A,
    ]),
  ]) . "\n" ?>
</p>
<p class="smoothing">
  <?= vsprintf('%s を利用する場合、%sが同時に適用されます。', [
    implode(', ', [
      Html::aR18(
        Html::encode('カスタムメイド 3D2 (CM3D2)'),
        'http://www.kisskiss.tv/cm3d2/'
      ),
      Html::aR18(
        Html::encode('カスタムオーダーメイド 3D2 (COM3D2)'),
        'https://com3d2.jp/'
      ),
      Html::aR18(
        Html::encode('CR EditSystem (CRES)'),
        'http://cr-edit.jp/'
      ),
    ]),
    Html::a(
      Html::encode('kissの規約'),
      'http://www.kisskiss.tv/kiss/support.html#kiyaku'
    ),
  ]) . "\n" ?>
</p>
<p class="smoothing">
  <?= vsprintf('%sを利用する場合、%sが同時に適用されます。', [
    Html::a(
      Html::encode('カスタムキャスト'),
      'https://customcast.jp/'
    ),
    Html::a(
      Html::encode('カスタムキャストのガイドライン'),
      'https://customcast.jp/guidelines/'
    ),
  ]) . "\n" ?>
</p>
<p class="smoothing">
  その他のツールを使用する場合はそれぞれのツールの規約やガイドラインが同時に適用されます。
</p>
<hr>
<div class="mb-4">
  <?= $this->render('//about/avatar/sample-movie') ?><?= "\n" ?>
</div>
<hr>
<div class="mb-5">
  <?= $this->render('//about/avatar/com3d25') ?><?= "\n" ?>
</div>
<hr>
<div class="mb-5">
  <?= $this->render('//about/avatar/com3d2') ?><?= "\n" ?>
</div>
<hr>
<div class="mb-5">
  <?= $this->render('//about/avatar/cm3d2') ?><?= "\n" ?>
</div>
