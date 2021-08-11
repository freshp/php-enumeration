<?php

declare(strict_types=1);

namespace FreshP\PhpEnumeration\Tests\Unit;

use FreshP\PhpEnumeration\Tests\Fixtures\EmptyEnumFixture;
use FreshP\PhpEnumeration\Tests\Fixtures\EnumFixture;
use FreshP\PhpEnumeration\Tests\Fixtures\ExceptionEnumFixture;
use PHPUnit\Framework\TestCase;
use RuntimeException;
use stdClass;
use TypeError;

class EnumTest extends TestCase
{
    public function testDefaultEnumHandling(): void
    {
        $enum = new EnumFixture();

        self::assertSame(EnumFixture::TEST_DEFAULT, $enum->__toString());
        self::assertTrue($enum->isEqual(EnumFixture::TEST_DEFAULT()));
    }

    public function testDefaultEnumHandlingWithConstructorValue(): void
    {
        $enum = new EnumFixture('definitely not set value');

        self::assertSame(EnumFixture::TEST_DEFAULT, (string)$enum);
        self::assertTrue($enum->isEqual(EnumFixture::TEST_DEFAULT()));
    }

    public function testTypeErrorForUsingWrongDataType(): void
    {
        $this->expectException(TypeError::class);

        new EnumFixture(new stdClass());
    }

    public function testSuccessfulReturnValueForDefinedEnum(): void
    {
        $enum = new EnumFixture(EnumFixture::TEST_CONSTANT);

        self::assertSame(EnumFixture::TEST_CONSTANT, (string)$enum);
        self::assertTrue($enum->isEqual(EnumFixture::TEST_CONSTANT()));
    }

    public function testSuccessfulReturnValueForDefinedEnumWithStaticConstruct(): void
    {
        $enum = EnumFixture::TEST_CONSTANT();

        self::assertSame(EnumFixture::TEST_CONSTANT, (string)$enum);
        self::assertTrue($enum->isEqual(EnumFixture::TEST_CONSTANT()));
    }

    public function testReturnValueForEnumWithStaticConstructThatDoesNotExist(): void
    {
        $enum = EnumFixture::BUBA_BALATSCHKI();

        self::assertSame(EnumFixture::TEST_DEFAULT, (string)$enum);
        self::assertTrue($enum->isEqual(EnumFixture::TEST_DEFAULT()));
    }

    public function testReflectionException(): void
    {
        $enum = new EmptyEnumFixture();

        self::assertEmpty($enum->__toString());
        self::assertNotEmpty(EmptyEnumFixture::listAllOptions());
    }

    public function testExceptionForNoDefinedDefaultValue(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionCode(1578410537);

        (new ExceptionEnumFixture())->__toString();
    }
}
