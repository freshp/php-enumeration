<?php

namespace FreshP\PhpEnumeration;

/**
 * @package FreshP\PhpEnumeration
 */
abstract class Enum
{
    /**
     * @var string
     */
    protected $value;

    /**
     * @param string $value
     */
    public function __construct(string $value = '')
    {
        $this->setValue($value);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }

    /**
     * @return string
     */
    abstract protected function getDefault(): string;

    /**
     * @param string $value
     *
     * @return void
     */
    protected function setValue(string $value)
    {
        if (in_array($value, $this->toArray(), true)) {
            $this->value = $value;

            return;
        }

        $this->value = $this->getDefault();
    }

    /**
     * @return array
     */
    protected function toArray(): array
    {
        $reflection = new \ReflectionClass($this);

        return $reflection->getConstants();
    }
}
