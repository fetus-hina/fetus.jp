<?php

declare(strict_types=1);

use app\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
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
      <?php NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
          'class' => 'navbar-inverse navbar-fixed-top'
        ]
      ]); echo "\n" ?>
      <?= Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
          ['label' => '<span class="fa fa-home fa-fw"></span>Home', 'url' => ['/site/index'], 'encode' => false],
          ['label' => '<span class="fa fa-gear fa-fw"></span>Services', 'url' => ['/service/index'], 'encode' => false],
          ['label' => '<span class="fa fa-thermometer-half fa-fw"></span>Sense Log', 'url' => ['/sense-log/index'], 'encode' => false],
          ['label' => '<span class="fa fa-user fa-fw"></span>About', 'url' => ['/about/index'], 'encode' => false, 'items' => [
            ['label' => '<span class="fa fa-user fa-fw"></span>About', 'url' => ['/about/index'], 'encode' => false],
            ['label' => '<span class="fa fa-key fa-fw"></span>PGP Keys', 'url' => ['/about/pgp'], 'encode' => false]
          ]]
        ]
      ]) . "\n" ?>
      <?php NavBar::end(); echo "\n" ?>
      <div class="container">
        <?= $content ?><?= "\n" ?>
      </div>
    </div>
    <?php $this->endBody(); echo "\n" ?>
  </body>
</html>
<?php $this->endPage(); echo "\n" ?>
