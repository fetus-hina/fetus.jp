<?php

declare(strict_types=1);

namespace app\widgets;

use app\helpers\Html;
use yii\base\InvalidConfigException;
use yii\base\Widget;

final class Youtube extends Widget
{
    public ?string $video = null;

    public function run(): string
    {
        $video = $this->video;
        if (
            !\is_string($video) ||
            !\preg_match('/^[a-zA-Z0-9_-]{11}$/', $video)
        ) {
            throw new InvalidConfigException();
        }

        return Html::tag(
            'div',
            $this->renderIframe($video),
            [
                'class' => [
                    'video-container',
                    'ratio',
                    'ratio-16x9',
                    'shadow-sm',
                    'mb-2',
                ],
            ],
        );
    }

    private function renderIframe(string $video): string
    {
        return Html::tag('iframe', '', [
            'allow' => \implode('; ', [
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
            'src' => \vsprintf('https://www.youtube-nocookie.com/embed/%s', [
                \rawurlencode($video),
            ]),
        ]);
    }
}
