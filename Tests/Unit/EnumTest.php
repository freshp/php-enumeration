<?php

namespace FreshP\PhpEnumeration\Tests\Unit;

use FreshP\PhpEnumeration\Tests\Fixtures\EnumFixture;

/**
 * @package FreshP\PhpEnumeration\Tests\Unit
 */
class EnumTest extends \PHPUnit_Framework_TestCase
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
}
