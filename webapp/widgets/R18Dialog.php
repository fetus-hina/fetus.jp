<?php

declare(strict_types=1);

namespace app\widgets;

use app\helpers\Html;
use app\helpers\Icon;
use yii\base\Widget;
use yii\bootstrap5\BootstrapAsset;
use yii\web\View;

use function implode;
use function vsprintf;

final class R18Dialog extends Widget
{
    public function run(): string
    {
        if (($v = $this->view) instanceof View) {
            BootstrapAsset::register($v);
        }

        return $this->renderDialog();
    }

    private function renderDialog(): string
    {
        return Html::tag(
            'div',
            Html::tag(
                'div',
                Html::tag(
                    'div',
                    implode('', [
                        $this->renderHeader(),
                        $this->renderBody(),
                        $this->renderFooter(),
                    ]),
                    [
                        'class' => 'modal-content',
                    ],
                ),
                [
                    'class' => [
                        'modal-dialog',
                        'modal-dialog-centered',
                    ],
                ],
            ),
            [
                'aria' => [
                    'hidden' => 'true',
                ],
                'class' => [
                    'fade',
                    'modal',
                ],
                'id' => 'r18-dialog',
                'tabindex' => '-1',
            ],
        );
    }

    private function renderHeader(): string
    {
        return Html::tag(
            'div',
            implode('', [
                Html::tag(
                    'h5',
                    implode(' ', [
                        Icon::r18(),
                        Html::encode('確認'),
                    ]),
                    ['class' => 'modal-title'],
                ),
                Html::button('', [
                    'aria' => [
                        'label' => 'キャンセル',
                    ],
                    'class' => 'btn-close',
                    'data' => [
                        'bs-dismiss' => 'modal',
                    ],
                ]),
            ]),
            [
                'class' => 'modal-header',
            ],
        );
    }

    private function renderBody(): string
    {
        return Html::tag(
            'div',
            $this->renderBodyContent(),
            [
                'class' => 'modal-body',
            ],
        );
    }

    private function renderBodyContent(): string
    {
        return implode('', [
            Html::tag(
                'p',
                implode('<br>', [
                    Html::encode('リンク先はアダルトコンテンツを含むページです。'),
                    Html::encode('本当に移動しますか？'),
                ]),
            ),
            Html::tag(
                'p',
                implode(' ', [
                    Html::encode('リンク先:'),
                    Html::tag('span', Icon::secure(), ['id' => 'r18-dialog-link-secure']),
                    Html::tag('span', 'example.com', ['id' => 'r18-dialog-link-origin']),
                ]),
                [
                    'class' => [
                        'mb-0',
                    ],
                ],
            ),
        ]);
    }

    private function renderFooter(): string
    {
        return Html::tag(
            'div',
            implode('', [
                $this->renderCancelButton(),
                $this->renderOkButton(),
            ]),
            [
                'class' => 'modal-footer',
            ],
        );
    }

    private function renderCancelButton(): string
    {
        return Html::button(
            vsprintf('%s %s', [
                Icon::dismiss(),
                Html::tag(
                    'span',
                    Html::encode('キャンセル'),
                    [
                        'class' => [
                            'd-inline-block',
                        ],
                    ],
                ),
            ]),
            [
                'class' => 'btn btn-outline-primary',
                'data' => [
                    'bs-dismiss' => 'modal',
                ],
            ],
        );
    }

    private function renderOkButton(): string
    {
        return Html::button(
            vsprintf('%s %s', [
                Icon::ok(),
                Html::tag(
                    'span',
                    Html::encode('OK'),
                    [
                        'class' => [
                            'd-inline-block',
                        ],
                    ],
                ),
            ]),
            [
                'class' => 'btn btn-primary',
                'id' => 'r18-dialog-ok',
            ],
        );
    }
}
