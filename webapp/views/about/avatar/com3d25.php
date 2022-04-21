<?php

declare(strict_types=1);

use app\assets\RgbAsset;
use app\widgets\PresetDownloadButton;
use app\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 */

RgbAsset::register($this);

?>
<h3 id="com3d25">
  <span id="cres"></span><?php /* for compatibility */ ?>
  COM3D2.5 (CR EditSystem)
</h3>
<p>
  <img src="/images/avatar-com3d25.jpg" class="img-fluid rounded shadow-sm">
</p>
<p>
  ※調整中のため、数字は大幅に変わる可能性があります。
</p>
<?= PresetDownloadButton::widget([
  'options' => [
    'tag' => 'p',
  ],
  'buttonFace' => 'DL Preset (CRES)',
  'buttonLink' => ['about/download-avatar-preset',
    'category' => 'com3d25',
    'file' => '001-hina.perset',
  ],
]) . "\n" ?>
<table class="table table-bordered w-auto">
  <tbody>
    <tr>
      <th rowspan="91">頭</th>
      <th rowspan="7">顔</th>
      <th>顔の種類</th>
      <td>プリティフェイス・ツリ目</td>
    </tr>
    <tr>
      <th>赤面設定</th>
      <td>デフォルト (RGB <span class="rgb">#955c5c</span>)</td>
    </tr>
    <tr>
      <th>顔のサイズ（横）</th>
      <td>38</td>
    </tr>
    <tr>
      <th>顔のサイズ（縦）</th>
      <td>50</td>
    </tr>
    <tr>
      <th>顔の輪郭（丸）</th>
      <td>10</td>
    </tr>
    <tr>
      <th>顔の輪郭（尖）</th>
      <td>5</td>
    </tr>
    <tr>
      <th>頬の形</th>
      <td>0</td>
    </tr>
    <tr>
      <th rowspan="3">チーク</th>
      <th>チークの種類</th>
      <td>頬線入りチーク</td>
    </tr>
    <tr>
      <th>色</th>
      <td>プリセット2番目</td>
    </tr>
    <tr>
      <th>チークの強さ</th>
      <td>100</td>
    </tr>
    <tr>
      <th rowspan="3">頬のつや</th>
      <th>頬のつやの種類</th>
      <td>頬のツヤ・くっきり小丸</td>
    </tr>
    <tr>
      <th>色</th>
      <td>プリセット（白）</td>
    </tr>
    <tr>
      <th>頬のつやの強さ</th>
      <td>100</td>
    </tr>
    <tr>
      <th rowspan="10">眉</th>
      <th>眉の種類</th>
      <td>短め眉毛</td>
    </tr>
    <tr>
      <th>色</th>
      <td>デフォルト</td>
    </tr>
    <tr>
      <th>眉の前面表示</th>
      <td>OFF</td>
    </tr>
    <tr>
      <th>眉のサイズ</th>
      <td>50（50・50）</td>
    </tr>
    <tr>
      <th>眉の左右</th>
      <td>50</td>
    </tr>
    <tr>
      <th>眉の上下</th>
      <td>38</td>
    </tr>
    <tr>
      <th>眉の角度</th>
      <td>76</td>
    </tr>
    <tr>
      <th>眉の形状（内）</th>
      <td>50</td>
    </tr>
    <tr>
      <th>眉の形状（外）</th>
      <td>80</td>
    </tr>
    <tr>
      <th>眉の透明度</th>
      <td>100</td>
    </tr>
    <tr>
      <th rowspan="5">二重</th>
      <th>二重の種類</th>
      <td>二重アレンジ</th>
    </tr>
    <tr>
      <th>色</th>
      <td>デフォルト</td>
    </tr>
    <tr>
      <th>二重の上下</th>
      <td>40</td>
    </tr>
    <tr>
      <th>二重の左右</th>
      <td>59</td>
    </tr>
    <tr>
      <th>二重の角度</th>
      <td>50</td>
    </tr>
    <tr>
      <th rowspan="10">目</th>
      <th>目のサイズ</th>
      <td>56</td>
    </tr>
    <tr>
      <th>目の形（上内）</th>
      <td>25</td>
    </tr>
    <tr>
      <th>目の形（上内中）</th>
      <td>24</td>
    </tr>
    <tr>
      <th>目の形（上中）</th>
      <td>22</td>
    </tr>
    <tr>
      <th>目の形（上中外）</th>
      <td>48</td>
    </tr>
    <tr>
      <th>目の形（上外）</th>
      <td>100</td>
    </tr>
    <tr>
      <th>目の形（下部）</th>
      <td>50（詳細設定なし）</td>
    </tr>
    <tr>
      <th>目の閉じ具合</th>
      <td>0</td>
    </tr>
    <tr>
      <th>目の位置（横）</th>
      <td>50</td>
    </tr>
    <tr>
      <th>目の位置（縦）</th>
      <td>17</td>
    </tr>
    <tr>
      <th>アイシャドウ</th>
      <th>アイシャドウの種類</th>
      <td>無し</td>
    </tr>
    <tr>
      <th rowspan="19">瞳</th>
      <th></th>
      <td>左右共通</td>
    </tr>
    <tr>
      <th>瞳の種類</th>
      <td>クリアエッグ</td>
    </tr>
    <tr>
      <th>色 - 光彩色</th>
      <td>RGB <span class="rgb">#eadc00</span></td>
    </tr>
    <tr>
      <th>色 - 1影色</th>
      <td>RGB <span class="rgb">#ffa23f</span></td>
    </tr>
    <tr>
      <th>色 - 2影色</th>
      <td>RGB <span class="rgb">#000000</span></td>
    </tr>
    <tr>
      <th>色 - 瞳孔色</th>
      <td>RGB <span class="rgb">#000000</span></td>
    </tr>
    <tr>
      <th>色 - ハイライト1色</th>
      <td>RGB <span class="rgb">#ffd197</span></td>
    </tr>
    <tr>
      <th>色 - ハイライト2色</th>
      <td>RGB <span class="rgb">#cf8010</span></td>
    </tr>
    <tr>
      <th>色 - 色の強さ</th>
      <td>全項目 255</td>
    </tr>
    <tr>
      <th>瞳のサイズ（横）</th>
      <td>60</td>
    </tr>
    <tr>
      <th>瞳のサイズ（縦）</th>
      <td>75</td>
    </tr>
    <tr>
      <th>瞳の上下</th>
      <td>50</td>
    </tr>
    <tr>
      <th>瞳の左右</th>
      <td>50</td>
    </tr>
    <tr>
      <th>瞳の形（上）</th>
      <td>0</td>
    </tr>
    <tr>
      <th>瞳の形（下）</th>
      <td>0</td>
    </tr>
    <tr>
      <th>瞳の形（内）</th>
      <td>0</td>
    </tr>
    <tr>
      <th>瞳の形（外上）</th>
      <td>0</td>
    </tr>
    <tr>
      <th>瞳の形（外下）</th>
      <td>0</td>
    </tr>
    <tr>
      <th>瞳の角度</th>
      <td>50</td>
    </tr>
    <tr>
      <th rowspan="7">瞳ハイライト</th>
      <th></th>
      <td>左右共通</td>
    </tr>
    <tr>
      <th>瞳ハイライトの種類</th>
      <td>ノーマル</td>
    </tr>
    <tr>
      <th>色</th>
      <td>デフォルト</td>
    </tr>
    <tr>
      <th>瞳ハイライトの上下</th>
      <td>68</td>
    </tr>
    <tr>
      <th>瞳ハイライトの左右</th>
      <td>50</td>
    </tr>
    <tr>
      <th>瞳ハイライトサイズ（縦）</th>
      <td>50</td>
    </tr>
    <tr>
      <th>瞳ハイライトの強さ</th>
      <td>100（100・100）</td>
    </tr>
    <tr>
      <th rowspan="3">白目</th>
      <th></th>
      <td>左右共通</td>
    </tr>
    <tr>
      <th>白目の種類</th>
      <td>きっぱり</td>
    </tr>
    <tr>
      <th>色</th>
      <td>デフォルト</td>
    </tr>
    <tr>
      <th rowspan="2">まつ毛</th>
      <th>まつ毛の種類</th>
      <td>プリティ上まつ毛</td>
    </tr>
    <tr>
      <th>色</th>
      <td>デフォルト</td>
    </tr>
    <tr>
      <th rowspan="2">下まつ毛</th>
      <th>下まつ毛の種類</th>
      <td>プリティ下まつ毛</td>
    </tr>
    <tr>
      <th>色</th>
      <td>デフォルト</td>
    </tr>
    <tr>
      <th rowspan="4">耳</th>
      <th>耳の有無</th>
      <td>ON</td>
    </tr>
    <tr>
      <th>耳のサイズ</th>
      <td>50</td>
    </tr>
    <tr>
      <th>耳の角度</th>
      <td>50</td>
    </tr>
    <tr>
      <th>エルフ耳</th>
      <td>0</td>
    </tr>
    <tr>
      <th rowspan="4">鼻</th>
      <th>鼻の種類</th>
      <td>ノーズライン・ノーマル</td>
    </tr>
    <tr>
      <th>色</th>
      <td>デフォルト</td>
    </tr>
    <tr>
      <th>鼻の位置</th>
      <td>50</td>
    </tr>
    <tr>
      <th>鼻のサイズ</th>
      <td>50</td>
    </tr>
    <tr>
      <th rowspan="5">リップ</th>
      <th>リップの種類</th>
      <td>くっきりリップ</td>
    </tr>
    <tr>
      <th>色</th>
      <td>プリセット2番目</td>
    </tr>
    <tr>
      <th>リップの濃さ</th>
      <td>50</td>
    </tr>
    <tr>
      <th>唇のつやの強さ</th>
      <td>50</td>
    </tr>
    <tr>
      <th>唇の厚み</th>
      <td>0</td>
    </tr>
    <tr>
      <th rowspan="4">口</th>
      <th>口の形</th>
      <td>通常口</td>
    </tr>
    <tr>
      <th>色</th>
      <td>デフォルト</td>
    </tr>
    <tr>
      <th>歯の種類</th>
      <td>1番目</td>
    </tr>
    <tr>
      <th>口の下影</th>
      <td>0</td>
    </tr>
    <tr>
      <th>ほくろ</th>
      <th>ほくろ複数設定 - 01</th>
      <td>
        ほくろ・顔<br>
        色：デフォルト<br>
        X軸移動：0.7400<br>
        Y軸移動：0.0754<br>
        回転：0<br>
        サイズ：0.8000<br>
        透明度：1.0000
      </td>
    </tr>
    <tr>
      <th>そばかす</th>
      <th></th>
      <td>無し</td>
    </tr>
    <tr>
      <th rowspan="9">髪</th>
      <th></th>
      <th></th>
      <td>COM3D2髪</td>
    </tr>
    <tr>
      <th rowspan="3">前髪</th>
      <th>前髪の種類</th>
      <td>ナチュラルショート</td>
    </tr>
    <tr>
      <th>長さ設定</th>
      <td>0.2200</td>
    </tr>
    <tr>
      <th>色</th>
      <td>RGB <span class="rgb">#48311f</span></td>
    </tr>
    <tr>
      <th rowspan="2">後髪</th>
      <th>後髪の種類</th>
      <td><?= Html::aR18(
        Html::encode('アイキス・純子バック'),
        'https://com3d2-shop.s-court.me/item.php?iid=725'
      ) ?></td>
    </tr>
    <tr>
      <th>長さ設定</th>
      <td>0.0000</td>
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
      <th rowspan="53">体</th>
      <th>全身</th>
      <th>身長</th>
      <td>21</td>
    </tr>
    <tr>
      <th rowspan="6">首/肩</th>
      <th>首の長さ</th>
      <td>42</td>
    </tr>
    <tr>
      <th>首の太さ</th>
      <td>45</td>
    </tr>
    <tr>
      <th>肩幅</th>
      <td>40</td>
    </tr>
    <tr>
      <th>肩の角度</th>
      <td>50</td>
    </tr>
    <tr>
      <th>肩の太さ</th>
      <td>35</td>
    </tr>
    <tr>
      <th>肩の張り</th>
      <td>0</td>
    </tr>
    <tr>
      <th rowspan="9">胸</th>
      <th>胸のサイズ</th>
      <td>114</td>
    </tr>
    <tr>
      <th>胸の太さ</th>
      <td>50</td>
    </tr>
    <tr>
      <th>胸の長さ</th>
      <td>50</td>
    </tr>
    <tr>
      <th>胸の上下角度</th>
      <td>5</td>
    </tr>
    <tr>
      <th>胸の上下位置</th>
      <td>50</td>
    </tr>
    <tr>
      <th>胸の寄り</th>
      <td>40</td>
    </tr>
    <tr>
      <th>胸の左右位置</th>
      <td>50</td>
    </tr>
    <tr>
      <th>胸の揺れ</th>
      <td>50</td>
    </tr>
    <tr>
      <th>胸の向き</th>
      <td>45</td>
    </tr>
    <tr>
      <th rowspan="10">乳首</th>
      <th>乳首の種類</th>
      <td>シンプルニップ</td>
    </tr>
    <tr>
      <th>色</th>
      <td>プリセット1番目</td>
    </tr>
    <tr>
      <th>乳首の長さ</th>
      <td>20</td>
    </tr>
    <tr>
      <th>乳首の太さ</th>
      <td>18</td>
    </tr>
    <tr>
      <th>乳首の丸さ</th>
      <td>10</td>
    </tr>
    <tr>
      <th>乳首の陥没</th>
      <td>0</td>
    </tr>
    <tr>
      <th>乳首の閉じ陥没</th>
      <td>0</td>
    </tr>
    <tr>
      <th>乳輪の大きさ</th>
      <td>50</td>
    </tr>
    <tr>
      <th>乳輪のふくらみ範囲</th>
      <td>5</td>
    </tr>
    <tr>
      <th>乳輪のふくらみサイズ</th>
      <td>20</td>
    </tr>
    <tr>
      <th rowspan="6">腕</th>
      <th>腕の長さ</th>
      <td>50</td>
    </tr>
    <tr>
      <th>上腕の太さ</th>
      <td>40</td>
    </tr>
    <tr>
      <th>二の腕の太さ</th>
      <td>45</td>
    </tr>
    <tr>
      <th>肘周りの太さ</th>
      <td>40</td>
    </tr>
    <tr>
      <th>前腕の太さ</th>
      <td>40</td>
    </tr>
    <tr>
      <th>手首の太さ</th>
      <td>45</td>
    </tr>
    <tr>
      <th rowspan="10">胴体</th>
      <th>胸部の太さ</th>
      <td>35</td>
    </tr>
    <tr>
      <th>胸下の太さ</th>
      <td>35</td>
    </tr>
    <tr>
      <th>ウエストの太さ</th>
      <td>60</td>
    </tr>
    <tr>
      <th>腹囲の太さ</th>
      <td>45</td>
    </tr>
    <tr>
      <th>腰の太さ</th>
      <td>55</td>
    </tr>
    <tr>
      <th>腹</th>
      <td>24</td>
    </tr>
    <tr>
      <th>大きなお腹</th>
      <td>0</td>
    </tr>
    <tr>
      <th>ウエストの前後</th>
      <td>50</td>
    </tr>
    <tr>
      <th>尻の大きさ</th>
      <td>30</td>
    </tr>
    <tr>
      <th>尻の角度</th>
      <td>40</td>
    </tr>
    <tr>
      <th rowspan="8">脚</th>
      <th>脚の長さ</th>
      <td>25</td>
    </tr>
    <tr>
      <th>上太ももの太さ</th>
      <td>39</td>
    </tr>
    <tr>
      <th>下太ももの太さ</th>
      <td>34</td>
    </tr>
    <tr>
      <th>膝周りの太さ</th>
      <td>39</td>
    </tr>
    <tr>
      <th>ふくらはぎの太さ</th>
      <td>34</td>
    </tr>
    <tr>
      <th>足首の太さ</th>
      <td>34</td>
    </tr>
    <tr>
      <th>膝の上下</th>
      <td>50</td>
    </tr>
    <tr>
      <th>脚の大きさ</th>
      <td>35</td>
    </tr>
    <tr>
      <th>タトゥー</th>
      <th></th>
      <td>無し</td>
    </tr>
    <tr>
      <th rowspan="2">ネイル</th>
      <th>ネイルの種類</th>
      <td>無し</td>
    </tr>
    <tr>
      <th>ネイルのつや</th>
      <td>50</td>
    </tr>
    <tr>
      <th rowspan="8">肌</th>
      <th rowspan="2">肌</th>
      <th>肌の種類</th>
      <td>普通の肌</td>
    </tr>
    <tr>
      <th>色</th>
      <td>プリセット1番目</td>
    </tr>
    <tr>
      <th>日焼け</th>
      <th></th>
      <td>無し</td>
    </tr>
    <tr>
      <th>脇毛</th>
      <th></th>
      <td>無し</td>
    </tr>
    <tr>
      <th rowspan="3">アンダーヘア</th>
      <th>アンダーヘアの種類</th>
      <td>アンダーヘア</td>
    </tr>
    <tr>
      <th>色</th>
      <td>デフォルト</td>
    </tr>
    <tr>
      <th>アンダーヘアの濃さ</th>
      <td>75</td>
    </tr>
    <tr>
      <th>アナルヘア</th>
      <th></th>
      <td>無し</td>
    </tr>
    <tr>
      <th rowspan="10">服装</th>
      <th rowspan="4">トップス</th>
      <th></th>
      <td>ソフィアメイドウェア（黒）</td>
    </tr>
    <tr>
      <th>胸影設定 - 影の強さ</th>
      <td>42</td>
    </tr>
    <tr>
      <th>形状設定 - ウェスト幅</th>
      <td>0</td>
    </tr>
    <tr>
      <th>形状設定 - 乳首ポチ</th>
      <td>0</td>
    </tr>
    <tr>
      <th>ボトムス</th>
      <th></th>
      <td>ソフィアメイドスカート（黒）</td>
    </tr>
    <tr>
      <th>ブラ</th>
      <th></th>
      <td>ノワールブラ（白）</td>
    </tr>
    <tr>
      <th>パンツ</th>
      <th></th>
      <td>ノワールショーツ（白）</td>
    </tr>
    <tr>
      <th>靴下</th>
      <th></th>
      <td>ソフィアメイドタイツ（黒）</td>
    </tr>
    <tr>
      <th>手袋</th>
      <th></th>
      <td>ソフィアメイドグローブ（黒）</td>
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
      <th>頭</th>
      <th>頭アクセサリの種類 01</th>
      <td>
        ソフィアメイドヘッドドレス（黒）<br>
        位置調整なし
      </td>
    </tr>
    <tr>
      <th>目</th>
      <th>目アクセサリの種類 01</th>
      <td>
        クリアフレームレンズ（赤）<br>
        位置調整なし
      </td>
    </tr>
  </tbody>
</table>
