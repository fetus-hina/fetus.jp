<?php

declare(strict_types=1);

namespace app\widgets;

use Yii;
use app\assets\TwemojiAsset;
use app\helpers\Unicode;
use yii\base\Widget;
use yii\bootstrap5\Html;
use yii\helpers\Json;
use yii\web\View;

use function sprintf;
use function vsprintf;

final class Twemoji extends Widget
{
    public string|array $format = 'text';
    public string $text = '';

    public static function r18(): string
    {
        return static::widget([
            'text' => Unicode::fromCodepoint(Unicode::CODEPOINT_R18),
        ]);
    }

    public function run(): string
    {
        $id = $this->id;

        if (($view = $this->view) instanceof View) {
            TwemojiAsset::register($view);

            $view->registerJs(vsprintf('$(%s).twemoji();', [
                Json::encode(sprintf('#%s', $id)),
            ]));
        }

        return Html::tag(
            'span',
            Yii::$app->formatter->format($this->text, $this->format),
            ['id' => $id],
        );
    }
}
