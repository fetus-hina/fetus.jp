{{strip}}
<div class="container">
  <h1>
    fetus.jp
  </h1>
  <p>
    このサイトに特に内容はありません。
  </p>
  <div class="row">
    {{$_cls = 'col-xs-12 col-md-6 col-lg-4'}}
    <div class="{{$_cls|escape}}">
      <h2>
        Services
      </h2>
      <p>
        作ったウェブサービス
      </p>
      <p>
        <a href="{{url route="/service/index"}}" class="btn btn-default">
          Services &raquo;
        </a>
      </p>
    </div>

    <div class="{{$_cls|escape}}">
      <h2>
        Sense Log
      </h2>
      <p>
        観測したデータの保存場所
      </p>
      <p>
        <a href="{{url route="/sense-log/index"}}" class="btn btn-default">
          Sense Log &raquo;
        </a>
      </p>
    </div>

    <div class="{{$_cls|escape}}">
      <h2>About</h2>
      <p>
        自己紹介的なもの、スキル一覧、PGPキー
      </p>
      <p>
        <a href="{{url route="/about/index"}}" class="btn btn-default">
          About me &raquo;
        </a>
      </p>
    </div>
  </div>
</div>
{{/strip}}
