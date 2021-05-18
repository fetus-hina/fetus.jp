<?php

declare(strict_types=1);

use app\assets\AppAsset;
use rmrevin\yii\fontawesome\FAB;
use rmrevin\yii\fontawesome\FAS;
use yii\helpers\Html;

$asset = AppAsset::register($this);

$divClass = ['col-12', 'col-sm-6', 'col-lg-4', 'mb-5'];

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
      <ul class="inline-list">
        <li><?= (string)FAB::icon('php')->fixedWidth() ?>PHP</li>
        <li><?= (string)FAB::icon('js')->fixedWidth() ?>JavaScript (EcmaScript)</li>
        <li>C</li>
        <li>C++</li>
        <li>Go</li>
        <li><?= (string)FAB::icon('java')->fixedWidth() ?>Java</li>
      </ul>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        Markup
      </h3>
      <ul class="inline-list mb-0">
        <li><?= (string)FAB::icon('html5')->fixedWidth() ?>HTML</li>
        <li>
          <?= (string)FAB::icon('css3')->fixedWidth() ?>CSS
          <?= vsprintf('(%s)', [
            Html::tag(
              'ul',
              implode('', [
                Html::tag('li', Html::encode('Sass')),
                Html::tag('li', Html::encode('LESS')),
              ]),
              ['class' => 'inline-list']
            ),
          ]) . "\n" ?>
        </li>
      </ul>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        Server Management
      </h3>
      <ul class="inline-list">
        <li>
          <?= (string)FAB::icon('linux')->fixedWidth() ?>Linux
          <?= vsprintf('(%s)', [
            Html::tag(
              'ul',
              implode('', array_map(
                fn($t) => Html::tag('li', $t),
                [
                  (string)FAB::icon('redhat')->fixedWidth() . 'RHEL',
                  (string)FAB::icon('centos')->fixedWidth() . 'CentOS',
                  'Debian',
                  (string)FAB::icon('ubuntu')->fixedWidth() . 'Ubuntu',
                ]
              )),
              ['class' => 'inline-list']
            ),
          ]) . "\n" ?>
        </li>
      </ul>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        Middlewares
      </h3>
      <ul class="inline-list">
        <li>Apache</li>
        <li>Nginx</li>
        <li>H2O</li>
        <li>Varnish</li>
        <li>MySQL/MariaDB</li>
        <li>PostgreSQL</li>
        <li>BIND 9</li>
        <li>Docker</li>
        <li>KVM</li>
      </ul>
    </div>
  </div>
</div>
