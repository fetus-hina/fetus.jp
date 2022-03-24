<?php

declare(strict_types=1);

use app\assets\AppAsset;
use app\helpers\Html;
use app\helpers\Icon;
use app\helpers\Unicode;
use app\widgets\JapaneseFlag;
use app\widgets\Twemoji;
use yii\web\View;

/**
 * @var View $this
 */

$asset = AppAsset::register($this);

$wbr = mb_chr(0x200b, 'UTF-8'); // U+200B, Zero Width Space
$divClass = ['col-12', 'col-sm-6', 'col-lg-4', 'mb-5'];

$this->registerMetaTag(['name' => 'description', 'content' => '相沢陽菜のプロフィールページです。']);

?>
<div class="container">
  <p class="smoothing">
    <?= Html::a(
      Icon::previous() . ' ' . Html::encode('Home'),
      ['site/index'],
      ['class' => 'btn btn-outline-primary']
    ) . "\n" ?>
  </p>

  <h2><?= Icon::aboutMe() ?> About</h2>
  <div class="row">
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        <?= Icon::user() ?> Handle
      </h3>
      <p class="smoothing">
        相沢 陽菜（あいざわ・ひな）<br>
        AIZAWA Hina
      </p>
      <p class="smoothing">
        <?= Icon::avatar() . "\n" ?>
        <?= Html::a(
          Html::encode('アバターについて'),
          ['about/avatar']
        ) . "\n" ?>
      </p>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        <?= Icon::house() ?> Address
      </h3>
      <p class="smoothing">
        <?= vsprintf('%s %s', [
          JapaneseFlag::widget(),
          Html::a('大阪府寝屋川市', 'https://ja.wikipedia.org/wiki/%E5%AF%9D%E5%B1%8B%E5%B7%9D%E5%B8%82'),
        ]) ?><br>
        <?= vsprintf('%s %s', [
          JapaneseFlag::widget(),
          vsprintf('%s, Japan', [
            Html::a('Neyagawa, Osaka', 'https://en.wikipedia.org/wiki/Neyagawa,_Osaka'),
          ]),
        ]) . "\n" ?>
      </p>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        <?= Icon::envelope() ?> Email
      </h3>
      <p class="smoothing">
        <span class="font-monospace">&lt;hina@fetus.jp&gt;</span><br>
        You can use encrypted email with <?= Html::a('my PGP Key', ['about/pgp']) ?>.
      </p>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        <?= Icon::like() ?> SNS
      </h3>
      <p class="smoothing"><?= implode(Html::tag('br'), [
        Icon::twitter() . ' ' . Html::a(
          Html::encode('@fetus_hina'),
          vsprintf('https://twitter.com/intent/user?%s', [
            http_build_query(['user_id' => '66695324']),
          ]),
        ),
        Icon::github() . ' ' . Html::a(
          Html::encode('@fetus-hina'),
          'https://github.com/fetus-hina'
        ),
        Icon::mastodon() . ' ' . Html::a(
          Html::encode('@fetus_hina@don.fetus.jp'),
          'https://don.fetus.jp/@fetus_hina'
        ),
        Icon::wordpress() . ' ' . Html::a(
          Html::encode('Blog'),
          'https://blog.fetus.jp/'
        ),
      ]) ?></p>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        <?= Icon::key() ?> Public Keys
      </h3>
      <p class="smoothing">
        <?= Html::a(
          Html::encode('PGP Keys'),
          ['about/pgp']
        ) . "\n" ?>
      </p>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        <?= Icon::language() ?> Language
      </h3>
      <p class="smoothing">
        日本語 / Japanese
      </p>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        <?= Icon::radio() ?> Amateur Radio
      </h3>
      <p class="smoothing">
        JP3CKI (GL:PM74, JCC#2517)<br>
        JN4QYA (GL:PM64, JCC#350105)
      </p>
    </div>
  </div>

  <h2><?= Icon::skill() ?> Skills</h2>
  <div class="row">
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        <?= Icon::programming() ?> Programming
      </h3>
      <ul class="inline-list smoothing">
        <li>PHP</li>
        <li>JavaScript (EcmaScript)</li>
        <li>C</li>
        <li>C++</li>
        <li>Go</li>
        <li>Java</li>
      </ul>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        <?= Icon::markup() ?> Markup
      </h3>
      <ul class="inline-list smoothing mb-0">
        <li>HTML</li>
        <li>
          CSS
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
        <?= Icon::server() ?> Server Management
      </h3>
      <ul class="inline-list">
        <li>
          Linux
          <?= vsprintf('(%s)', [
            Html::tag(
              'ul',
              implode('', array_map(
                fn($t) => Html::tag('li', Html::encode($t)),
                [
                  'RHEL',
                  'CentOS',
                  'Debian',
                  'Ubuntu',
                ]
              )),
              ['class' => 'inline-list smoothing']
            ),
          ]) . "\n" ?>
        </li>
      </ul>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        <?= Icon::middleware() ?> Middlewares
      </h3>
      <ul class="inline-list smoothing"><?= implode('', array_map(
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
          'etc...',
        ]
      )) ?></ul>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h3>
        <?= Icon::license() ?> National Licenses
      </h3>
      <ul class="inline-list smoothing"><?= implode('', array_map(
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
