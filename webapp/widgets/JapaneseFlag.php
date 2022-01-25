<?php

declare(strict_types=1);

namespace app\widgets;

use Yii;
use app\helpers\Html;
use app\helpers\Unicode;
use yii\base\InvalidConfigException;
use yii\base\Widget;

final class JapaneseFlag extends Widget
{
    public array $options = [
        'style' => [
            'height' => '0.875rem',
            'position' => 'relative',
            'top' => '0.125rem',
            'vertical-align' => 'baseline',
        ],
    ];

    public function init(): void
    {
        parent::init();

        if (!array_key_exists('alt', $this->options)) {
            $this->options['alt'] = Unicode::countryFlag('jp');
        }
    }

    public function run(): string
    {
        return Html::img(
            vsprintf('data:image/svg+xml;base64,%s', [
                base64_encode($this->getSvg()),
            ]),
            $this->options,
        );
    }

    private function getSvg(): string
    {
        $path = (string)Yii::getAlias('@app/resource/images/japanese-flag.min.svg');
        if (file_exists($path)) {
            if ($svg = @file_get_contents($path)) {
                return $svg;
            }
        }
        throw new InvalidConfigException('SVG file not ready');
    }
}
