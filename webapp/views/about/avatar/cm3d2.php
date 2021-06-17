<?php

declare(strict_types=1);

use app\widgets\PresetDownloadButton;
use yii\helpers\Html;

?>
<h3 id="cm3d2">CM3D2</h3>
<p>
  <img src="/images/avatar-cm3d2.jpg" class="img-fluid rounded shadow-sm">
</p>
<?= PresetDownloadButton::widget([
  'options' => ['tag' => 'p'],
  'buttonFace' => 'DL Preset (CM3D2)',
  'buttonLink' => ['about/download-avatar-preset',
    'category' => 'cm3d2',
    'file' => 'pre_hina_cm3d2.preset',
  ],
]) . "\n" ?>
<table class="table table-bordered w-auto">
  <tbody>
    <tr>
      <th rowspan="14">頭</th>
      <th>顔</th>
      <th></th>
      <td>プリティフェイス・ツリ目</td>
    </tr>
    <tr>
      <th rowspan="6">頭</th>
      <th>目のサイズ（横）</th>
      <td>50</td>
    </tr>
    <tr>
      <th>目のサイズ（縦）</th>
      <td>50</td>
    </tr>
    <tr>
      <th>目の位置（横）</th>
      <td>0</td>
    </tr>
    <tr>
      <th>目の位置（縦）</th>
      <td>5</td>
    </tr>
    <tr>
      <th>顔のサイズ（横）</th>
      <td>45</td>
    </tr>
    <tr>
      <th>顔のサイズ（縦）</th>
      <td>50</td>
    </tr>
    <tr>
      <th>眉</th>
      <th></th>
      <td>下がりまゆ</td>
    </tr>
    <tr>
      <th rowspan="2">目</th>
      <th></th>
      <td>エッグ</td>
    </tr>
    <tr>
      <th>色</th>
      <td>イエロー</td>
    </tr>
    <tr>
      <th>目ハイライト</th>
      <th></th>
      <td>スタンダード</td>
    </tr>
    <tr>
      <th>ほくろ</th>
      <th></th>
      <td>泣きボクロ</td>
    </tr>
    <tr>
      <th>唇</th>
      <th></th>
      <td>ナチュラルリップ</td>
    </tr>
    <tr>
      <th>歯</th>
      <th></th>
      <td>無し</td>
    </tr>

    <tr>
      <th rowspan="6">髪</th>
      <th rowspan="2">前髪</th>
      <th></th>
      <td>ナチュラルショート</td>
    </tr>
    <tr>
      <th>色</th>
      <td>ブラウン</td>
    </tr>
    <tr>
      <th>後髪</th>
      <th></th>
      <td>エアリーセミロング</td>
    </tr>
    <tr>
      <th>横髪</th>
      <th></th>
      <td>無し</td>
    </tr>
    <tr>
      <th>エクステ髪</th>
      <th></th>
      <td>無し</td>
    </tr>
    <tr>
      <th>アホ毛</th>
      <th></th>
      <td>無し</td>
    </tr>

    <tr>
      <th rowspan="22">身体</th>
      <th rowspan="2">全身</th>
      <th>足の長さ</th>
      <td>38</td>
    </tr>
    <tr>
      <th>身長</th>
      <td>20</td>
    </tr>
    <tr>
      <th rowspan="4">胸</th>
      <th>胸のサイズ</th>
      <td>15</td>
    </tr>
    <tr>
      <th>胸のたれ</th>
      <td>0</td>
    </tr>
    <tr>
      <th>胸上下</th>
      <td>0</td>
    </tr>
    <tr>
      <th>胸寄り</th>
      <td>40</td>
    </tr>
    <tr>
      <th rowspan="6">上半身</th>
      <th>ウェスト</th>
      <td>43</td>
    </tr>
    <tr>
      <th>お腹</th>
      <td>25</td>
    </tr>
    <tr>
      <th>肩幅</th>
      <td>40</td>
    </tr>
    <tr>
      <th>腕の太さ</th>
      <td>10</td>
    </tr>
    <tr>
      <th>腕の長さ</th>
      <td>50</td>
    </tr>
    <tr>
      <th>首の長さ</th>
      <td>42</td>
    </tr>
    <tr>
      <th rowspan="3">下半身</th>
      <th>ヒップ</th>
      <td>50</td>
    </tr>
    <tr>
      <th>足の太さ</th>
      <td>9</td>
    </tr>
    <tr>
      <th>足の太さ2</th>
      <td>15</td>
    </tr>
    <tr>
      <th rowspan="2">肌</th>
      <th></th>
      <td>通常肌</td>
    </tr>
    <tr>
      <th>色</th>
      <td>通常肌・ライトイエロー</td>
    </tr>
    <tr>
      <th rowspan="2">乳首</th>
      <th></th>
      <td>ナチュラルニップ・小</td>
    </tr>
    <tr>
      <th>色</th>
      <td>ナチュラルピンク</td>
    </tr>
    <tr>
      <th>タトゥー</th>
      <th></th>
      <td>無し</td>
    </tr>
    <tr>
      <th rowspan="2">アンダーヘア</th>
      <th></th>
      <td>カールアンダーヘア</td>
    </tr>
    <tr>
      <th>色</th>
      <td>カスタム・黒（すべて0）</td>
    </tr>

    <tr>
      <th rowspan="10">服装</th>
      <th>帽子</th>
      <th></th>
      <td>無し</td>
    </tr>
    <tr>
      <th>ヘッドドレス</th>
      <th></th>
      <td>無し</td>
    </tr>
    <tr>
      <th>トップス</th>
      <th></th>
      <td>デリカートメイドウェア（黒）</td>
    </tr>
    <tr>
      <th>ボトムス</th>
      <th></th>
      <td>デリカートメイドスカート（黒）</td>
    </tr>
    <tr>
      <th>ワンピース</th>
      <th></th>
      <td>無し</td>
    </tr>
    <tr>
      <th>水着</th>
      <th></th>
      <td>無し</td>
    </tr>
    <tr>
      <th>ブラジャー</th>
      <th></th>
      <td>縞柄ブラ・黒</td>
    </tr>
    <tr>
      <th>パンツ</th>
      <th></th>
      <td>縞柄パンツ・黒</td>
    </tr>
    <tr>
      <th>靴下</th>
      <th></th>
      <td>ツンゴスメイドタイツ・黒</td>
    </tr>
    <tr>
      <th>靴</th>
      <th></th>
      <td>ポップンメイドシューズ・黒</td>
    </tr>

    <tr>
      <th rowspan="3">アクセサリ</th>
      <td colspan="3">（この項目で言及のないものはすべて「無し」）</td>
    </tr>
    <tr>
      <th>メガネ</th>
      <th></th>
      <td>シンプルメガネ（赤）</td>
    </tr>
    <tr>
      <th>手袋</th>
      <th></th>
      <td>フォルテメイドグローブ・白</td>
    </tr>

    <tr>
      <th rowspan="7">プロフィール</th>
      <th>ヒロインタイプ</th>
      <th></th>
      <td>純真で健気な妹系</td>
    </tr>
    <tr>
      <th>性経験</th>
      <th></th>
      <td>処女</td>
    </tr>
    <tr>
      <th rowspan="5">サイズ<br>（算出値）</th>
      <th>身長</th>
      <td>150 cm</td>
    </tr>
    <tr>
      <th>体重</th>
      <td>47 kg</td>
    </tr>
    <tr>
      <th>バスト</th>
      <td>75 cm (A)</td>
    </tr>
    <tr>
      <th>ウェスト</th>
      <td>59 cm</td>
    </tr>
    <tr>
      <th>ヒップ</th>
      <td>80 cm</td>
    </tr>
  </tbody>
</table>
