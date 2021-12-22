<?php

declare(strict_types=1);

use app\assets\BlogFeedAsset;
use app\helpers\Icon;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 */

$divClass = ['col-12', 'col-md-6', 'col-lg-4'];

?>
<div class="container">
  <h1 id="logo" class="lh-1 mb-2">fetus.jp</h1>
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
          Html::encode('Services') . ' ' . Icon::next(),
          ['service/index'],
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
          Html::encode('About me') . ' ' . Icon::next(),
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
