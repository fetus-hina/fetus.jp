<?php

declare(strict_types=1);

use rmrevin\yii\fontawesome\FAS;
use yii\helpers\Html;

?>
<p>
  <?= Html::a(
    (string)FAS::icon('angle-double-left') . ' ' . Html::encode('Home'),
    ['site/index'],
    ['class' => 'btn btn-outline-primary']
  ) . "\n" ?>
</p>
<h2>Open Source Licenses</h2>

<hr>

<h3>fetus.jp</h3>
<div class="card ms-4">
  <div class="card-body">
    <?= Html::tag(
      'pre',
      Html::encode((string)@file_get_contents(Yii::getAlias('@app/LICENSE'))),
      ['class' => 'm-0']
    ) . "\n" ?>
  </div>
</div>

<hr>
<h3>Application Template</h3>
<div class="card ms-4">
  <div class="card-body">
    <?= Html::tag(
      'pre',
      Html::encode((string)@file_get_contents(Yii::getAlias('@app/yii-LICENSE.md'))),
      ['class' => 'm-0']
    ) . "\n" ?>
  </div>
</div>

<hr>

<h3>Dependencies</h3>
<ul>
  <li><?= Html::a(Html::encode('Composer packages'), ['license/composer']) ?></li>
  <li><?= Html::a(Html::encode('NPM packages'), ['license/npm']) ?></li>
</ul>
