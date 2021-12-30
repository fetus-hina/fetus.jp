<?php

declare(strict_types=1);

use app\assets\AppAsset;
use app\assets\BackToTopAsset;
use app\helpers\Icon;
use app\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 * @var string $content
 */

AppAsset::register($this);
BackToTopAsset::register($this);

$faviconSizes = [
    57,
    60,
    72,
    76,
    114,
    120,
    144,
    152,
    180,
];
sort($faviconSizes);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<?= Html::beginTag('html', ['lang' => Yii::$app->language]) . "\n" ?>
  <head>
    <?= Html::tag('meta', '', ['charset' => Yii::$app->charset]) . "\n" ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() . "\n" ?>
    <title><?= Html::encode($this->title ?: Yii::$app->name) ?></title>
    <?= Html::tag('link', '', [
      'href' => Yii::getAlias('@web/images/favicon.svg'),
      'rel' => 'icon',
      'sizes' => 'any',
      'type' => 'image/svg+xml',
    ]) . "\n" ?>
<?php foreach ($faviconSizes as $faviconSize) { ?>
    <?= Html::tag('link', '', [
      'href' => Yii::getAlias('@web/images') . "/apple-touch-icon-{$faviconSize}.png",
      'rel' => 'apple-touch-icon',
      'sizes' => "{$faviconSize}x{$faviconSize}",
      'type' => 'image/png',
    ]) . "\n" ?>
<?php } ?>
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
              Icon::twitter(),
              'https://twitter.com/fetus_hina'
            ) . "\n" ?>
            <?= Html::a(
              Icon::github(),
              'https://github.com/fetus-hina'
            ) . "\n" ?>
          </p>
          <p class="small m-0">
            <?= Html::a(Html::encode('Licenses'), ['license/index']) . "\n" ?>
          </p>
        </div>
      </footer>
    </div>
    <?= \kartik\dialog\Dialog::widget(['overrideYiiConfirm' => true]) . "\n" ?>
    <?php $this->endBody(); echo "\n" ?>
  </body>
</html>
<?php $this->endPage(); echo "\n" ?>
