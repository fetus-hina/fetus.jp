<?php

declare(strict_types=1);

use app\widgets\PresetDownloadButton;
use app\helpers\Html;

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
      <th class="smoothing" rowspan="14">頭</th>
      <th class="smoothing">顔</th>
      <th class="smoothing"></th>
      <td class="smoothing">プリティフェイス・ツリ目</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="6">頭</th>
      <th class="smoothing">目のサイズ（横）</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">目のサイズ（縦）</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">目の位置（横）</th>
      <td class="smoothing">0</td>
    </tr>
    <tr>
      <th class="smoothing">目の位置（縦）</th>
      <td class="smoothing">5</td>
    </tr>
    <tr>
      <th class="smoothing">顔のサイズ（横）</th>
      <td class="smoothing">45</td>
    </tr>
    <tr>
      <th class="smoothing">顔のサイズ（縦）</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">眉</th>
      <th class="smoothing"></th>
      <td class="smoothing">下がりまゆ</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="2">目</th>
      <th class="smoothing"></th>
      <td class="smoothing">エッグ</td>
    </tr>
    <tr>
      <th class="smoothing">色</th>
      <td class="smoothing">イエロー</td>
    </tr>
    <tr>
      <th class="smoothing">目ハイライト</th>
      <th class="smoothing"></th>
      <td class="smoothing">スタンダード</td>
    </tr>
    <tr>
      <th class="smoothing">ほくろ</th>
      <th class="smoothing"></th>
      <td class="smoothing">泣きボクロ</td>
    </tr>
    <tr>
      <th class="smoothing">唇</th>
      <th class="smoothing"></th>
      <td class="smoothing">ナチュラルリップ</td>
    </tr>
    <tr>
      <th class="smoothing">歯</th>
      <th class="smoothing"></th>
      <td class="smoothing">無し</td>
    </tr>

    <tr>
      <th class="smoothing" rowspan="6">髪</th>
      <th class="smoothing" rowspan="2">前髪</th>
      <th class="smoothing"></th>
      <td class="smoothing">ナチュラルショート</td>
    </tr>
    <tr>
      <th class="smoothing">色</th>
      <td class="smoothing">ブラウン</td>
    </tr>
    <tr>
      <th class="smoothing">後髪</th>
      <th class="smoothing"></th>
      <td class="smoothing">エアリーセミロング</td>
    </tr>
    <tr>
      <th class="smoothing">横髪</th>
      <th class="smoothing"></th>
      <td class="smoothing">無し</td>
    </tr>
    <tr>
      <th class="smoothing">エクステ髪</th>
      <th class="smoothing"></th>
      <td class="smoothing">無し</td>
    </tr>
    <tr>
      <th class="smoothing">アホ毛</th>
      <th class="smoothing"></th>
      <td class="smoothing">無し</td>
    </tr>

    <tr>
      <th class="smoothing" rowspan="22">身体</th>
      <th class="smoothing" rowspan="2">全身</th>
      <th class="smoothing">足の長さ</th>
      <td class="smoothing">38</td>
    </tr>
    <tr>
      <th class="smoothing">身長</th>
      <td class="smoothing">20</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="4">胸</th>
      <th class="smoothing">胸のサイズ</th>
      <td class="smoothing">15</td>
    </tr>
    <tr>
      <th class="smoothing">胸のたれ</th>
      <td class="smoothing">0</td>
    </tr>
    <tr>
      <th class="smoothing">胸上下</th>
      <td class="smoothing">0</td>
    </tr>
    <tr>
      <th class="smoothing">胸寄り</th>
      <td class="smoothing">40</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="6">上半身</th>
      <th class="smoothing">ウェスト</th>
      <td class="smoothing">43</td>
    </tr>
    <tr>
      <th class="smoothing">お腹</th>
      <td class="smoothing">25</td>
    </tr>
    <tr>
      <th class="smoothing">肩幅</th>
      <td class="smoothing">40</td>
    </tr>
    <tr>
      <th class="smoothing">腕の太さ</th>
      <td class="smoothing">10</td>
    </tr>
    <tr>
      <th class="smoothing">腕の長さ</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">首の長さ</th>
      <td class="smoothing">42</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="3">下半身</th>
      <th class="smoothing">ヒップ</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">足の太さ</th>
      <td class="smoothing">9</td>
    </tr>
    <tr>
      <th class="smoothing">足の太さ2</th>
      <td class="smoothing">15</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="2">肌</th>
      <th class="smoothing"></th>
      <td class="smoothing">通常肌</td>
    </tr>
    <tr>
      <th class="smoothing">色</th>
      <td class="smoothing">通常肌・ライトイエロー</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="2">乳首</th>
      <th class="smoothing"></th>
      <td class="smoothing">ナチュラルニップ・小</td>
    </tr>
    <tr>
      <th class="smoothing">色</th>
      <td class="smoothing">ナチュラルピンク</td>
    </tr>
    <tr>
      <th class="smoothing">タトゥー</th>
      <th class="smoothing"></th>
      <td class="smoothing">無し</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="2">アンダーヘア</th>
      <th class="smoothing"></th>
      <td class="smoothing">カールアンダーヘア</td>
    </tr>
    <tr>
      <th class="smoothing">色</th>
      <td class="smoothing">カスタム・黒（すべて0）</td>
    </tr>

    <tr>
      <th class="smoothing" rowspan="10">服装</th>
      <th class="smoothing">帽子</th>
      <th class="smoothing"></th>
      <td class="smoothing">無し</td>
    </tr>
    <tr>
      <th class="smoothing">ヘッドドレス</th>
      <th class="smoothing"></th>
      <td class="smoothing">無し</td>
    </tr>
    <tr>
      <th class="smoothing">トップス</th>
      <th class="smoothing"></th>
      <td class="smoothing">デリカートメイドウェア（黒）</td>
    </tr>
    <tr>
      <th class="smoothing">ボトムス</th>
      <th class="smoothing"></th>
      <td class="smoothing">デリカートメイドスカート（黒）</td>
    </tr>
    <tr>
      <th class="smoothing">ワンピース</th>
      <th class="smoothing"></th>
      <td class="smoothing">無し</td>
    </tr>
    <tr>
      <th class="smoothing">水着</th>
      <th class="smoothing"></th>
      <td class="smoothing">無し</td>
    </tr>
    <tr>
      <th class="smoothing">ブラジャー</th>
      <th class="smoothing"></th>
      <td class="smoothing">縞柄ブラ・黒</td>
    </tr>
    <tr>
      <th class="smoothing">パンツ</th>
      <th class="smoothing"></th>
      <td class="smoothing">縞柄パンツ・黒</td>
    </tr>
    <tr>
      <th class="smoothing">靴下</th>
      <th class="smoothing"></th>
      <td class="smoothing">ツンゴスメイドタイツ・黒</td>
    </tr>
    <tr>
      <th class="smoothing">靴</th>
      <th class="smoothing"></th>
      <td class="smoothing">ポップンメイドシューズ・黒</td>
    </tr>

    <tr>
      <th class="smoothing" rowspan="3">アクセサリ</th>
      <td class="smoothing" colspan="3">（この項目で言及のないものはすべて「無し」）</td>
    </tr>
    <tr>
      <th class="smoothing">メガネ</th>
      <th class="smoothing"></th>
      <td class="smoothing">シンプルメガネ（赤）</td>
    </tr>
    <tr>
      <th class="smoothing">手袋</th>
      <th class="smoothing"></th>
      <td class="smoothing">フォルテメイドグローブ・白</td>
    </tr>

    <tr>
      <th class="smoothing" rowspan="7">プロフィール</th>
      <th class="smoothing">ヒロインタイプ</th>
      <th class="smoothing"></th>
      <td class="smoothing">純真で健気な妹系</td>
    </tr>
    <tr>
      <th class="smoothing">性経験</th>
      <th class="smoothing"></th>
      <td class="smoothing">処女</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="5">サイズ<br>（算出値）</th>
      <th class="smoothing">身長</th>
      <td class="smoothing">150 cm</td>
    </tr>
    <tr>
      <th class="smoothing">体重</th>
      <td class="smoothing">47 kg</td>
    </tr>
    <tr>
      <th class="smoothing">バスト</th>
      <td class="smoothing">75 cm (A)</td>
    </tr>
    <tr>
      <th class="smoothing">ウェスト</th>
      <td class="smoothing">59 cm</td>
    </tr>
    <tr>
      <th class="smoothing">ヒップ</th>
      <td class="smoothing">80 cm</td>
    </tr>
  </tbody>
</table>
