<?php

declare(strict_types=1);

namespace tests\helpers;

use Codeception\Test\Unit;
use UnitTester;
use app\helpers\IpRangeHelper;

final class IpRangeHelperTest extends Unit
{
    protected UnitTester $tester;

    public function testSeparateIpv4AndIpv6(): void
    {
        $ranges = [
            '192.168.1.0/24',
            '2001:db8::/32',
            '10.0.0.0/8',
            'fd00::/8',
        ];

        $result = IpRangeHelper::separate($ranges);

        $this->assertArrayHasKey('ipv4', $result);
        $this->assertArrayHasKey('ipv6', $result);
        $this->assertCount(2, $result['ipv4']);
        $this->assertCount(2, $result['ipv6']);
        $this->assertContains('192.168.1.0/24', $result['ipv4']);
        $this->assertContains('10.0.0.0/8', $result['ipv4']);
        $this->assertContains('2001:db8::/32', $result['ipv6']);
        $this->assertContains('fd00::/8', $result['ipv6']);
    }

    public function testEmptyInput(): void
    {
        $result = IpRangeHelper::separate([]);

        $this->assertSame([], $result['ipv4']);
        $this->assertSame([], $result['ipv6']);
    }

    public function testIpv4OnlyInput(): void
    {
        $ranges = ['10.0.0.0/8', '172.16.0.0/12'];
        $result = IpRangeHelper::separate($ranges);

        $this->assertCount(2, $result['ipv4']);
        $this->assertSame([], $result['ipv6']);
    }

    public function testIpv6OnlyInput(): void
    {
        $ranges = ['2001:db8::/32', '::1/128'];
        $result = IpRangeHelper::separate($ranges);

        $this->assertSame([], $result['ipv4']);
        $this->assertCount(2, $result['ipv6']);
    }

    public function testSortIpv4(): void
    {
        $ranges = [
            '192.168.1.0/24',
            '10.0.0.0/8',
            '10.0.0.0/16',
            '172.16.0.0/12',
            '1.2.3.0/24',
        ];

        $sorted = IpRangeHelper::sort($ranges);

        $this->assertSame([
            '1.2.3.0/24',
            '10.0.0.0/8',
            '10.0.0.0/16',
            '172.16.0.0/12',
            '192.168.1.0/24',
        ], $sorted);
    }

    public function testSortIpv6(): void
    {
        $ranges = [
            'fd00::/8',
            '2001:db8::/32',
            '::1/128',
            '2001:db8:1::/48',
        ];

        $sorted = IpRangeHelper::sort($ranges);

        $this->assertSame([
            '::1/128',
            '2001:db8::/32',
            '2001:db8:1::/48',
            'fd00::/8',
        ], $sorted);
    }

    public function testSortSameAddressDifferentPrefix(): void
    {
        $ranges = [
            '10.0.0.0/16',
            '10.0.0.0/8',
            '10.0.0.0/24',
        ];

        $sorted = IpRangeHelper::sort($ranges);

        $this->assertSame([
            '10.0.0.0/8',
            '10.0.0.0/16',
            '10.0.0.0/24',
        ], $sorted);
    }

    public function testSortEmpty(): void
    {
        $this->assertSame([], IpRangeHelper::sort([]));
    }

    public function testSortSingleElement(): void
    {
        $this->assertSame(['10.0.0.0/8'], IpRangeHelper::sort(['10.0.0.0/8']));
    }

    public function testSeparateAndSortIntegration(): void
    {
        $ranges = [
            '192.168.1.0/24',
            '2001:db8:1::/48',
            '10.0.0.0/8',
            '::1/128',
            '172.16.0.0/12',
            '2001:db8::/32',
        ];

        $result = IpRangeHelper::separateAndSort($ranges);

        $this->assertSame([
            '10.0.0.0/8',
            '172.16.0.0/12',
            '192.168.1.0/24',
        ], $result['ipv4']);

        $this->assertSame([
            '::1/128',
            '2001:db8::/32',
            '2001:db8:1::/48',
        ], $result['ipv6']);
    }
}
