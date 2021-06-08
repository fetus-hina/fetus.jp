<?php

declare(strict_types=1);

use app\assets\AppAsset;
use rmrevin\yii\fontawesome\FAB;
use rmrevin\yii\fontawesome\FAS;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 */

$asset = AppAsset::register($this);

$wbr = html_entity_decode('&#x200b;', ENT_QUOTES | ENT_HTML5, 'UTF-8'); // Zero Width Space
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
        <?= (string)FAS::icon('user') ?> Handle
      </h3>
      <p>
        相沢 陽菜（あいざわ・ひな）<br>
        AIZAWA Hina
      </p>
      <p>
        <?= Html::a('アバターについて', ['about/avatar']) . "\n" ?>
      </p>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        <?= (string)FAS::icon('home') ?> Address
      </h3>
      <p>
        <a href="https://ja.wikipedia.org/wiki/%E5%AF%9D%E5%B1%8B%E5%B7%9D%E5%B8%82">大阪府寝屋川市</a><br>
        <a href="https://en.wikipedia.org/wiki/Neyagawa,_Osaka">Neyagawa, Osaka</a>, Japan
      </p>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        <?= (string)FAS::icon('envelope') ?> Email
      </h3>
      <p>
        <span class="monospace">&lt;hina@fetus.jp&gt;</span><br>
        You can use encrypted email with my PGP Key.
      </p>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        <?= (string)FAS::icon('thumbs-up') ?> SNS
      </h3>
      <p><?= implode(Html::tag('br'), [
        (string)FAB::icon('twitter') . ' ' . Html::a(
          Html::encode('@fetus_hina'),
          'https://twitter.com/fetus_hina'
        ),
        (string)FAB::icon('github') . ' ' . Html::a(
          Html::encode('@fetus-hina'),
          'https://github.com/fetus-hina'
        ),
        (string)FAB::icon('mastodon') . ' ' . Html::a(
          Html::encode('@fetus_hina@don.fetus.jp'),
          'https://don.fetus.jp/@fetus_hina'
        ),
        (string)FAB::icon('wordpress') . ' ' .Html::a(
          Html::encode('Blog'),
          'https://blog.fetus.jp/'
        ),
      ]) ?></p>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        <?= (string)FAS::icon('key') ?> Public Keys
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
        <?= (string)FAS::icon('language') ?> Language
      </h3>
      <p>
        日本語 / Japanese
      </p>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        <?= (string)FAS::icon('broadcast-tower') ?> Amateur Radio
      </h3>
      <p>
        JP3CKI (GL:PM74, JCC#2517)<br>
        JN4QYA (GL:PM64, JCC#350105)
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
        <li><?= (string)FAB::icon('php') ?> PHP</li>
        <li><?= (string)FAB::icon('js') ?> JavaScript (EcmaScript)</li>
        <li>C</li>
        <li>C++</li>
        <li>Go</li>
        <li><?= (string)FAB::icon('java') ?> Java</li>
      </ul>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        Markup
      </h3>
      <ul class="inline-list mb-0">
        <li><?= (string)FAB::icon('html5') ?> HTML</li>
        <li>
          <?= (string)FAB::icon('css3') ?>CSS
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
          <?= (string)FAB::icon('linux') ?> Linux
          <?= vsprintf('(%s)', [
            Html::tag(
              'ul',
              implode('', array_map(
                fn($t) => Html::tag('li', $t),
                [
                  (string)FAB::icon('redhat') . ' RHEL',
                  (string)FAB::icon('centos') . ' CentOS',
                  'Debian',
                  (string)FAB::icon('ubuntu') . ' Ubuntu',
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
      <ul class="inline-list"><?= implode('', array_map(
        fn($t) => Html::tag('li', Html::encode($t)),
        [
          'Apache',
          'Nginx',
          'H2O',
          'Varnish',
          "MySQL/{$wbr}MariaDB",
          'PostgreSQL',
          'BIND 9',
          'Docker',
          'KVM',
        ]
      )) ?></ul>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        National Licenses
      </h3>
      <ul class="inline-list"><?= implode('', array_map(
        fn($t) => Html::tag('li', Html::encode($t)),
        [
          '第二種電気工事士',
          '届出電気通信事業者',
          '第4級アマチュア無線技士',
        ]
      )) ?></ul>
    </div>
  </div>
</div>
