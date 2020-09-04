<?php

declare(strict_types=1);

use app\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<?= Html::beginTag('html', ['lang' => Yii::$app->language]) . "\n" ?>
  <head>
    <?= Html::tag('meta', ['charset' => Yii::$app->charset]) . "\n" ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() . "\n" ?>
    <title><?= Html::encode($this->title ?: Yii::$app->name) ?></title>
    <?= $this->head() . "\n" ?>
  </head>
  <body>
    <?php $this->beginBody(); echo "\n" ?>
    <div class="wrap">
      <header class="mb-3">
        <div class="container">
          <h1><?= Html::a(
            Html::encode('fetus'),
            ['site/index']
          ) ?></h1>
        </div>
      </header>
      <div class="container">
        <?= $content ?><?= "\n" ?>
      </div>
      <footer>
        <hr>
        <div class="container text-right pb-3">
          Copyright &copy; <?= Html::a(Html::encode('AIZAWA Hina'), ['site/index']) . "\n" ?>
          <a href="https://twitter.com/fetus_hina"><span class="fa fa-twitter"></span></a>
          <a href="https://github.com/fetus-hina"><span class="fa fa-github"></span></a>
        </div>
      </footer>
    </div>
    <?php $this->endBody(); echo "\n" ?>
  </body>
</html>
<?php $this->endPage(); echo "\n" ?>
