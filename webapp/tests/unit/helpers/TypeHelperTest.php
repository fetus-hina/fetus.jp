<?php

declare(strict_types=1);

namespace tests\helpers;

use ArrayObject;
use Codeception\Test\Unit;
use Countable;
use IteratorAggregate;
use SplObjectStorage;
use TypeError;
use UnitTester;
use app\helpers\TypeHelper;
use stdClass;

final class TypeHelperTest extends Unit
{
    protected UnitTester $tester;

    public function testReturnsSameInstanceWhenExactType(): void
    {
        $value = new stdClass();
        $this->assertSame($value, TypeHelper::instanceOf($value, stdClass::class));
    }

    public function testReturnsSameInstanceForSubclass(): void
    {
        $value = new ArrayObject();
        // ArrayObject implements Traversable, IteratorAggregate, ArrayAccess, Countable
        $this->assertSame($value, TypeHelper::instanceOf($value, IteratorAggregate::class));
        $this->assertSame($value, TypeHelper::instanceOf($value, Countable::class));
    }

    public function testThrowsWhenObjectIsDifferentClass(): void
    {
        $this->expectException(TypeError::class);
        TypeHelper::instanceOf(new stdClass(), SplObjectStorage::class);
    }

    public function testThrowsWhenValueIsNull(): void
    {
        $this->expectException(TypeError::class);
        TypeHelper::instanceOf(null, stdClass::class);
    }

    public function testThrowsWhenValueIsScalar(): void
    {
        $this->expectException(TypeError::class);
        TypeHelper::instanceOf(42, stdClass::class);
    }

    public function testThrowsWhenValueIsString(): void
    {
        $this->expectException(TypeError::class);
        // class-string ではなくただの文字列は object ではないので失敗するはず
        TypeHelper::instanceOf(stdClass::class, stdClass::class);
    }

    public function testThrowsWhenValueIsArray(): void
    {
        $this->expectException(TypeError::class);
        TypeHelper::instanceOf([], stdClass::class);
    }
}
