<?php

namespace Core\Domain\ValueObject;

use InvalidArgumentException;

class Uuid
{
    public function __construct(
        protected readonly string $uuid
    ) {
        $this->validate();
    }

    public static function generate(): self
    {
        return new self(\Ramsey\Uuid\Uuid::uuid4());
    }

    private function validate()
    {
        if (!\Ramsey\Uuid\Uuid::isValid($this->uuid)) {
            throw new InvalidArgumentException();
        }
    }

    public function __toString()
    {
        return $this->uuid;
    }
}
