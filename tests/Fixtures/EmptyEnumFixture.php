<?php

declare(strict_types=1);

namespace FreshP\PhpEnumeration\Tests\Fixtures;

use FreshP\PhpEnumeration\Enum;

class EmptyEnumFixture extends Enum
{
    private const ENUM_OPTION = 'secure';

    public static function listAllOptions(): array
    {
        return self::toArray();
    }

    protected function getDefault(): string
    {
        return '';
    }
}
