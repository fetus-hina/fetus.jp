{{strip}}
<div class="container">
  <p>
    <a href="{{url route="/"}}" class="btn btn-default">
      <span class="fa fa-angle-double-left"></span>&#32;
      Home
    </a>
  </p>

  <h2>Services</h2>
  <p>
    個人的に作ったウェブサービスなど
  </p>

  <h3>
    <a href="https://www.nintendo.co.jp/wiiu/agmj/index.html">Splatoon</a>関連サービス
  </h3>
  <p>
    ※個人的に作成したもので、任天堂株式会社とは一切関係ありません。
  </p>
  <div class="row">
    {{$_cls = 'col-xs-12 col-md-6 col-lg-4 adj-height'}}
    <div class="{{$_cls|escape}}">
      <h4>
        stat.ink
      </h4>
      <p>
        ソフトウェア「<a href="https://github.com/hasegaw/IkaLog">IkaLog</a>」や
        「<a href="https://play.google.com/store/apps/details?id=com.syanari.merluza.ikarec&amp;hl=ja">イカレコ</a>」と連携して、
        Splatoonの個人成績を記録・集計するウェブサイトです。
      </p>
      <p>
        2017年3月現在、260万以上のバトルが7000人以上の利用者によって記録されています。
      </p>
      <p>
        ソフトウェアのソースはMIT Licenseで公開しています。
      </p>
      <p>
        <a href="https://stat.ink/" class="btn btn-default">
          stat.ink &raquo;
        </a> <a href="https://github.com/fetus-hina/stat.ink" class="btn btn-default">
          <span class="fa fa-github"></span> ソース &raquo;
        </a>
      </p>
    </div>

    <div class="{{$_cls|escape}}">
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
        <a href="https://fest.ink/" class="btn btn-default">
          イカフェスレート &raquo;
        </a> <a href="https://github.com/fetus-hina/fest.ink" class="btn btn-default">
          <span class="fa fa-github"></span> ソース &raquo;
        </a>
      </p>
    </div>

    <div class="{{$_cls|escape}}">
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
        <a href="https://splapi.fetus.jp/" class="btn btn-default">
          Splapi &raquo;
        </a> <div class="btn-group" role="group">
          <a href="https://splapi2.stat.ink/" class="btn btn-default">
            SPLAPI 2 &raquo;
          </a>
          <a href="https://github.com/fetus-hina/splapi2.stat.ink" class="btn btn-default">
            <span class="fa fa-github"></span> &raquo;
          </a>
        </div>
      </div>
    </div>
  </div>

  <h3>
    その他のウェブサービス
  </h3>
  <div class="row">
    <div class="{{$_cls|escape}}">
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
        将来的にはオープンソースにする予定もありますが、現時点ではクローズドソースです。
      </p>
      <p>
        <a href="https://ipv4.fetus.jp/" class="btn btn-default">
          ipv4.fetus.jp &raquo;
        </a>
      </p>
    </div>

    <div class="{{$_cls|escape}}">
      <h4>
        Wandbox for PHP/Hack
      </h4>
      <p>
        めるぽん氏、kikairoya氏が開発するオンラインコンパイラ「<a href="http://melpon.org/wandbox/">Wandbox</a>」のPHP特化版を運用しています。
        また、ただ利用して運用するだけではなく、本家のWandboxの開発にも関わっています。
      </p>
      <p>
        ソースコードはPHP特化版で変更した箇所も含めて、本家Wandbox同様にBoost Software Licenseで公開しています。
        また、サービスを運用するための補助ツールもGitHub上にMIT License等で公開しています。
      </p>
      <p>
        <a href="https://wandbox.fetus.jp/" class="btn btn-default">
          Wandbox for PHP/Hack &raquo;
        </a> <a href="https://github.com/fetus-hina/wandbox/tree/for-php" class="btn btn-default">
          <span class="fa fa-github"></span> ソース &raquo;
        </a>
      </p>
    </div>

    <div class="{{$_cls|escape}}">
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
        <a href="https://rpm.fetus.jp/" class="btn btn-default">
          rpm.fetus.jp &raquo;
        </a>
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
{{/strip}}
