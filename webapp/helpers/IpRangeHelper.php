<?php

declare(strict_types=1);

namespace app\helpers;

use function array_filter;
use function array_values;
use function explode;
use function inet_pton;
use function str_contains;
use function usort;

final class IpRangeHelper
{
    /**
     * @param string[] $ranges
     * @return array{ipv4: string[], ipv6: string[]}
     */
    public static function separate(array $ranges): array
    {
        return [
            'ipv4' => array_values(array_filter($ranges, fn (string $r): bool => !str_contains($r, ':'))),
            'ipv6' => array_values(array_filter($ranges, fn (string $r): bool => str_contains($r, ':'))),
        ];
    }

    /**
     * @param string[] $ranges
     * @return string[]
     */
    public static function sort(array $ranges): array
    {
        $sorted = $ranges;
        usort($sorted, function (string $a, string $b): int {
            [$addrA, $prefixA] = explode('/', $a);
            [$addrB, $prefixB] = explode('/', $b);

            $binA = inet_pton($addrA);
            $binB = inet_pton($addrB);

            $cmp = $binA <=> $binB;
            if ($cmp !== 0) {
                return $cmp;
            }

            return (int)$prefixA <=> (int)$prefixB;
        });

        return $sorted;
    }

    /**
     * @param string[] $ranges
     * @return array{ipv4: string[], ipv6: string[]}
     */
    public static function separateAndSort(array $ranges): array
    {
        $separated = self::separate($ranges);

        return [
            'ipv4' => self::sort($separated['ipv4']),
            'ipv6' => self::sort($separated['ipv6']),
        ];
    }
}
