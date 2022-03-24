<?php

declare(strict_types=1);

use app\assets\BlogFeedAsset;
use app\helpers\Icon;
use app\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 */

$divClass = ['col-12', 'col-md-6', 'col-lg-4'];

$this->registerMetaTag(['name' => 'description', 'content' => 'fetus.jpは相沢陽菜の個人サイトです。各種連絡先、スキル、PGPキーなど。']);

?>
<div class="container">
  <h1 id="logo" class="lh-1 mb-2">fetus.jp</h1>
  <p class="smoothing">このサイトに特に内容はありません。</p>
  <div class="row">
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h2>
        <?= Icon::webService() ?> Services
      </h2>
      <p class="smoothing">
        作ったウェブサービス
      </p>
      <p class="smoothing">
        <?= Html::a(
          Html::encode('Services') . ' ' . Icon::next(),
          ['service/index'],
          ['class' => 'btn btn-outline-primary']
        ) . "\n" ?>
      </p>
    </div>

    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h2><?= Icon::aboutMe() ?> About</h2>
      <p class="smoothing">
        自己紹介的なもの、スキル一覧、PGPキー
      </p>
      <p class="smoothing">
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
    <?= Icon::wordpress() ?> <a href="https://blog.fetus.jp/">Blog</a>
  </h2>
  <div id="blog" class="smoothing">
  </div>
</div>
