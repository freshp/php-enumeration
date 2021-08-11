<?php

declare(strict_types=1);

namespace FreshP\PhpEnumeration;

use ReflectionClass;

abstract class Enum
{
    protected string $value;

    final public function __construct(string $value = '')
    {
        $this->setValue($value);
    }

    protected function setValue(string $value): void
    {
        if (true === in_array($value, self::toArray(), true)) {
            $this->value = $value;

            return;
        }

        $this->value = $this->getDefault();
    }

    protected static function toArray(): array
    {
        return self::getAllConstants();
    }

    private static function getAllConstants(): array
    {
        return (new ReflectionClass(static::class))->getConstants();
    }

    abstract protected function getDefault(): string;

    final public static function __callStatic(string $name, array $arguments): self
    {
        return new static(self::getAllConstants()[$name] ?? '');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
