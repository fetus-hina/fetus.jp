<?php

declare(strict_types=1);

use app\assets\BlogFeedAsset;
use yii\helpers\Html;

$this->registerCss('#logo{line-height:1;margin-bottom:5px}');

$divClass = ['col-12', 'col-md-6', 'col-lg-4'];
?>
<div class="container">
  <h1 id="logo">fetus.jp</h1>
  <p>このサイトに特に内容はありません。</p>
  <div class="row">
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h2>
        Services
      </h2>
      <p>
        作ったウェブサービス
      </p>
      <p>
        <?= Html::a(
          Html::encode('Services') . ' &raquo;',
          ['service/index'],
          ['class' => 'btn btn-outline-primary']
        ) . "\n" ?>
      </p>
    </div>

    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h2>
        Sense Log
      </h2>
      <p>
        観測したデータの保存場所
      </p>
      <p>
        <?= Html::a(
          Html::encode('Sense Log') . ' &raquo;',
          ['sense-log/index'],
          ['class' => 'btn btn-outline-primary']
        ) . "\n" ?>
      </p>
    </div>

    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h2>About</h2>
      <p>
        自己紹介的なもの、スキル一覧、PGPキー
      </p>
      <p>
        <?= Html::a(
          Html::encode('About me') . ' &raquo;',
          ['about/index'],
          ['class' => 'btn btn-outline-primary']
        ) . "\n" ?>
      </p>
    </div>
  </div>

<?php BlogFeedAsset::register($this) ?>
  <h2>
    <a href="https://blog.fetus.jp/">Blog</a>
  </h2>
  <div id="blog">
  </div>
</div>
