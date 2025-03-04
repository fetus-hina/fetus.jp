<?php

declare(strict_types=1);

namespace app\widgets;

use Yii;
use app\helpers\Html;
use app\helpers\Icon;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\i18n\Formatter;

use function array_keys;
use function array_map;
use function array_values;
use function assert;
use function implode;
use function is_array;
use function is_string;
use function trim;
use function vsprintf;

final class PresetDownloadButton extends Widget
{
    public const BUTTON_ICON_DEFAULT = 'DEFAULT';

    public array $options = [];

    public string $buttonIcon = self::BUTTON_ICON_DEFAULT;
    public string $buttonFace = 'Download Preset';
    public string|array $buttonFormat = 'text';
    public string|array $buttonLink = '';
    public array $buttonOptions = [
        'class' => 'btn btn-outline-primary shadow-sm',
        'download' => true,
        'rel' => 'nofollow',
        'type' => 'application/octet-stream',
        'aria' => [
            'role' => 'button',
        ],
    ];

    /**
     * @var array<string, string|array>
     */
    public array $dropDownItems = []; // "text" => url

    public array $dropDownItemOptions = [
        'download' => true,
        'rel' => 'nofollow',
        'type' => 'application/octet-stream',
    ];

    public ?Formatter $formatter = null;

    /**
     * @return void
     */
    public function init()
    {
        parent::init();

        if (!$this->formatter) {
            $this->formatter = Yii::$app->formatter;
        }

        if ($this->buttonIcon === self::BUTTON_ICON_DEFAULT) {
            $this->buttonIcon = Icon::download();
        }
    }

    /**
     * @return string
     */
    public function run()
    {
        $options = $this->options;
        if (!isset($options['id'])) {
            $options['id'] = $this->id;
        }

        $tag = ArrayHelper::remove($options, 'tag', 'div');
        if (!is_string($tag) || trim($tag) === '') {
            $tag = 'div';
        }

        return Html::tag(
            $tag,
            $this->dropDownItems
                ? $this->renderBtnGroupMain()
                : $this->renderBtnMain(),
            $options,
        );
    }

    private function renderBtnMain(): string
    {
        return Html::a(
            trim(implode(' ', [
                $this->renderButtonIcon(),
                $this->renderButtonFace(),
            ])),
            $this->buttonLink,
            $this->buttonOptions,
        );
    }

    private function renderBtnGroupMain(): string
    {
        return Html::tag(
            'div',
            implode('', [
                $this->renderBtnMain(),
                $this->renderDropDownMain(),
            ]),
            [
                'class' => 'btn-group',
                'role' => 'group',
            ],
        );
    }

    private function renderButtonIcon(): string
    {
        return $this->buttonIcon;
    }

    private function renderButtonFace(): string
    {
        assert($this->formatter !== null);
        return $this->formatter->format($this->buttonFace, $this->buttonFormat);
    }

    private function renderDropDownMain(): string
    {
        return Html::tag(
            'div',
            implode('', [
                $this->renderDropDownParent(),
                $this->renderDropDownChildren(),
            ]),
            [
                'class' => 'btn-group',
                'role' => 'group',
            ],
        );
    }

    private function renderDropDownParent(): string
    {
        /**
         * @var string|string[] $btnClass
         */
        $btnClass = ArrayHelper::getValue($this->buttonOptions, 'class', '');

        return Html::button(
            '',
            [
                'aria' => [
                    'expanded' => 'false',
                ],
                'class' => implode(' ', [
                    is_array($btnClass) ? implode(' ', $btnClass) : (string)$btnClass,
                    'dropdown-toggle',
                ]),
                'data' => [
                    'bs-toggle' => 'dropdown',
                ],
                'id' => $this->getDropDownId(),
                'type' => 'button',
            ],
        );
    }

    private function renderDropDownChildren(): string
    {
        assert($this->formatter !== null);
        return Html::tag(
            'ul',
            implode('', array_map(
                fn ($text, $url) => Html::tag(
                    'li',
                    Html::a(
                        trim(implode(' ', [
                            $this->renderButtonIcon(),
                            $this->formatter->asText($text),
                        ])),
                        $url,
                        $this->dropDownItemOptions,
                    ),
                    ['class' => 'dropdown-item'],
                ),
                array_keys($this->dropDownItems),
                array_values($this->dropDownItems),
            )),
            [
                'aria' => [
                    'labelledby' => $this->getDropDownId(),
                ],
                'class' => [
                    'bg-body',
                    'dropdown-menu',
                    'shadow',
                ],
            ],
        );
    }

    private function getDropDownId(): string
    {
        return vsprintf('%s-dropdown', [
            $this->getId(),
        ]);
    }
}
