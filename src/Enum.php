<?php

namespace FreshP\PhpEnumeration;

abstract class Enum
{
    protected $value;

    public function __construct(string $value = '')
    {
        $this->setValue($value);
    }

    public function __toString(): string
    {
        return $this->value;
    }


    abstract protected function getDefault(): string;

    protected function setValue(string $value): void
    {
        if (true === in_array($value, $this->toArray(), true)) {
            $this->value = $value;

            return;
        }

        $this->value = $this->getDefault();
    }

    protected function toArray(): array
    {
        $reflection = new \ReflectionClass($this);

        return $reflection->getConstants();
    }
}
