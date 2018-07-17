<?php

namespace FreshP\PhpEnumeration\Tests\Unit;

use FreshP\PhpEnumeration\Tests\Fixtures\EmptyEnumFixture;
use FreshP\PhpEnumeration\Tests\Fixtures\EnumFixture;
use PHPUnit\Framework\TestCase;

class EnumTest extends TestCase
{
    public function testDefaultEnumHandling()
    {
        $enum = new EnumFixture();

        $this->assertEquals(EnumFixture::TEST_DEFAULT, $enum);
    }

    public function testDefaultEnumHandlingWithConstructorValue()
    {
        $enum = new EnumFixture('definitely not set value');

        $this->assertEquals(EnumFixture::TEST_DEFAULT, $enum);
    }

    public function testTypeErrorForUsingWrongDataType()
    {
        $this->expectException(\TypeError::class);

        new EnumFixture((new \stdClass));
    }

    public function testSuccessfulReturnValueForDefinedEnum()
    {
        $enum = new EnumFixture(EnumFixture::TEST_CONSTANT);

        $this->assertEquals(EnumFixture::TEST_CONSTANT, $enum);
    }

    public function testList()
    {
        $enum = new EnumFixture(EnumFixture::TEST_CONSTANT);

        $this->assertEquals([
            'TEST_CONSTANT' => 'constant',
            'TEST_DEFAULT' => 'default',
        ], $enum->listEnumerationOptions());
    }

    public function testReflectionException()
    {
        $enum = new EmptyEnumFixture();

        $this->assertEmpty($enum->__toString());
        $this->assertNotEmpty($enum->listEnumerationOptions());
    }
}
