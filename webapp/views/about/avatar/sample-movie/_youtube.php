<?php

declare(strict_types=1);

use app\helpers\Html;

/**
 * @var string $video
 */

?>
<?= Html::tag(
  'div',
  Html::tag('iframe', '', [
    'allow' => implode('; ', [
        'accelerometer',
        'autoplay',
        'clipboard-write',
        'encrypted-media',
        'gyroscope',
        'picture-in-picture',
    ]),
    'allowfullscreen' => null,
    'frameborder' => '0',
    'title' => 'YouTube video player',
    'src' => vsprintf('https://www.youtube-nocookie.com/embed/%s', [
      rawurlencode($video),
    ]),
  ]),
  [
    'class' => 'video-container ratio ratio-16x9 shadow-sm mb-2',
  ]
) . "\n" ?>
