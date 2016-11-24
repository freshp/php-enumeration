<?php

namespace FreshP\PhpEnumeration\Tests\Fixtures;

use FreshP\PhpEnumeration\Enum;

/**
 * @package FreshP\PhpEnumeration\Tests\Fixtures
 */
class EnumFixture extends Enum
{
    const TEST_CONSTANT = 'constant';
    const TEST_DEFAULT = 'default';

    /**
     * @return string
     */
    protected function getDefault() : string
    {
        return self::TEST_DEFAULT;
    }
}
