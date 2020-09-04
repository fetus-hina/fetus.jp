<?php

declare(strict_types=1);

use app\assets\AppAsset;
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
      '<span class="fa fa-angle-double-left"></span> ' . Html::encode('Home'),
      ['site/index'],
      ['class' => 'btn btn-outline-primary']
    ) . "\n" ?>
  </p>

  <h2>About</h2>
  <div class="row">
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        <span class="fa fa-user"></span> Handle
      </h3>
      <p>
        相沢 陽菜（あいざわ・ひな）<br>
        AIZAWA Hina
      </p>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        <span class="fa fa-home"></span> Address
      </h3>
      <p>
        <a href="https://ja.wikipedia.org/wiki/%E5%AF%9D%E5%B1%8B%E5%B7%9D%E5%B8%82">大阪府寝屋川市</a><br>
        <a href="https://en.wikipedia.org/wiki/Neyagawa,_Osaka">Neyagawa, Osaka</a>, Japan
      </p>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        <span class="fa fa-envelope"></span> Email
      </h3>
      <p>
        <span class="monospace">&lt;hina@fetus.jp&gt;</span><br>
        You can use encrypted email with my PGP Key.
      </p>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        <span class="fa fa-thumbs-up"></span> SNS
      </h3>
      <p>
        <span class="fa fa-twitter fa-fw"></span><a href="https://twitter.com/fetus_hina">@fetus_hina</a><br>
        <span class="fa fa-github fa-fw"></span><a href="https://github.com/fetus-hina">@fetus-hina</a><br>
        <span class="fa fa-fw"><img src="/images/ostatus.min.svg" style="height:1em"></span><a href="https://don.fetus.jp/@fetus_hina">@fetus_hina@don.fetus.jp</a><br>
        <span class="fa fa-wordpress fa-fw"></span><a href="https://blog.fetus.jp/">Blog</a><br>
      </p>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        <span class="fa fa-key"></span> Public Keys
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
        <span class="fa fa-language"></span> Language
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
      <p>
        PHP, JavaScript (EcmaScript), C, C++, Java
      </p>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        Markup
      </h3>
      <p>
        <span class="fa fa-html5"></span> HTML,&#32;
        <span class="fa fa-css3"></span> CSS (Sass, LESS)
      </p>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        Server Management
      </h3>
      <p>
        Linux (RHEL/CentOS, Debian/Ubuntu)
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
