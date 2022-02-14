<?php

declare(strict_types=1);

use app\helpers\Html;
use app\helpers\Icon;
use yii\web\View;

/**
 * @var View $this
 */

$divClass = ['col-12', 'col-md-6', 'col-lg-4', 'mb-4', 'adj-height'];

$this->registerMetaTag(['name' => 'description', 'content' => '相沢陽菜の作成・運営したサービス等の一覧ページです。']);

?>
<div class="container">
  <p>
    <?= Html::a(
      Icon::previous() . ' ' . Html::encode('Home'),
      ['site/index'],
      ['class' => 'btn btn-outline-primary']
    ) . "\n" ?>
  </p>

  <h2><?= Icon::webService() ?> Services</h2>
  <p>
    個人的に作ったウェブサービスなど
  </p>

  <h3>
    Splatoon/Splatoon 2 関連サービス
  </h3>
  <p>
    ※個人的に作成したもので、任天堂株式会社とは一切関係ありません。
  </p>
  <div class="row">
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h4>
        stat.ink
      </h4>
      <p>
        ソフトウェア「IkaLog」「イカレコ」「SquidTracks」「splatnet2statink」などと連携して、Splatoon
        の個人成績を記録・集計するウェブサイトです。
      </p>
      <p>
        2021年8月現在、700万以上のバトルと39万以上のSalmon Runリザルトが1.3万人以上の利用者によって記録されています。
      </p>
      <p>
        ソフトウェアのソースはMIT Licenseで公開しています。
      </p>
      <p>
        <?= Html::a(
          Html::encode('stat.ink') . ' ' . Icon::next(),
          'https://stat.ink/',
          ['class' => 'btn btn-outline-primary']
        ) . "\n" ?>
        <?= Html::a(
          Icon::github() . ' ' . Html::encode('ソース') . ' ' . Icon::next(),
          'https://github.com/fetus-hina/stat.ink',
          ['class' => 'btn btn-outline-primary']
        ) . "\n" ?>
      </p>
    </div>

    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h4>
        イカフェスレート (fest.ink)
      </h4>
      <p>
        Splatoon内ゲームイベント「フェス」の勝敗を、公式に発表されている一部の情報から高精度で推測するウェブサイトです。
      </p>
      <p>
        ソフトウェアのソースはMIT Licenseで公開しています。
      </p>
      <p>
        <?= Html::a(
          Html::encode('イカフェスレート') . ' ' . Icon::next(),
          'https://fest.ink/',
          ['class' => 'btn btn-outline-primary']
        ) . "\n" ?>
        <?= Html::a(
          Icon::github() . ' ' . Html::encode('ソース') . ' ' . Icon::next(),
          'https://github.com/fetus-hina/fest.ink',
          ['class' => 'btn btn-outline-primary']
        ) . "\n" ?>
      </p>
    </div>
  </div>

  <h3>
    その他のウェブサービス
  </h3>
  <div class="row">
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h4>
        ipv4.fetus.jp
      </h4>
      <p>
        各国または各地域に割り振りされたIPv4アドレスの一覧を取得・検索できるウェブサイト・ウェブサービスです。
      </p>
      <p>
        「日本からのアクセスだけ許可したい」、「とある国や地域からのSMTP接続を拒絶したい」などの要求に対し、
        iptablesその他のツールに流し込めるようにしており、実際に企業や個人から利用されています。
        （cron によると思われる取得も多々あり、また、そのような利用も歓迎する方針で開発しています。
      </p>
      <p>
        <?= Html::a(
          Html::encode('ipv4.fetus.jp') . ' ' . Icon::next(),
          'https://ipv4.fetus.jp/',
          ['class' => 'btn btn-outline-primary']
        ) . "\n" ?>
        <?= Html::a(
          Icon::github() . ' ' . Html::encode('ソース') . ' ' . Icon::next(),
          'https://github.com/fetus-hina/ipv4.fetus.jp/',
          ['class' => 'btn btn-outline-primary']
        ) . "\n" ?>
      </p>
    </div>

    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h4>
        Wandbox for PHP/Hack
      </h4>
      <p>
        めるぽん氏、kikairoya氏が開発するオンラインコンパイラ「<a href="https://wandbox.org/">Wandbox</a>」のPHP特化版を運用しています。
        また、ただ利用して運用するだけではなく、本家のWandboxの開発にも関わっています。
      </p>
      <p>
        ソースコードはPHP特化版で変更した箇所も含めて、本家Wandbox同様にBoost Software Licenseで公開しています。
        また、サービスを運用するための補助ツールもGitHub上にMIT License等で公開しています。
      </p>
      <p>
        <?= Html::a(
          Html::encode('Wandbox for PHP/Hack') . ' ' . Icon::next(),
          'https://wandbox.fetus.jp/',
          ['class' => 'btn btn-outline-primary']
        ) . "\n" ?>
        <?= Html::a(
          Icon::github() . ' ' . Html::encode('ソース') . ' ' . Icon::next(),
          'https://github.com/fetus-hina/wandbox/tree/for-php',
          ['class' => 'btn btn-outline-primary']
        ) . "\n" ?>
      </p>
    </div>

    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h4>
        rpm.fetus.jp
      </h4>
      <p>
        個人的に必要になってビルドした CentOS/RHEL 用パッケージを誰でも利用できるように公開しています。
      </p>
      <p>
        <a href="https://h2o.examp1e.net/">ウェブサーバ H2O</a>、<a href="http://nginx.org/">Nginx</a>を最新のLibreSSLとリンクしてビルドしたものや、
        その他のツールをビルドして配置しています。
      </p>
      <p>
        単にSRPMを拾ってきてリビルドしたもの以外は、GitHub上でビルドスクリプトも公開しています。
      </p>
      <p>
        <?= Html::a(
          Html::encode('rpm.fetus.jp') . ' ' . Icon::next(),
          'https://rpm.fetus.jp/',
          ['class' => 'btn btn-outline-primary']
        ) . "\n" ?>
      </p>
    </div>

    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h4>
        onestop.fetus.jp
      </h4>
      <p>
        ふるさと納税のワンストップ特例申請書に必要項目をそれなりに埋めたPDFを作成するウェブサイトです。
      </p>
      <p>
        ソフトウェアのソースはMIT Licenseで公開しています。
      </p>
      <p>
        <?= Html::a(
          Html::encode('onestop.fetus.jp') . Icon::next(),
          'https://onestop.fetus.jp/',
          ['class' => 'btn btn-outline-primary']
        ) . "\n" ?>
        <?= Html::a(
          Icon::github() . ' ' . Html::encode('ソース') . ' ' . Icon::next(),
          'https://github.com/fetus-hina/onestop.fetus.jp/',
          ['class' => 'btn btn-outline-primary']
        ) . "\n" ?>
      </p>
    </div>

    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h4>
        haraikomi.fetus.jp
      </h4>
      <p>
        ゆうちょ銀行の払込取扱票を印刷するためのウェブサイトです。
      </p>
      <p>
        ソフトウェアのソースはMIT Licenseで公開しています。
      </p>
      <p>
        <?= Html::a(
          Html::encode('haraikomi.fetus.jp') . ' ' . Icon::next(),
          'https://haraikomi.fetus.jp/',
          ['class' => 'btn btn-outline-primary']
        ) . "\n" ?>
        <?= Html::a(
          Icon::github() . ' ' . Html::encode('ソース') . ' ' . Icon::next(),
          'https://github.com/fetus-hina/haraikomi',
          ['class' => 'btn btn-outline-primary']
        ) . "\n" ?>
      </p>
    </div>
  </div>

  <h3>
    閉鎖済みサービス
  </h3>
  <div class="row">
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h4>
        Splapi
      </h4>
      <p>
        Splatoon内のステージ・ルールの日程について取得することができるAPIを提供するウェブサービスです。
      </p>
      <p>
        元々は別の方が作成されたAPIの諸事情による廃止に伴い、API互換性を持った形でフルスクラッチで作成したものです。
      </p>
      <div>
        <?= Html::a(
          Html::encode('Splapi') . ' ' . Icon::next(),
          'https://splapi.fetus.jp/',
          ['class' => 'btn btn-outline-primary']
        ) . "\n" ?>
        <div class="btn-group" role="group">
          <?= Html::a(
            Html::encode('SPLAPI 2') . ' ' . Icon::next(),
            'https://splapi2.stat.ink/',
            ['class' => 'btn btn-outline-primary']
          ) . "\n" ?>
          <?= Html::a(
            Icon::github() . ' ' . Icon::next(),
            'https://github.com/fetus-hina/splapi2.stat.ink',
            ['class' => 'btn btn-outline-primary']
          ) . "\n" ?>
        </div>
      </div>
    </div>
    <?= Html::beginTag('div', ['class' => $divClass]) . "\n" ?>
      <h4>
        ICOMU-M@STER
      </h4>
      <p>
        アーケード版・Xbox 360版・PSP版・Nintendo DS版の THE IDOLM@STER コミュニケーション攻略サイトです。
        別の方（故人）からデータを引き継いで運営していました。
      </p>
      <p>
        「1育成1万円」という大変難しいゲームで多くの方からご利用いただいていました。
        （印刷物のゲームセンターへの設置も多くありました）
      </p>
      <p>
        システムが古くメンテナンスできないこと、アーケード版のオンラインサービスが終了し、既にほとんど筐体が残っていないこと、
        コンシューマ用もほぼアクセスがなかったことから、既に役割は終えたものとしてサービスは終了しています。
      </p>
      <p>
        <?= Html::a(
          Html::encode('Wayback Machine') . ' ' . Icon::next(),
          'https://web.archive.org/web/20140110165622/http://icomu-master.info/',
          ['class' => 'btn btn-outline-primary']
        ) . "\n" ?>
      </p>
    </div>
  </div>

  <h3>
    その他
  </h3>
  <p>
    各種ツール・サービスを作成する上で必要になったパーツは一部、パッケージの形で切り出して Packagist などに公開しています。
  </p>
  <p>
    それによって、Composer などのパッケージマネージャから手軽に利用出来るようになっています。
  </p>
  <p>
    それらのパーツは、GitHub にて MIT License などのゆるいライセンス、または Unlicense・NYSL などのパブリックドメインで公開し、誰でも手軽に利用できるようにしています。
  </p>
</div>
