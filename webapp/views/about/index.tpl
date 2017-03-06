{{strip}}
<div class="container">
  <p>
    <a href="{{url route="/"}}" class="btn btn-default">
      <span class="fa fa-angle-double-left"></span>&#32;
      Home
    </a>
  </p>

  <h2>About</h2>
  <div class="row">
    {{$_cls = 'col-xs-12 col-sm-6 col-lg-4 about-panels'}}
    {{$this->registerJsFile('@web/js/about-panel.min.js', ['depends' => 'yii\web\JqueryAsset'])|@void}}
    <div class="{{$_cls|escape}}">
      <h3>
        <span class="fa fa-user"></span> Handle
      </h3>
      <p>
        相沢 陽菜（あいざわ・ひな）<br>
        AIZAWA Hina
      </p>
    </div>
    <div class="{{$_cls|escape}}">
      <h3>
        <span class="fa fa-home"></span> Address
      </h3>
      <p>
        <a href="https://ja.wikipedia.org/wiki/%E5%AF%9D%E5%B1%8B%E5%B7%9D%E5%B8%82">大阪府寝屋川市</a><br>
        <a href="https://en.wikipedia.org/wiki/Neyagawa,_Osaka">Neyagawa, Osaka</a>, Japan
      </p>
    </div>
    <div class="{{$_cls|escape}}">
      <h3>
        <span class="fa fa-envelope"></span> Email
      </h3>
      <p>
        <span class="monospace">&lt;hina@bouhime.com&gt;</span><br>
        You can use encrypted email with my PGP Key.
      </p>
    </div>
    <div class="{{$_cls|escape}}">
      <h3>
        <span class="fa fa-thumbs-up"></span> SNS
      </h3>
      <p>
        <span class="fa fa-twitter"></span> <a href="https://twitter.com/fetus_hina">@fetus_hina</a><br>
        <span class="fa fa-github"></span> <a href="https://github.com/fetus-hina">@fetus-hina</a><br>
      </p>
    </div>
    <div class="{{$_cls|escape}}">
      <h3>
        <span class="fa fa-key"></span> Public Keys
      </h3>
      <p>
        <a href="{{url route="/about/pgp"}}">PGP Keys</a>
      </p>
    </div>
    <div class="{{$_cls|escape}}">
      <h3>
        <span class="fa fa-language"><span> Language
      </h3>
      <p>
        日本語 / Japanese
      </p>
    </div>
  </div>

  <h2>Skills</h2>
  <div class="row">
    <div class="{{$_cls|escape}}">
      <h3>
        Programming
      </h3>
      <p>
        PHP, JavaScript (EcmaScript), C, C++, Java
      </p>
    </div>
    <div class="{{$_cls|escape}}">
      <h3>
        Markup
      </h3>
      <p>
        <span class="fa fa-html5"></span> HTML,&#32;
        <span class="fa fa-css3"></span> CSS (Sass, LESS)
      </p>
    </div>
    <div class="{{$_cls|escape}}">
      <h3>
        Server Management
      </h3>
      <p>
        Linux (RHEL/CentOS, Debian/Ubuntu)
      </p>
    </div>
    <div class="{{$_cls|escape}}">
      <h3>
        Middlewares
      </h3>
      <p>
        Apache, Nginx, H2O, Varnish, MySQL/MariaDB, PostgreSQL, BIND 9, Docker, KVM
      </p>
    </div>
  </div>

  <h2>Services</h2>
  <ul>
    <li>
      Splatoon-related services:
      <ul>
        <li>
          <a href="https://stat.ink/">stat.ink</a> (<a href="https://github.com/fetus-hina/stat.ink">Open Source</a>: MIT)
        </li>
        <li>
          <a href="https://fest.ink/">イカフェスレート</a> (<a href="https://github.com/fetus-hina/fest.ink">Open Source</a>: MIT)
        </li>
        <li>
          <a href="https://splapi.fetus.jp/">Splapi</a> (Closed Source)
        </li>
      </ul>
    </li>
    <li>
      <a href="https://ipv4.fetus.jp/">ipv4.fetus.jp</a> (Closed Source, as of now)
    </li>
    <li>
      <a href="https://wandbox.fetus.jp/">Wandbox for PHP/Hack</a> (<a href="https://github.com/fetus-hina/wandbox/tree/for-php">Open Source</a>, PHP-specialized version of <a href="http://melpon.org/wandbox/">Wandbox</a>)
    </li>
    <li>
      <a href="https://rpm.fetus.jp/">rpm.fetus.jp</a> (My package collection for RHEL/CentOS)
    </li>
    <li>
      and more
    </li>
  </ul>
{{/strip}}