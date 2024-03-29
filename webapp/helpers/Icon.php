<?php

declare(strict_types=1);

namespace app\helpers;

use LogicException;
use TypeError;
use Yii;
use app\assets\BootstrapIconsAsset;
use app\widgets\Twemoji;
use yii\web\AssetBundle;
use yii\web\View;

use function is_string;

final class Icon
{
    // aboutMe
    // angleDoubleLeft
    // angleDoubleRight
    // avatar
    // dismiss
    // download
    // envelope
    // github
    // house
    // key
    // language
    // license
    // like
    // markup
    // mastodon
    // middleware
    // next
    // ok
    // previous
    // programming
    // r18
    // radio
    // secure
    // server
    // skill
    // twitter
    // user
    // webService
    // wordpress

    public static function aboutMe(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-person-bounding-box');
    }

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

    public static function dismiss(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-x-lg');
    }

    public static function download(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-download');
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

    public static function license(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-person-check-fill');
    }

    public static function like(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-hand-thumbs-up');
    }

    public static function markup(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-code');
    }

    public static function mastodon(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-mastodon');
    }

    public static function middleware(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-gear');
    }

    public static function next(): string
    {
        return self::angleDoubleRight();
    }

    public static function ok(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-check2');
    }

    public static function previous(): string
    {
        return self::angleDoubleLeft();
    }

    public static function programming(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-pc-display-horizontal');
    }

    public static function r18(): string
    {
        return self::renderIcon(IconSource::TWEMOJI, Unicode::fromCodepoint(Unicode::CODEPOINT_R18));
    }

    public static function radio(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-broadcast-pin');
    }

    public static function secure(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-file-lock2');
    }

    public static function server(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-server');
    }

    public static function skill(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-wrench');
    }

    public static function twitter(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-twitter');
    }

    public static function user(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-person-fill');
    }

    public static function webService(): string
    {
        return self::renderIcon(IconSource::BOOTSTRAP_ICONS, 'bi-globe');
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

    private static function registerAsset(string $source): ?AssetBundle
    {
        $view = Yii::$app->view;
        if (!$view instanceof View) {
            throw new LogicException();
        }

        return match ($source) {
            IconSource::BOOTSTRAP_ICONS => BootstrapIconsAsset::register($view),
            IconSource::TWEMOJI => null,
            default => throw new LogicException(),
        };
    }

    private static function renderIconImpl(string $source, mixed $data): string
    {
        return match ($source) {
            IconSource::BOOTSTRAP_ICONS => self::renderBootstrapIcon($data),
            IconSource::TWEMOJI => self::renderTwemoji($data),
            default => throw new LogicException(),
        };
    }

    private static function renderBootstrapIcon(mixed $class): string
    {
        if (!is_string($class)) {
            throw new TypeError();
        }

        return Html::tag('span', '', [
            'class' => ['bi', $class],
        ]);
    }

    private static function renderTwemoji(mixed $emojiText): string
    {
        if (!is_string($emojiText)) {
            throw new TypeError();
        }

        return Twemoji::widget([
            'text' => $emojiText,
        ]);
    }
}
