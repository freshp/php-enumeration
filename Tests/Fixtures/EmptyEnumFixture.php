<?php

namespace FreshP\PhpEnumeration\Tests\Fixtures;

use FreshP\PhpEnumeration\Enum;

class EmptyEnumFixture extends Enum
{
    private const ENUM_OPTION = 'secure';

    protected function getDefault(): string
    {
        return '';
    }

    public function listAllOptions(): array
    {
        return $this->toArray();
    }
}
