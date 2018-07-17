<?php

namespace FreshP\PhpEnumeration\Tests\Fixtures;

use FreshP\PhpEnumeration\Enum;

class EnumFixture extends Enum
{
    const TEST_CONSTANT = 'constant';
    const TEST_DEFAULT = 'default';

    protected function getDefault(): string
    {
        return self::TEST_DEFAULT;
    }
}
