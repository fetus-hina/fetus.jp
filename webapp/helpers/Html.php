<?php

declare(strict_types=1);

namespace app\helpers;

use yii\helpers\Url;

class Html extends \yii\bootstrap5\Html
{
    /** @inheritdoc */
    public static function a($text, $url = null, $options = [])
    {
        if ($url !== null) {
            $options['href'] = Url::to($url);
        }

        if (isset($options['href']) && is_string($options['href'])) {
            if (!Url::isRelative($options['href'])) {
                if (!($options['rel'] ?? null)) {
                    $options['rel'] = 'noopener noreferrer';
                }

                if (!($options['target'] ?? null)) {
                    $options['target'] = '_blank';
                }
            }
        }

        return static::tag('a', $text, $options);
    }

    /**
     * @param string $text
     * @param string|array|null $url,
     * @param array<string, mixed> $options
     */
    public static function aR18($text, $url = null, $options = []): string
    {
        if (!isset($options['data'])) {
            $options['data'] = [];
        }

        if (!isset($options['data']['confirm'])) {
            $options['data']['confirm'] = implode("\n", [
                Icon::r18() . self::encode('リンク先はアダルトコンテンツを含むページです。'),
                self::encode('本当に移動しますか？'),
            ]);
        }

        return self::a(
            Icon::r18() . $text,
            $url,
            $options,
        );
    }
}
