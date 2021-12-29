<?php

declare(strict_types=1);

namespace app\helpers;

use InvalidArgumentException ;
use RangeException;
use TypeError;
use Yii;
use yii\helpers\ArrayHelper;

final class Unicode
{
    public const SKINTONE_LIGHT = 0x1F3FB;
    public const SKINTONE_MEDIUM_LIGHT = 0x1F3FC;
    public const SKINTONE_MEDIUM = 0x1F3FD;
    public const SKINTONE_MEDIUM_DARK = 0x1F3FE;
    public const SKINTONE_DARK = 0x1F3FF;

    private const REGIONAL_INDICATOR_BASE = 0x1F1E6;

    /** @param int|int[] $codepoint */
    public static function fromCodepoint($codepoint, ?string $charset = null): string
    {
        if (is_int($codepoint)) {
            if ($codepoint < 0 || $codepoint > 0x10FFFF) {
                throw new RangeException(sprintf('Out of range: 0 <= %x <= 10FFFF', $codepoint));
            }

            if (($c = mb_chr($codepoint, $charset ?? Yii::$app->charset)) === false) {
                throw new InvalidArgumentException('Unsupported charset for the character');
            }

            return $c;
        }
        
        if (is_array($codepoint) && ArrayHelper::isIndexed($codepoint, true)) {
            return implode('', array_map(
                fn (int $c): string => self::fromCodepoint($c, $charset),
                $codepoint,
            ));
        }

        throw new TypeError();
    }

    public static function countryFlag(string $cc): string
    {
        $cc = strtoupper(trim($cc));
        if (!preg_match('/^[A-Z]{2}$/', $cc)) {
            throw new InvalidArgumentException();
        }

        return self::fromCodepoint([
            self::REGIONAL_INDICATOR_BASE + (ord(substr($cc, 0, 1)) - ord('A')),
            self::REGIONAL_INDICATOR_BASE + (ord(substr($cc, 1, 1)) - ord('A')),
        ]);
    }
}
