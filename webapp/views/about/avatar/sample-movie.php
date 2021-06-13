<?php

declare(strict_types=1);

use ScssPhp\ScssPhp\Compiler as ScssCompiler;
use yii\bootstrap4\BootstrapPluginAsset;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 */

BootstrapPluginAsset::register($this);

$defaultTab = 'sample-exercise';
$data = [
  'sample-exercise' => [
    'name' => 'メイド体操第一',
    'content' => $this->render('//about/avatar/sample-movie/exercise'),
  ],
  'sample-dangan' => [
    'name' => 'DAN! GAN! パーティ!!',
    'content' => $this->render('//about/avatar/sample-movie/dangan'),
  ],
];

$this->registerCss(
  (new ScssCompiler())
    ->compileString('
      #sample {
        .tab-content {
          border: 1px solid #c8beba;
          border-top: 0;
          border-radius: 0 0 0.25rem 0.25rem;
        }

        .video-container {
          max-width: 853px;

          iframe {
            border-radius: 0.25rem;
          }
        }
      }
    ')
    ->getCss()
);

?>
<div id="sample">
  <h3>サンプル動画</h3>
  <nav>
    <?= Html::tag(
      'ul',
      implode('', array_map(
        fn($id, $info) => Html::tag(
          'li',
          Html::tag(
            'button',
            Html::encode($info['name']),
            [
              'class' => array_filter([
                'nav-link',
                ($id === $defaultTab) ? 'active' : null,
              ]),
              'id' => $id . '-tab',
              'role' => 'tab',
              'type' => 'button',
              'aria' => [
                'selected' => ($id === $defaultTab) ? 'true' : 'false',
              ],
              'data' => [
                'bs-toggle' => 'tab',
                'bs-target' => '#' . $id,
              ],
            ]
          ),
          [
            'class' => 'nav-item',
            'role' => 'presentation',
          ]
        ),
        array_keys($data),
        array_values($data),
      )),
      [
        'class' => 'nav nav-tabs',
        'role' => 'tablist',
      ]
    ) . "\n" ?>
  </nav>
  <?= Html::tag(
    'div',
    implode('', array_map(
      fn($id, $info) => Html::tag('div', $info['content'], [
        'id' => $id,
        'role' => 'tabpanel',
        'aria' => [
          'labelledby' => $id . '-tab',
        ],
        'class' => array_filter([
          'tab-pane',
          'fade',
          ($id === $defaultTab) ? 'show' : null,
          ($id === $defaultTab) ? 'active' : null,
        ]),
      ]),
      array_keys($data),
      array_values($data),
    )),
    ['class' => 'tab-content p-2 shadow-sm']
  ) . "\n" ?>
</div>
