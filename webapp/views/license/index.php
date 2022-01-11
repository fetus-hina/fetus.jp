<?php

declare(strict_types=1);

use app\helpers\Icon;
use app\helpers\Html;

?>
<p>
  <?= Html::a(
    Icon::previous() . ' ' . Html::encode('Home'),
    ['site/index'],
    ['class' => 'btn btn-outline-primary']
  ) . "\n" ?>
</p>
<h2>Open Source Licenses</h2>
<ul>
  <li><?= Html::a(Html::encode('Composer packages'), ['license/composer']) ?></li>
  <li><?= Html::a(Html::encode('NPM packages'), ['license/npm']) ?></li>
</ul>

<hr>

<h3>fetus.jp</h3>
<div class="card ms-4">
  <div class="card-body">
    <?= Html::tag(
      'pre',
      Html::encode((string)@file_get_contents((string)Yii::getAlias('@app/LICENSE'))),
      ['class' => 'm-0 fs-6 lh-sm']
    ) . "\n" ?>
  </div>
</div>

<hr>
<h3>Application Template (yii2-app-basic)</h3>
<div class="card ms-4">
  <div class="card-body">
    <?= Html::tag(
      'pre',
      Html::encode((string)@file_get_contents((string)Yii::getAlias('@app/yii-LICENSE.md'))),
      ['class' => 'm-0 fs-6 lh-sm']
    ) . "\n" ?>
  </div>
</div>
