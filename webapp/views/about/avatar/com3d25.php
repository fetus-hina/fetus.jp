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
    'class' => 'smoothing',
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
      <th class="smoothing" rowspan="91">頭</th>
      <th class="smoothing" rowspan="7">顔</th>
      <th class="smoothing">顔の種類</th>
      <td class="smoothing">プリティフェイス・ツリ目</td>
    </tr>
    <tr>
      <th class="smoothing">赤面設定</th>
      <td class="smoothing">デフォルト (RGB <span class="rgb">#955c5c</span>)</td>
    </tr>
    <tr>
      <th class="smoothing">顔のサイズ（横）</th>
      <td class="smoothing">38</td>
    </tr>
    <tr>
      <th class="smoothing">顔のサイズ（縦）</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">顔の輪郭（丸）</th>
      <td class="smoothing">10</td>
    </tr>
    <tr>
      <th class="smoothing">顔の輪郭（尖）</th>
      <td class="smoothing">5</td>
    </tr>
    <tr>
      <th class="smoothing">頬の形</th>
      <td class="smoothing">0</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="3">チーク</th>
      <th class="smoothing">チークの種類</th>
      <td class="smoothing">頬線入りチーク</td>
    </tr>
    <tr>
      <th class="smoothing">色</th>
      <td class="smoothing">プリセット2番目</td>
    </tr>
    <tr>
      <th class="smoothing">チークの強さ</th>
      <td class="smoothing">100</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="3">頬のつや</th>
      <th class="smoothing">頬のつやの種類</th>
      <td class="smoothing">頬のツヤ・くっきり小丸</td>
    </tr>
    <tr>
      <th class="smoothing">色</th>
      <td class="smoothing">プリセット（白）</td>
    </tr>
    <tr>
      <th class="smoothing">頬のつやの強さ</th>
      <td class="smoothing">100</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="10">眉</th>
      <th class="smoothing">眉の種類</th>
      <td class="smoothing">短め眉毛</td>
    </tr>
    <tr>
      <th class="smoothing">色</th>
      <td class="smoothing">デフォルト</td>
    </tr>
    <tr>
      <th class="smoothing">眉の前面表示</th>
      <td class="smoothing">OFF</td>
    </tr>
    <tr>
      <th class="smoothing">眉のサイズ</th>
      <td class="smoothing">50（50・50）</td>
    </tr>
    <tr>
      <th class="smoothing">眉の左右</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">眉の上下</th>
      <td class="smoothing">38</td>
    </tr>
    <tr>
      <th class="smoothing">眉の角度</th>
      <td class="smoothing">76</td>
    </tr>
    <tr>
      <th class="smoothing">眉の形状（内）</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">眉の形状（外）</th>
      <td class="smoothing">80</td>
    </tr>
    <tr>
      <th class="smoothing">眉の透明度</th>
      <td class="smoothing">100</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="5">二重</th>
      <th class="smoothing">二重の種類</th>
      <td class="smoothing">二重アレンジ</th>
    </tr>
    <tr>
      <th class="smoothing">色</th>
      <td class="smoothing">デフォルト</td>
    </tr>
    <tr>
      <th class="smoothing">二重の上下</th>
      <td class="smoothing">40</td>
    </tr>
    <tr>
      <th class="smoothing">二重の左右</th>
      <td class="smoothing">59</td>
    </tr>
    <tr>
      <th class="smoothing">二重の角度</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="10">目</th>
      <th class="smoothing">目のサイズ</th>
      <td class="smoothing">56</td>
    </tr>
    <tr>
      <th class="smoothing">目の形（上内）</th>
      <td class="smoothing">25</td>
    </tr>
    <tr>
      <th class="smoothing">目の形（上内中）</th>
      <td class="smoothing">24</td>
    </tr>
    <tr>
      <th class="smoothing">目の形（上中）</th>
      <td class="smoothing">22</td>
    </tr>
    <tr>
      <th class="smoothing">目の形（上中外）</th>
      <td class="smoothing">48</td>
    </tr>
    <tr>
      <th class="smoothing">目の形（上外）</th>
      <td class="smoothing">100</td>
    </tr>
    <tr>
      <th class="smoothing">目の形（下部）</th>
      <td class="smoothing">50（詳細設定なし）</td>
    </tr>
    <tr>
      <th class="smoothing">目の閉じ具合</th>
      <td class="smoothing">0</td>
    </tr>
    <tr>
      <th class="smoothing">目の位置（横）</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">目の位置（縦）</th>
      <td class="smoothing">17</td>
    </tr>
    <tr>
      <th class="smoothing">アイシャドウ</th>
      <th class="smoothing">アイシャドウの種類</th>
      <td class="smoothing">無し</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="19">瞳</th>
      <th class="smoothing"></th>
      <td class="smoothing">左右共通</td>
    </tr>
    <tr>
      <th class="smoothing">瞳の種類</th>
      <td class="smoothing">クリアエッグ</td>
    </tr>
    <tr>
      <th class="smoothing">色 - 光彩色</th>
      <td class="smoothing">RGB <span class="rgb">#eadc00</span></td>
    </tr>
    <tr>
      <th class="smoothing">色 - 1影色</th>
      <td class="smoothing">RGB <span class="rgb">#ffa23f</span></td>
    </tr>
    <tr>
      <th class="smoothing">色 - 2影色</th>
      <td class="smoothing">RGB <span class="rgb">#000000</span></td>
    </tr>
    <tr>
      <th class="smoothing">色 - 瞳孔色</th>
      <td class="smoothing">RGB <span class="rgb">#000000</span></td>
    </tr>
    <tr>
      <th class="smoothing">色 - ハイライト1色</th>
      <td class="smoothing">RGB <span class="rgb">#ffd197</span></td>
    </tr>
    <tr>
      <th class="smoothing">色 - ハイライト2色</th>
      <td class="smoothing">RGB <span class="rgb">#cf8010</span></td>
    </tr>
    <tr>
      <th class="smoothing">色 - 色の強さ</th>
      <td class="smoothing">全項目 255</td>
    </tr>
    <tr>
      <th class="smoothing">瞳のサイズ（横）</th>
      <td class="smoothing">60</td>
    </tr>
    <tr>
      <th class="smoothing">瞳のサイズ（縦）</th>
      <td class="smoothing">75</td>
    </tr>
    <tr>
      <th class="smoothing">瞳の上下</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">瞳の左右</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">瞳の形（上）</th>
      <td class="smoothing">0</td>
    </tr>
    <tr>
      <th class="smoothing">瞳の形（下）</th>
      <td class="smoothing">0</td>
    </tr>
    <tr>
      <th class="smoothing">瞳の形（内）</th>
      <td class="smoothing">0</td>
    </tr>
    <tr>
      <th class="smoothing">瞳の形（外上）</th>
      <td class="smoothing">0</td>
    </tr>
    <tr>
      <th class="smoothing">瞳の形（外下）</th>
      <td class="smoothing">0</td>
    </tr>
    <tr>
      <th class="smoothing">瞳の角度</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="7">瞳ハイライト</th>
      <th class="smoothing"></th>
      <td class="smoothing">左右共通</td>
    </tr>
    <tr>
      <th class="smoothing">瞳ハイライトの種類</th>
      <td class="smoothing">ノーマル</td>
    </tr>
    <tr>
      <th class="smoothing">色</th>
      <td class="smoothing">デフォルト</td>
    </tr>
    <tr>
      <th class="smoothing">瞳ハイライトの上下</th>
      <td class="smoothing">68</td>
    </tr>
    <tr>
      <th class="smoothing">瞳ハイライトの左右</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">瞳ハイライトサイズ（縦）</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">瞳ハイライトの強さ</th>
      <td class="smoothing">100（100・100）</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="3">白目</th>
      <th class="smoothing"></th>
      <td class="smoothing">左右共通</td>
    </tr>
    <tr>
      <th class="smoothing">白目の種類</th>
      <td class="smoothing">きっぱり</td>
    </tr>
    <tr>
      <th class="smoothing">色</th>
      <td class="smoothing">デフォルト</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="2">まつ毛</th>
      <th class="smoothing">まつ毛の種類</th>
      <td class="smoothing">プリティ上まつ毛</td>
    </tr>
    <tr>
      <th class="smoothing">色</th>
      <td class="smoothing">デフォルト</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="2">下まつ毛</th>
      <th class="smoothing">下まつ毛の種類</th>
      <td class="smoothing">プリティ下まつ毛</td>
    </tr>
    <tr>
      <th class="smoothing">色</th>
      <td class="smoothing">デフォルト</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="4">耳</th>
      <th class="smoothing">耳の有無</th>
      <td class="smoothing">ON</td>
    </tr>
    <tr>
      <th class="smoothing">耳のサイズ</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">耳の角度</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">エルフ耳</th>
      <td class="smoothing">0</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="4">鼻</th>
      <th class="smoothing">鼻の種類</th>
      <td class="smoothing">ノーズライン・ノーマル</td>
    </tr>
    <tr>
      <th class="smoothing">色</th>
      <td class="smoothing">デフォルト</td>
    </tr>
    <tr>
      <th class="smoothing">鼻の位置</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">鼻のサイズ</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="5">リップ</th>
      <th class="smoothing">リップの種類</th>
      <td class="smoothing">くっきりリップ</td>
    </tr>
    <tr>
      <th class="smoothing">色</th>
      <td class="smoothing">プリセット2番目</td>
    </tr>
    <tr>
      <th class="smoothing">リップの濃さ</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">唇のつやの強さ</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">唇の厚み</th>
      <td class="smoothing">0</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="4">口</th>
      <th class="smoothing">口の形</th>
      <td class="smoothing">通常口</td>
    </tr>
    <tr>
      <th class="smoothing">色</th>
      <td class="smoothing">デフォルト</td>
    </tr>
    <tr>
      <th class="smoothing">歯の種類</th>
      <td class="smoothing">1番目</td>
    </tr>
    <tr>
      <th class="smoothing">口の下影</th>
      <td class="smoothing">0</td>
    </tr>
    <tr>
      <th class="smoothing">ほくろ</th>
      <th class="smoothing">ほくろ複数設定 - 01</th>
      <td class="smoothing">
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
      <th class="smoothing">そばかす</th>
      <th class="smoothing"></th>
      <td class="smoothing">無し</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="9">髪</th>
      <th class="smoothing"></th>
      <th class="smoothing"></th>
      <td class="smoothing">COM3D2髪</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="3">前髪</th>
      <th class="smoothing">前髪の種類</th>
      <td class="smoothing">ナチュラルショート</td>
    </tr>
    <tr>
      <th class="smoothing">長さ設定</th>
      <td class="smoothing">0.2200</td>
    </tr>
    <tr>
      <th class="smoothing">色</th>
      <td class="smoothing">RGB <span class="rgb">#48311f</span></td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="2">後髪</th>
      <th class="smoothing">後髪の種類</th>
      <td class="smoothing"><?= Html::aR18(
        Html::encode('アイキス・純子バック'),
        'https://com3d2-shop.s-court.me/item.php?iid=725'
      ) ?></td>
    </tr>
    <tr>
      <th class="smoothing">長さ設定</th>
      <td class="smoothing">0.0000</td>
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
      <th class="smoothing" rowspan="53">体</th>
      <th class="smoothing">全身</th>
      <th class="smoothing">身長</th>
      <td class="smoothing">21</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="6">首/肩</th>
      <th class="smoothing">首の長さ</th>
      <td class="smoothing">42</td>
    </tr>
    <tr>
      <th class="smoothing">首の太さ</th>
      <td class="smoothing">45</td>
    </tr>
    <tr>
      <th class="smoothing">肩幅</th>
      <td class="smoothing">40</td>
    </tr>
    <tr>
      <th class="smoothing">肩の角度</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">肩の太さ</th>
      <td class="smoothing">35</td>
    </tr>
    <tr>
      <th class="smoothing">肩の張り</th>
      <td class="smoothing">0</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="9">胸</th>
      <th class="smoothing">胸のサイズ</th>
      <td class="smoothing">114</td>
    </tr>
    <tr>
      <th class="smoothing">胸の太さ</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">胸の長さ</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">胸の上下角度</th>
      <td class="smoothing">5</td>
    </tr>
    <tr>
      <th class="smoothing">胸の上下位置</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">胸の寄り</th>
      <td class="smoothing">40</td>
    </tr>
    <tr>
      <th class="smoothing">胸の左右位置</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">胸の揺れ</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">胸の向き</th>
      <td class="smoothing">45</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="10">乳首</th>
      <th class="smoothing">乳首の種類</th>
      <td class="smoothing">シンプルニップ</td>
    </tr>
    <tr>
      <th class="smoothing">色</th>
      <td class="smoothing">プリセット1番目</td>
    </tr>
    <tr>
      <th class="smoothing">乳首の長さ</th>
      <td class="smoothing">20</td>
    </tr>
    <tr>
      <th class="smoothing">乳首の太さ</th>
      <td class="smoothing">18</td>
    </tr>
    <tr>
      <th class="smoothing">乳首の丸さ</th>
      <td class="smoothing">10</td>
    </tr>
    <tr>
      <th class="smoothing">乳首の陥没</th>
      <td class="smoothing">0</td>
    </tr>
    <tr>
      <th class="smoothing">乳首の閉じ陥没</th>
      <td class="smoothing">0</td>
    </tr>
    <tr>
      <th class="smoothing">乳輪の大きさ</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">乳輪のふくらみ範囲</th>
      <td class="smoothing">5</td>
    </tr>
    <tr>
      <th class="smoothing">乳輪のふくらみサイズ</th>
      <td class="smoothing">20</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="6">腕</th>
      <th class="smoothing">腕の長さ</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">上腕の太さ</th>
      <td class="smoothing">40</td>
    </tr>
    <tr>
      <th class="smoothing">二の腕の太さ</th>
      <td class="smoothing">45</td>
    </tr>
    <tr>
      <th class="smoothing">肘周りの太さ</th>
      <td class="smoothing">40</td>
    </tr>
    <tr>
      <th class="smoothing">前腕の太さ</th>
      <td class="smoothing">40</td>
    </tr>
    <tr>
      <th class="smoothing">手首の太さ</th>
      <td class="smoothing">45</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="10">胴体</th>
      <th class="smoothing">胸部の太さ</th>
      <td class="smoothing">35</td>
    </tr>
    <tr>
      <th class="smoothing">胸下の太さ</th>
      <td class="smoothing">35</td>
    </tr>
    <tr>
      <th class="smoothing">ウエストの太さ</th>
      <td class="smoothing">60</td>
    </tr>
    <tr>
      <th class="smoothing">腹囲の太さ</th>
      <td class="smoothing">45</td>
    </tr>
    <tr>
      <th class="smoothing">腰の太さ</th>
      <td class="smoothing">55</td>
    </tr>
    <tr>
      <th class="smoothing">腹</th>
      <td class="smoothing">24</td>
    </tr>
    <tr>
      <th class="smoothing">大きなお腹</th>
      <td class="smoothing">0</td>
    </tr>
    <tr>
      <th class="smoothing">ウエストの前後</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">尻の大きさ</th>
      <td class="smoothing">30</td>
    </tr>
    <tr>
      <th class="smoothing">尻の角度</th>
      <td class="smoothing">40</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="8">脚</th>
      <th class="smoothing">脚の長さ</th>
      <td class="smoothing">25</td>
    </tr>
    <tr>
      <th class="smoothing">上太ももの太さ</th>
      <td class="smoothing">39</td>
    </tr>
    <tr>
      <th class="smoothing">下太ももの太さ</th>
      <td class="smoothing">34</td>
    </tr>
    <tr>
      <th class="smoothing">膝周りの太さ</th>
      <td class="smoothing">39</td>
    </tr>
    <tr>
      <th class="smoothing">ふくらはぎの太さ</th>
      <td class="smoothing">34</td>
    </tr>
    <tr>
      <th class="smoothing">足首の太さ</th>
      <td class="smoothing">34</td>
    </tr>
    <tr>
      <th class="smoothing">膝の上下</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing">脚の大きさ</th>
      <td class="smoothing">35</td>
    </tr>
    <tr>
      <th class="smoothing">タトゥー</th>
      <th class="smoothing"></th>
      <td class="smoothing">無し</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="2">ネイル</th>
      <th class="smoothing">ネイルの種類</th>
      <td class="smoothing">無し</td>
    </tr>
    <tr>
      <th class="smoothing">ネイルのつや</th>
      <td class="smoothing">50</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="8">肌</th>
      <th class="smoothing" rowspan="2">肌</th>
      <th class="smoothing">肌の種類</th>
      <td class="smoothing">普通の肌</td>
    </tr>
    <tr>
      <th class="smoothing">色</th>
      <td class="smoothing">プリセット1番目</td>
    </tr>
    <tr>
      <th class="smoothing">日焼け</th>
      <th class="smoothing"></th>
      <td class="smoothing">無し</td>
    </tr>
    <tr>
      <th class="smoothing">脇毛</th>
      <th class="smoothing"></th>
      <td class="smoothing">無し</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="3">アンダーヘア</th>
      <th class="smoothing">アンダーヘアの種類</th>
      <td class="smoothing">アンダーヘア</td>
    </tr>
    <tr>
      <th class="smoothing">色</th>
      <td class="smoothing">デフォルト</td>
    </tr>
    <tr>
      <th class="smoothing">アンダーヘアの濃さ</th>
      <td class="smoothing">75</td>
    </tr>
    <tr>
      <th class="smoothing">アナルヘア</th>
      <th class="smoothing"></th>
      <td class="smoothing">無し</td>
    </tr>
    <tr>
      <th class="smoothing" rowspan="10">服装</th>
      <th class="smoothing" rowspan="4">トップス</th>
      <th class="smoothing"></th>
      <td class="smoothing">ソフィアメイドウェア（黒）</td>
    </tr>
    <tr>
      <th class="smoothing">胸影設定 - 影の強さ</th>
      <td class="smoothing">42</td>
    </tr>
    <tr>
      <th class="smoothing">形状設定 - ウェスト幅</th>
      <td class="smoothing">0</td>
    </tr>
    <tr>
      <th class="smoothing">形状設定 - 乳首ポチ</th>
      <td class="smoothing">0</td>
    </tr>
    <tr>
      <th class="smoothing">ボトムス</th>
      <th class="smoothing"></th>
      <td class="smoothing">ソフィアメイドスカート（黒）</td>
    </tr>
    <tr>
      <th class="smoothing">ブラ</th>
      <th class="smoothing"></th>
      <td class="smoothing">ノワールブラ（白）</td>
    </tr>
    <tr>
      <th class="smoothing">パンツ</th>
      <th class="smoothing"></th>
      <td class="smoothing">ノワールショーツ（白）</td>
    </tr>
    <tr>
      <th class="smoothing">靴下</th>
      <th class="smoothing"></th>
      <td class="smoothing">ソフィアメイドタイツ（黒）</td>
    </tr>
    <tr>
      <th class="smoothing">手袋</th>
      <th class="smoothing"></th>
      <td class="smoothing">ソフィアメイドグローブ（黒）</td>
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
      <th class="smoothing">頭</th>
      <th class="smoothing">頭アクセサリの種類 01</th>
      <td class="smoothing">
        ソフィアメイドヘッドドレス（黒）<br>
        位置調整なし
      </td>
    </tr>
    <tr>
      <th class="smoothing">目</th>
      <th class="smoothing">目アクセサリの種類 01</th>
      <td class="smoothing">
        クリアフレームレンズ（赤）<br>
        位置調整なし
      </td>
    </tr>
  </tbody>
</table>
