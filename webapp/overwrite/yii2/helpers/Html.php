<?php

declare(strict_types=1);

namespace yii\helpers;

final class Html extends BaseHtml
{
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
}
