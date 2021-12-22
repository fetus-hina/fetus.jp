<?php

declare(strict_types=1);

namespace app\helpers;

use LogicException;
use Yii;
use app\assets\BootstrapIconsAsset;
use yii\helpers\Html;
use yii\web\AssetBundle;
use yii\web\View;

final class Icon
{
    // angleDoubleLeft
    // angleDoubleRight
    // avatar
    // envelope
    // github
    // house
    // key
    // language
    // like
    // mastodon
    // next
    // previous
    // radio
    // twitter
    // user
    // wordpress

    public static function angleDoubleLeft(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-chevron-double-left');
    }

    public static function angleDoubleRight(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-chevron-double-right');
    }

    public static function avatar(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-person-badge-fill');
    }

    public static function envelope(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-envelope-fill');
    }

    public static function github(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-github');
    }

    public static function house(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-house-fill');
    }

    public static function key(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-key-fill');
    }

    public static function language(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-translate');
    }

    public static function like(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-hand-thumbs-up');
    }

    public static function mastodon(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-mastodon');
    }

    public static function next(): string
    {
        return self::angleDoubleRight();
    }

    public static function previous(): string
    {
        return self::angleDoubleLeft();
    }

    public static function radio(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-broadcast-pin');
    }

    public static function twitter(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-twitter');
    }

    public static function user(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-person-fill');
    }

    public static function wordpress(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-wordpress');
    }

    private static function renderIcon(string $source, mixed $data): string
    {
        self::registerAsset($source);
        return self::renderIconImpl($source, $data);
    }

    private static function registerAsset(string $source): AssetBundle
    {
        $view = Yii::$app->view;
        if (!$view instanceof View) {
            throw new LogicException();
        }

        return match ($source) {
            IconSource::BOOTSTRAP_ICONS => BootstrapIconsAsset::register($view),
            default => throw new LogicException(),
        };
    }

    private static function renderIconImpl(string $source, mixed $data): string
    {
        return match ($source) {
            IconSource::BOOTSTRAP_ICONS => self::renderBootstrapIcon($data),
            default => throw new LogicException(),
        };
    }

    private static function renderBootstrapIcon(string $class): string
    {
        return Html::tag('span', '', [
            'class' => ['bi', $class],
        ]);
    }
}
