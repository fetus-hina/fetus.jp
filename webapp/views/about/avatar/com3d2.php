<?php

declare(strict_types=1);

use yii\helpers\Html;

?>
<h3 id="com3d2">COM3D2（既存ボディ: Ver2.0）</h3>
<p>
  <img src="/images/avatar-com3d2.jpg" class="img-fluid rounded shadow-sm">
</p>
<p><?= Html::a(
  implode(' ', [
    '<span class="fas fa-download"></span>',
    Html::encode('Download COM3D2 Preset'),
  ]),
  ['about/download-avatar-preset',
    'category' => 'com3d2',
    'file' => 'pre_hina_com3d2.preset',
  ],
  ['class' => 'btn btn-outline-primary']
) ?></p>
</p>
<table class="table table-bordered w-auto">
  <tbody>
    <tr>
      <th rowspan="24">頭</th>
      <th>顔</th>
      <th></th>
      <td>プリティフェイス・ツリ目</td>
    </tr>
    <tr>
      <th rowspan="12">頭</th>
      <th>顔の輪郭（丸）</th>
      <td>0</td>
    </tr>
    <tr>
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
      <th>目の閉じ具合</th>
      <td>0</td>
    </tr>
    <tr>
      <th>眉の上下</th>
      <td>50</td>
    </tr>
    <tr>
      <th>眼球の上下</th>
      <td>50</td>
    </tr>
    <tr>
      <th>眼球のサイズ（横）</th>
      <td>50</td>
    </tr>
    <tr>
      <th>眼球のサイズ（縦）</th>
      <td>50</td>
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
      <td>プリセットの黄色</td>
    </tr>
    <tr>
      <th>目ハイライト</th>
      <th></th>
      <td>スタンダード</td>
    </tr>
    <tr>
      <th rowspan="5">ほくろ</th>
      <th>1</th>
      <td>泣きボクロ</td>
    </tr>
    <tr>
      <th>2</th>
      <td>無し</td>
    </tr>
    <tr>
      <th>3</th>
      <td>無し</td>
    </tr>
    <tr>
      <th>4</th>
      <td>無し</td>
    </tr>
    <tr>
      <th>5</th>
      <td>無し</td>
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
      <th rowspan="8">髪</th>
      <th rowspan="3">前髪</th>
      <th></th>
      <td>ナチュラルショート</td>
    </tr>
    <tr>
      <th>色</th>
      <td>プリセットの茶色（下から3番目）</td>
    </tr>
    <tr>
      <th>長さ・前髪</th>
      <td>22</td>
    </tr>
    <tr>
      <th rowspan="2">後髪</th>
      <th></th>
      <td>
        <?= Html::a(
          Html::encode('アイキス・純子バック'),
          'https://com3d2-shop.s-court.me/item.php?iid=725',
          [
            'rel' => 'noopener noreferrer',
            'target' => '_blank',
          ]
        ) ?><br>
        代替：ウェーブショート
      </td>
    </tr>
    <tr>
      <th>長さ・後髪</th>
      <td>
        0（純子バック）<br>
        70（ウェーブショート）
      </td>
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
      <th rowspan="28">身体</th>
      <th rowspan="2">全身</th>
      <th>足の長さ</th>
      <td>44</td>
    </tr>
    <tr>
      <th>身長</th>
      <td>18</td>
    </tr>
    <tr>
      <th rowspan="5">胸</th>
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
      <th>胸の揺れ具合</th>
      <td>50</td>
    </tr>
    <tr>
      <th rowspan="6">上半身</th>
      <th>ウエスト</th>
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
      <th rowspan="5">タトゥー</th>
      <th>1</th>
      <td>無し</td>
    </tr>
    <tr>
      <th>2</th>
      <td>無し</td>
    </tr>
    <tr>
      <th>3</th>
      <td>無し</td>
    </tr>
    <tr>
      <th>4</th>
      <td>無し</td>
    </tr>
    <tr>
      <th>5</th>
      <td>無し</td>
    </tr>
    <tr>
      <th>ネイル</th>
      <th></th>
      <td>グラデーションネイル・薄橙</td>
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
      <td>ソフィアメイドヘッドドレス（黒）</td>
    </tr>
    <tr>
      <th>トップス</th>
      <th></th>
      <td>ソフィアメイドウェア（黒）</td>
    </tr>
    <tr>
      <th>ボトムス</th>
      <th></th>
      <td>ソフィアメイドスカート（黒）</td>
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
      <td>縞柄ブラ・黒 ※要CM3D2連携</td>
    </tr>
    <tr>
      <th>パンツ</th>
      <th></th>
      <td>縞柄パンツ・黒 ※要CM3D2連携</td>
    </tr>
    <tr>
      <th>靴下</th>
      <th></th>
      <td>ソフィアメイドタイツ（黒）</td>
    </tr>
    <tr>
      <th>靴</th>
      <th></th>
      <td>ソフィアメイドシューズ（黒）</td>
    </tr>

    <tr>
      <th rowspan="3">アクセサリ</th>
      <td colspan="3">（この項目で言及のないものはすべて「無し」）</td>
    </tr>
    <tr>
      <th>メガネ</th>
      <th></th>
      <td>クリアフレームレンズ・赤（位置調整なし）</td>
    </tr>
    <tr>
      <th>手袋</th>
      <th></th>
      <td>ソフィアメイドグローブ（黒）</td>
    </tr>

    <tr>
      <th rowspan="7">プロフィール</th>
      <th>ヒロインタイプ</th>
      <th></th>
      <td>純真で健気な妹系 ※要CM3D2連携</td>
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
