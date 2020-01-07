<?php

declare(strict_types=1);

namespace FreshP\PhpEnumeration\Tests\Fixtures;

use FreshP\PhpEnumeration\Enum;

/**
 * @method static EmptyEnumFixture ENUM_OPTION()
 */
class EmptyEnumFixture extends Enum
{
    private const ENUM_OPTION = 'secure';

    public function listAllOptions(): array
    {
        return $this->toArray();
    }

    protected function getDefault(): string
    {
        return '';
    }
}
