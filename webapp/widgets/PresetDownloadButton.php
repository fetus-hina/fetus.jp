<?php

declare(strict_types=1);

namespace app\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\i18n\Formatter;

final class PresetDownloadButton extends Widget
{
    public array $options = [];

    public string $buttonIcon = '{fa fas fa-download}';
    public string $buttonFace = 'Download Preset';
    public mixed $buttonFormat = 'text';
    public mixed $buttonLink = '';
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
     * @var array<string, mixed>
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

        return Html::tag(
            $tag,
            ($this->dropDownItems)
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
            ]
        );
    }

    private function renderButtonIcon(): string
    {
        return preg_replace_callback(
            '/\{fa (.+?)}/',
            function (array $match): string {
                return Html::tag('span', '', [
                    'class' => trim($match[1]),
                ]);
            },
            $this->buttonIcon,
        );
    }

    private function renderButtonFace(): string
    {
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
            ]
        );
    }

    private function renderDropDownParent(): string
    {
        /**
         * @var string[]|string
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
            ]
        );
    }

    private function renderDropDownChildren(): string
    {
        return Html::tag(
            'ul',
            implode('', array_map(
                fn($text, $url) => Html::tag(
                    'li',
                    Html::a(
                        trim(implode(' ', [
                            $this->renderButtonIcon(),
                            $this->formatter->asText($text),
                        ])),
                        $url,
                        $this->dropDownItemOptions,
                    ),
                    ['class' => 'dropdown-item']
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
            ]
        );
    }

    private function getDropDownId(): string
    {
        return vsprintf('%s-dropdown', [
            $this->getId(),
        ]);
    }
}
