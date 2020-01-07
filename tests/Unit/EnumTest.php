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

        $this->assertEquals(EnumFixture::TEST_DEFAULT, $enum);
    }

    public function testDefaultEnumHandlingWithConstructorValue(): void
    {
        $enum = new EnumFixture('definitely not set value');

        $this->assertEquals(EnumFixture::TEST_DEFAULT, $enum);
    }

    public function testTypeErrorForUsingWrongDataType(): void
    {
        $this->expectException(TypeError::class);

        new EnumFixture(new stdClass());
    }

    public function testSuccessfulReturnValueForDefinedEnum(): void
    {
        $enum = new EnumFixture(EnumFixture::TEST_CONSTANT);

        $this->assertEquals(EnumFixture::TEST_CONSTANT, $enum);
    }

    public function testSuccessfulReturnValueForDefinedEnumWithStaticConstruct(): void
    {
        $enum = EnumFixture::TEST_CONSTANT();

        $this->assertEquals(EnumFixture::TEST_CONSTANT, $enum);
    }

    public function testReturnValueForEnumWithStaticConstructThatDoesNotExist(): void
    {
        $enum = EnumFixture::BUBA_BALATSCHKI();

        $this->assertEquals(EnumFixture::TEST_DEFAULT, $enum);
    }

    public function testReflectionException(): void
    {
        $enum = new EmptyEnumFixture();

        $this->assertEmpty($enum->__toString());
        $this->assertNotEmpty($enum->listAllOptions());
    }

    public function testExceptionForNoDefinedDefaultValue(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionCode(1578410537);

        (new ExceptionEnumFixture())->__toString();
    }
}
