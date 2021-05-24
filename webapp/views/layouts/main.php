<?php

declare(strict_types=1);

use app\assets\AppAsset;
use app\assets\BackToTopAsset;
use rmrevin\yii\fontawesome\FAB;
use yii\helpers\Html;

AppAsset::register($this);
BackToTopAsset::register($this);

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
        <div class="container text-end pb-1">
          <p class="m-0">
            Copyright &copy; <?= Html::a(Html::encode('AIZAWA Hina'), ['site/index']) . "\n" ?>
            <?= Html::a(
              (string)FAB::icon('twitter'),
              'https://twitter.com/fetus_hina'
            ) . "\n" ?>
            <?= Html::a(
              (string)FAB::icon('github'),
              'https://github.com/fetus-hina'
            ) . "\n" ?>
          </p>
          <p class="small m-0">
            <?= Html::a(Html::encode('Licenses'), ['license/index']) . "\n" ?>
          </p>
        </div>
      </footer>
    </div>
    <?php $this->endBody(); echo "\n" ?>
  </body>
</html>
<?php $this->endPage(); echo "\n" ?>
