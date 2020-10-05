<?php

declare(strict_types=1);

namespace FreshP\PhpEnumeration\Tests\Fixtures;

use FreshP\PhpEnumeration\Enum;
use RuntimeException;

/**
 * @method static self ENUM_OPTION()
 */
class ExceptionEnumFixture extends Enum
{
    public const ENUM_OPTION = 'secure';

    protected function getDefault(): string
    {
        throw new RuntimeException('could not find an available value', 1578410537);
    }
}
