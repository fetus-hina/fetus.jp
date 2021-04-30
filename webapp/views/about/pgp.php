<?php

declare(strict_types=1);

use rmrevin\yii\fontawesome\FAS;
use yii\helpers\Html;

?>
<div class="container">
  <p>
    <?= Html::a(
      (string)FAS::icon('angle-double-left') . ' ' . Html::encode('Home'),
      ['site/index'],
      ['class' => 'btn btn-outline-primary']
    ) . "\n" ?>
    <?= Html::a(
      (string)FAS::icon('angle-double-left') . ' ' . Html::encode('About'),
      ['about/index'],
      ['class' => 'btn btn-outline-primary']
    ) . "\n" ?>
  </p>

  <h2>PGP Keys</h2>
  <ul>
    <li>
      <a href="#key">
        通常利用する鍵（メールの送信・Commit の署名など）
      </a>
    </li>
    <li>
      <a href="#package">
        パッケージの署名に利用する鍵
      </a>
    </li>
  </ul>

  <hr>
  
  <h3 id="key">
    通常利用する鍵（メールの送信・Commit の署名など）
  </h3>
  <pre>
  pub   4096R/<a href="https://pgp.mit.edu/pks/lookup?op=get&amp;search=0x26CF8461F6B887CD">F6B887CD</a> 2016-01-25
        Key fingerprint = 984A 854A FB33 50F9 BF4C  2E74 26CF 8461 F6B8 87CD
  uid                  AIZAWA Hina &lt;hina@fetus.jp&gt;
  uid                  AIZAWA Hina &lt;hina@jn4qya.jp&gt;
  uid                  AIZAWA Hina &lt;hina@bouhime.com&gt;
  uid                  AIZAWA Hina &lt;hina@jp3cki.jp&gt;
  sub   4096R/8B257C7E 2016-01-25
  
  -----BEGIN PGP PUBLIC KEY BLOCK-----
  Version: GnuPG v2.0.22 (GNU/Linux)
  
  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
  =MZch
  -----END PGP PUBLIC KEY BLOCK-----
  </pre>

  <hr>
  
  <h3 id="package">
    パッケージの署名に利用する鍵
  </h3>
  <pre>
  pub   4096R/<a href="https://pgp.mit.edu/pks/lookup?op=get&amp;search=0xF3819D09C9F367D2">C9F367D2</a> 2016-01-25
        Key fingerprint = 1348 F6B2 2E7D 530B 6BA6  7DD1 F381 9D09 C9F3 67D2
  uid                  AIZAWA Hina (RPM-SIGN) &lt;hina@bouhime.com&gt;
  sub   4096R/118AB5AC 2016-01-25
  
  -----BEGIN PGP PUBLIC KEY BLOCK-----
  Version: GnuPG v2.0.22 (GNU/Linux)
  
  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
  uXhzhtppldNxAfjSyXNPsqNFGWWwifo=
  =98NF
  -----END PGP PUBLIC KEY BLOCK-----
  </pre>
</div>