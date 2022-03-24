<?php

declare(strict_types=1);

use app\widgets\PresetDownloadButton;
use app\helpers\Html;

?>
<h3 id="com3d2">
  COM3D2（既存ボディ）
</h3>
<p>
  <img src="/images/avatar-com3d2.jpg" class="img-fluid rounded shadow-sm">
</p>
<?= PresetDownloadButton::widget([
  'options' => [
    'tag' => 'div',
    'class' => 'mb-3',
  ],
  'buttonFace' => 'DL Preset (COM3D2)',
  'buttonLink' => ['about/download-avatar-preset',
    'category' => 'com3d2',
    'file' => 'pre_hina_com3d2.preset',
  ],
  'dropDownItems' => [
    'DL Preset (COM3D2.5)' => ['about/download-avatar-preset',
      'category' => 'com3d2',
      'file' => 'pre_hina_com3d25.preset',
    ],
  ],
]) . "\n" ?>
<table class="table table-bordered w-auto">
  <tbody>
    <tr>
      <th class="smoothing" rowspan="24">頭</th>
      <th class="smoothing">顔</th>
      <th class="smoothing"></th>
      <td class="smoothing">プリティフェイス・ツリ目</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="12">頭</th>
      <th class="smoothing">顔の輪郭（丸）</th>
      <td class="smoothing">0</td>
    </tr>
    <tr>
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
      <th class="smoothing">目の閉じ具合</th>
      <td class="smoothing">0</td>
    </tr>
    <tr>
      <th class="smoothing">眉の上下</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">眼球の上下</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">眼球のサイズ（横）</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">眼球のサイズ（縦）</th>
      <td class="smoothing">50</td>
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
      <td class="smoothing">プリセットの黄色</td>
    </tr>
    <tr>
      <th class="smoothing">目ハイライト</th>
      <th class="smoothing"></th>
      <td class="smoothing">スタンダード</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="5">ほくろ</th>
      <th class="smoothing">1</th>
      <td class="smoothing">泣きボクロ</td>
    </tr>
    <tr>
      <th class="smoothing">2</th>
      <td class="smoothing">無し</td>
    </tr>
    <tr>
      <th class="smoothing">3</th>
      <td class="smoothing">無し</td>
    </tr>
    <tr>
      <th class="smoothing">4</th>
      <td class="smoothing">無し</td>
    </tr>
    <tr>
      <th class="smoothing">5</th>
      <td class="smoothing">無し</td>
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
      <th class="smoothing" rowspan="8">髪</th>
      <th class="smoothing" rowspan="3">前髪</th>
      <th class="smoothing"></th>
      <td class="smoothing">ナチュラルショート</td>
    </tr>
    <tr>
      <th class="smoothing">色</th>
      <td class="smoothing">プリセットの茶色（下から3番目）</td>
    </tr>
    <tr>
      <th class="smoothing">長さ・前髪</th>
      <td class="smoothing">22</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="2">後髪</th>
      <th class="smoothing"></th>
      <td class="smoothing">
        <?= Html::aR18(
          Html::encode('アイキス・純子バック'),
          'https://com3d2-shop.s-court.me/item.php?iid=725'
        ) ?><br>
        代替：ウェーブショート
      </td>
    </tr>
    <tr>
      <th class="smoothing">長さ・後髪</th>
      <td class="smoothing">
        0（純子バック）<br>
        70（ウェーブショート）
      </td>
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
      <th class="smoothing" rowspan="28">身体</th>
      <th class="smoothing" rowspan="2">全身</th>
      <th class="smoothing">足の長さ</th>
      <td class="smoothing">44</td>
    </tr>
    <tr>
      <th class="smoothing">身長</th>
      <td class="smoothing">18</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="5">胸</th>
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
      <th class="smoothing">胸の揺れ具合</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="6">上半身</th>
      <th class="smoothing">ウエスト</th>
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
      <th class="smoothing" rowspan="5">タトゥー</th>
      <th class="smoothing">1</th>
      <td class="smoothing">無し</td>
    </tr>
    <tr>
      <th class="smoothing">2</th>
      <td class="smoothing">無し</td>
    </tr>
    <tr>
      <th class="smoothing">3</th>
      <td class="smoothing">無し</td>
    </tr>
    <tr>
      <th class="smoothing">4</th>
      <td class="smoothing">無し</td>
    </tr>
    <tr>
      <th class="smoothing">5</th>
      <td class="smoothing">無し</td>
    </tr>
    <tr>
      <th class="smoothing">ネイル</th>
      <th class="smoothing"></th>
      <td class="smoothing">グラデーションネイル・薄橙</td>
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
      <td class="smoothing">ソフィアメイドヘッドドレス（黒）</td>
    </tr>
    <tr>
      <th class="smoothing">トップス</th>
      <th class="smoothing"></th>
      <td class="smoothing">ソフィアメイドウェア（黒）</td>
    </tr>
    <tr>
      <th class="smoothing">ボトムス</th>
      <th class="smoothing"></th>
      <td class="smoothing">ソフィアメイドスカート（黒）</td>
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
      <td class="smoothing">縞柄ブラ・黒 ※要CM3D2連携</td>
    </tr>
    <tr>
      <th class="smoothing">パンツ</th>
      <th class="smoothing"></th>
      <td class="smoothing">縞柄パンツ・黒 ※要CM3D2連携</td>
    </tr>
    <tr>
      <th class="smoothing">靴下</th>
      <th class="smoothing"></th>
      <td class="smoothing">ソフィアメイドタイツ（黒）</td>
    </tr>
    <tr>
      <th class="smoothing">靴</th>
      <th class="smoothing"></th>
      <td class="smoothing">ソフィアメイドシューズ（黒）</td>
    </tr>

    <tr>
      <th class="smoothing" rowspan="3">アクセサリ</th>
      <td class="smoothing" colspan="3">（この項目で言及のないものはすべて「無し」）</td>
    </tr>
    <tr>
      <th class="smoothing">メガネ</th>
      <th class="smoothing"></th>
      <td class="smoothing">クリアフレームレンズ・赤（位置調整なし）</td>
    </tr>
    <tr>
      <th class="smoothing">手袋</th>
      <th class="smoothing"></th>
      <td class="smoothing">ソフィアメイドグローブ（黒）</td>
    </tr>

    <tr>
      <th class="smoothing" rowspan="7">プロフィール</th>
      <th class="smoothing">ヒロインタイプ</th>
      <th class="smoothing"></th>
      <td class="smoothing">純真で健気な妹系 ※要CM3D2連携</td>
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
