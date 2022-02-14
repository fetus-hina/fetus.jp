<?php

declare(strict_types=1);

use app\assets\AppAsset;
use app\assets\BackToTopAsset;
use app\helpers\Html;
use app\helpers\Icon;
use app\widgets\R18Dialog;
use yii\web\View;

/**
 * @var View $this
 * @var string $content
 */

AppAsset::register($this);
BackToTopAsset::register($this);

$faviconSizes = [57, 60, 72, 76, 114, 120, 144, 152, 180];
sort($faviconSizes, SORT_NUMERIC);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width,initial-scale=1']);
$this->registerMetaTag(['name' => 'robots', 'content' => 'index,follow']);
$this->registerLinkTag([
    'href' => Yii::getAlias('@web/images/favicon.svg'),
    'rel' => 'icon',
    'sizes' => 'any',
    'type' => 'image/svg+xml',
]);
foreach ($faviconSizes as $faviconSize) {
    $this->registerLinkTag([
        'href' => Yii::getAlias('@web/images') . "/apple-touch-icon-{$faviconSize}.png",
        'rel' => 'apple-touch-icon',
        'sizes' => "{$faviconSize}x{$faviconSize}",
        'type' => 'image/png',
    ]);
}
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<?= Html::beginTag('html', [
  'class' => 'h-100',
  'lang' => Yii::$app->language,
]) . "\n" ?>
  <head>
    <?= Html::tag('meta', '', ['charset' => Yii::$app->charset]) . "\n" ?>
    <title><?= Html::encode($this->title ?: Yii::$app->name) ?></title>
    <?= $this->head() . "\n" ?>
  </head>
  <body class="h-100">
    <?php $this->beginBody(); echo "\n" ?>
    <?= Html::beginTag('div', [
      'class' => [
        'd-flex',
        'flex-column',
        'h-100',
        'wrap',
      ],
    ]) . "\n" ?>
      <header class="mb-3">
        <div class="container">
          <h1><?= Html::a(
            Html::encode('fetus'),
            ['site/index']
          ) ?></h1>
        </div>
      </header>
      <?= Html::tag('main', $content, [
        'class' => [
          'container',
          'flex-grow-1',
        ],
      ]) . "\n" ?>
      <?= Html::beginTag('footer', [
        'class' => [
          'bg-light',
          'border-secondary',
          'border-top',
          'pt-3',
        ],
      ]) . "\n" ?>
        <div class="container text-end pb-1">
          <p class="m-0">
            Copyright &copy; <?= Html::a(Html::encode('AIZAWA Hina'), ['site/index']) . "\n" ?>
            <?= Html::a(
              Icon::twitter(),
              vsprintf('https://twitter.com/intent/user?%s', [
                http_build_query(
                  ['user_id' => '66695324'],
                ),
              ]),
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
    <?= R18Dialog::widget() . "\n" ?>
    <?php $this->endBody(); echo "\n" ?>
  </body>
</html>
<?php $this->endPage(); echo "\n" ?>
