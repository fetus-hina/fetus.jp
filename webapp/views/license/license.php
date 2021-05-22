<?php

declare(strict_types=1);

use rmrevin\yii\fontawesome\FAS;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var string $title
 * @var stdClass[] $depends
 * @var View $this
 */

$id = fn($name) => vsprintf('pkg-%s-%s', [
  trim(preg_replace('/[^0-9a-zA-Z]+/', '_', $name), '_'),
  hash('crc32b', $name),
]);

?>
<p class="btn-group">
  <?= Html::a(
    (string)FAS::icon('angle-double-left') . ' ' . Html::encode('Home'),
    ['site/index'],
    ['class' => 'btn btn-outline-primary']
  ) . "\n" ?>
  <?= Html::a(
    (string)FAS::icon('angle-double-left') . ' ' . Html::encode('Licenses'),
    ['license/index'],
    ['class' => 'btn btn-outline-primary']
  ) . "\n" ?>
</p>
<h2><?= Html::encode($title) ?></h2>
<ul><?= implode('', array_map(
  fn($item) => Html::tag('li', Html::a(Html::encode($item->name), '#' . $id($item->name))),
  $depends
)) ?></ul>

<hr>

<?php foreach ($depends as $item) { ?>

<?= Html::beginTag('div', ['class' => 'mb-4', 'id' => $id($item->name)]) . "\n" ?>
  <h3><?= Html::encode($item->name) ?></h3>
  <div class="card ms-4">
    <div class="card-body"><?= $item->html ?></div>
  </div>
</div>
<?php } ?>
