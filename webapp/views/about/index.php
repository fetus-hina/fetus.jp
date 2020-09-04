<?php

declare(strict_types=1);

use app\assets\AppAsset;
use rmrevin\yii\fontawesome\FAB;
use rmrevin\yii\fontawesome\FAS;
use yii\helpers\Html;

$asset = AppAsset::register($this);
$this->registerJsFile(
  Yii::$app->assetManager->getAssetUrl($asset, 'js/about-panel.min.js'),
  ['depends' => AppAsset::class]
);

$divClass = ['col-12', 'col-sm-6', 'col-lg-4', 'about-panels'];

?>
<div class="container">
  <p>
    <?= Html::a(
      (string)FAS::icon('angle-double-left') . ' ' . Html::encode('Home'),
      ['site/index'],
      ['class' => 'btn btn-outline-primary']
    ) . "\n" ?>
  </p>

  <h2>About</h2>
  <div class="row">
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        <?= (string)FAS::icon('user')->fixedWidth() ?>Handle
      </h3>
      <p>
        相沢 陽菜（あいざわ・ひな）<br>
        AIZAWA Hina
      </p>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        <?= (string)FAS::icon('home')->fixedWidth() ?>Address
      </h3>
      <p>
        <a href="https://ja.wikipedia.org/wiki/%E5%AF%9D%E5%B1%8B%E5%B7%9D%E5%B8%82">大阪府寝屋川市</a><br>
        <a href="https://en.wikipedia.org/wiki/Neyagawa,_Osaka">Neyagawa, Osaka</a>, Japan
      </p>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        <?= (string)FAS::icon('envelope')->fixedWidth() ?>Email
      </h3>
      <p>
        <span class="monospace">&lt;hina@fetus.jp&gt;</span><br>
        You can use encrypted email with my PGP Key.
      </p>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        <?= (string)FAS::icon('thumbs-up')->fixedWidth() ?>SNS
      </h3>
      <p><?= implode(Html::tag('br'), [
        (string)FAB::icon('twitter')->fixedWidth() . Html::a(
          Html::encode('@fetus_hina'),
          'https://twitter.com/fetus_hina'
        ),
        (string)FAB::icon('github')->fixedWidth() . Html::a(
          Html::encode('@fetus-hina'),
          'https://github.com/fetus-hina'
        ),
        (string)FAB::icon('mastodon')->fixedWidth() . Html::a(
          Html::encode('@fetus_hina@don.fetus.jp'),
          'https://don.fetus.jp/@fetus_hina'
        ),
        (string)FAB::icon('wordpress')->fixedWidth() . Html::a(
          Html::encode('Blog'),
          'https://blog.fetus.jp/'
        ),
      ]) ?></p>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        <?= (string)FAS::icon('key')->fixedWidth() ?>Public Keys
      </h3>
      <p>
        <?= Html::a(
          Html::encode('PGP Keys'),
          ['about/pgp']
        ) . "\n" ?>
      </p>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        <?= (string)FAS::icon('language')->fixedWidth() ?>Language
      </h3>
      <p>
        日本語 / Japanese
      </p>
    </div>
  </div>

  <h2>Skills</h2>
  <div class="row">
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        Programming
      </h3>
      <p><?= implode(', ', [
        (string)FAB::icon('php')->fixedWidth() . 'PHP',
        (string)FAB::icon('js')->fixedWidth() . 'JavaScript (EcmaScript)',
        'C',
        'C++',
        'Go',
        (string)FAB::icon('java')->fixedWidth() . 'Java',
      ]) ?></p>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        Markup
      </h3>
      <p><?= implode(', ', [
        (string)FAB::icon('html5')->fixedWidth() . 'HTML',
        (string)FAB::icon('css3')->fixedWidth() . 'CSS (Sass, LESS)',
      ]) ?></p>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        Server Management
      </h3>
      <p>
        <?= FAB::icon('linux')->fixedWidth() ?>Linux (<?= implode(', ', [
          (string)FAB::icon('redhat')->fixedWidth() . 'RHEL',
          (string)FAB::icon('centos')->fixedWidth() . 'CentOS',
          'Debian',
          (string)FAB::icon('ubuntu')->fixedWidth() . 'Ubuntu',
        ]) ?>)
      </p>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        Middlewares
      </h3>
      <p>
        Apache, Nginx, H2O, Varnish, MySQL/MariaDB, PostgreSQL, BIND 9, Docker, KVM
      </p>
    </div>
  </div>
</div>
