<?php

declare(strict_types=1);

namespace app\helpers;

use Yii;
use app\assets\R18DialogAsset;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\View;

use function is_string;
use function sprintf;
use function vsprintf;

class Html extends \yii\bootstrap5\Html
{
    private const CLASS_R18_LINK = 'r18-link';

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
     * @param string|array|null $url,
     * @param array<string, mixed> $options
     */
    public static function aR18(string $text, string|array|null $url = null, array $options = []): string
    {
        if (($v = Yii::$app->view) instanceof View) {
            R18DialogAsset::register($v);
            $v->registerJs(
                vsprintf('$(%s).r18dialog();', [
                    Json::encode(sprintf('.%s', self::CLASS_R18_LINK)),
                ]),
                View::POS_READY,
                __METHOD__, // scriptlet-id
            );
        }

        self::addCssClass($options, self::CLASS_R18_LINK);

        return self::a(
            Icon::r18() . $text,
            $url,
            $options,
        );
    }
}
