<?php

declare(strict_types=1);

namespace app\widgets;

use app\helpers\Html;
use yii\base\Widget;
use yii\bootstrap5\BootstrapPluginAsset;
use yii\helpers\Json;
use yii\web\JqueryAsset;

/**
 * @phpstan-type LicensedFormat array{f: float|int, p: positive-int}
 * @phpstan-type License array{gl: non-empty-string, jcc: non-empty-string, formats: LicensedFormat[]}
 */
final class HamCallsigns extends Widget
{
    /**
     * @var array<non-empty-string, License> $data
     */
    public array $data = [
        'JP3CKI' => [
            'gl' => 'PM74',
            'jcc' => '2517',
            'formats' => [
                [
                    'f' => 3.5,
                    'p' => 10,
                ],
                [
                    'f' => 3.8,
                    'p' => 10,
                ],
                [
                    'f' => 7,
                    'p' => 10,
                ],
                [
                    'f' => 21,
                    'p' => 10,
                ],
                [
                    'f' => 24,
                    'p' => 10,
                ],
                [
                    'f' => 28,
                    'p' => 10,
                ],
                [
                    'f' => 50,
                    'p' => 10,
                ],
                [
                    'f' => 145,
                    'p' => 20,
                ],
                [
                    'f' => 430,
                    'p' => 20,
                ],
            ],
        ],
        'JN4QYA' => [
            'gl' => 'PM64',
            'jcc' => '350105',
            'formats' => [
                [
                    'f' => 145,
                    'p' => 10,
                ],
                [
                    'f' => 430,
                    'p' => 10,
                ],
            ],
        ],
    ];

    public function run(): string
    {
        return Html::tag(
            'ul',
            \implode('', \array_map(
                fn (string $callsign, array $data): string => Html::tag('li', $this->renderStation($callsign, $data)),
                \array_keys($this->data),
                \array_values($this->data),
            )),
            [
                'class' => 'list-unstyled',
            ],
        );
    }

    /**
     * @phpstan-param non-empty-string $callsign
     * @phpstan-param License $data
     */
    private function renderStation(string $callsign, array $data): string
    {
        return \implode('', [
            $this->renderStationHeadline($callsign, $data),
            $this->renderStationLicenses($callsign, $data['formats']),
        ]);
    }

    /**
     * @phpstan-param non-empty-string $callsign
     * @phpstan-param License $data
     */
    private function renderStationHeadline(string $callsign, array $data): string
    {
        return Html::tag(
            'div',
            \vsprintf('%s (%s)', [
                self::monospace(Html::encode($callsign)),
                $this->renderStationHeadlineData($data),
            ]),
        );
    }

    /**
     * @phpstan-param License $data
     */
    private function renderStationHeadlineData(array $data): string
    {
        return \implode(', ', [
            $this->renderGridLocator($data['gl']),
            $this->renderJcc($data['jcc']),
        ]);
    }

    private function renderGridLocator(string $gl): string
    {
        return \vsprintf('%s: %s', [
            $this->abbr(Html::encode('GL'), 'Grid Locator (QTH Locator)'),
            self::monospace(Html::encode($gl)),
        ]);
    }

    private function renderJcc(string $jcc): string
    {
        return \vsprintf('JCC# %s', [
            self::monospace(Html::encode($jcc)),
        ]);
    }

    /**
     * @phpstan-param LicensedFormat[] $data
     */
    private function renderStationLicenses(string $callsign, array $data): string
    {
        $id = 'license-' . \strtolower($callsign);

        return Html::tag(
            'div',
            \implode('', [
                Html::button(
                    '',
                    [
                        'aria' => [
                            'expanded' => 'false',
                        ],
                        'class' => [
                            'btn',
                            'btn-outline-primary',
                            'btn-sm',
                            'dropdown-toggle',
                        ],
                        'data' => [
                            'bs-toggle' => 'dropdown',
                        ],
                        'id' => $id,
                        'type' => 'button',
                    ],
                ),
                Html::tag(
                    'ul',
                    \implode('', \array_map(
                        fn (array $data): string => Html::tag(
                            'li',
                            Html::tag(
                                'span',
                                Html::encode(\vsprintf('%s MHz: %d W', [
                                    \is_int($data['f'])
                                        ? (string)$data['f']
                                        : \sprintf('%.1f', $data['f']),
                                    $data['p'],
                                ])),
                                [
                                    'class' => [
                                        'd-inline-block',
                                    ],
                                ],
                            ),
                            [
                                'class' => [
                                    'dropdown-item',
                                    'disabled',
                                    'text-body',
                                ],
                            ],
                        ),
                        $data,
                    )),
                    [
                        'aria' => [
                            'labelledby' => $id,
                        ],
                        'class' => [
                            'dropdown-menu',
                            'shadow',
                        ],
                    ],
                ),
            ]),
            [
                'class' => [
                    'dropdown',
                    'ms-4',
                ],
            ],
        );
    }

    /**
     * @phpstan-param non-empty-string $tag
     */
    private static function monospace(string $html, string $tag = 'span'): string
    {
        return Html::tag(
            $tag,
            $html,
            [
                'class' => 'font-monospace',
            ]
        );
    }

    /**
     * @phpstan-param non-empty-string $expansion
     */
    private function abbr(string $html, string $expansion): string
    {
        JqueryAsset::register($this->view);
        BootstrapPluginAsset::register($this->view);

        $abbrClass = self::abbrClassname();
        $this->view->registerJs(\vsprintf('$(%s).each(function(){new bootstrap.Tooltip(this)});', [
            Json::encode('.' . $abbrClass),
        ]));

        return Html::tag(
            'abbr',
            $html,
            [
                'title' => $expansion,
                'class' => [
                    $abbrClass,
                    'text-decoration-none',
                ],
            ]
        );
    }

    private static function abbrClassname(): string
    {
        return \vsprintf('%s-%s', [
            self::$autoIdPrefix,
            \hash('crc32b', __METHOD__),
        ]);
    }
}
