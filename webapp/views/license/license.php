<?php

declare(strict_types=1);

use app\actions\license\LicenseEntry;
use app\helpers\Icon;
use app\helpers\Html;
use yii\web\View;

/**
 * @var string $title
 * @var LicenseEntry[] $depends
 * @var View $this
 */

$id = fn (string $name): string => vsprintf('pkg-%s-%s', [
  trim((string)preg_replace('/[^0-9a-zA-Z]+/', '_', $name), '_'),
  hash('crc32b', $name),
]);

// Zero Width Space
$wbr = (string)mb_chr(0x200b, 'UTF-8');

$breakable = fn (string $text): string => (string)preg_replace_callback(
  '/[@\/]/',
  fn(array $match): string => match($match[0]) {
    '@' => "{$wbr}{$match[0]}",
    '/' => "{$match[0]}{$wbr}",
    default => "{$wbr}{$match[0]}{$wbr}",
  },
  $text
);

$this->registerMetaTag(['name' => 'description', 'content' => '利用しているオープンソースプロジェクトのライセンス表示です。']);

?>
<p class="btn-group">
  <?= Html::a(
    Icon::previous() . ' ' . Html::encode('Home'),
    ['site/index'],
    ['class' => 'btn btn-outline-primary']
  ) . "\n" ?>
  <?= Html::a(
    Icon::previous() . ' ' . Html::encode('Licenses'),
    ['license/index'],
    ['class' => 'btn btn-outline-primary']
  ) . "\n" ?>
</p>
<h2><?= Html::encode($title) ?></h2>
<ul><?= implode('', array_map(
  fn(LicenseEntry $item): string => Html::tag(
    'li',
    Html::a(
      $breakable(Html::encode($item->name)),
      '#' . $id($item->name),
    ),
  ),
  $depends
)) ?></ul>

<hr>

<?php foreach ($depends as $item) { ?>

<?= Html::beginTag('div', ['class' => 'mb-4', 'id' => $id($item->name)]) . "\n" ?>
  <h3><?= $breakable(Html::encode($item->name)) ?></h3>
  <div class="card ms-4">
    <div class="card-body"><?= $item->html ?></div>
  </div>
</div>
<?php } ?>
