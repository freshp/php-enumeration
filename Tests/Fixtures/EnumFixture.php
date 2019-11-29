<?php

declare(strict_types=1);

namespace FreshP\PhpEnumeration\Tests\Fixtures;

use FreshP\PhpEnumeration\Enum;

class EnumFixture extends Enum
{
    public const TEST_CONSTANT = 'constant';
    public const TEST_DEFAULT = 'default';

    protected function getDefault(): string
    {
        return self::TEST_DEFAULT;
    }
}
