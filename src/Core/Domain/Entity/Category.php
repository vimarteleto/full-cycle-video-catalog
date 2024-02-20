<?php

namespace Core\Domain\Entity;

use DateTime;
use Core\Domain\ValueObject\Uuid;
use Core\Domain\Validation\Validation;
use Core\Domain\Entity\Traits\MagicMethodsTrait;

class Category
{
    use MagicMethodsTrait;

    public function __construct(
        private Uuid|string $id = '',
        protected string $name = '',
        protected ?string $description = null,
        protected bool $isActive = true,
        private DateTime|string $createdAt = '',
    ) {
        $this->id = $this->id ? new Uuid($this->id) : Uuid::generate();
        $this->createdAt = $this->createdAt ? new DateTime($this->createdAt) : new DateTime();
        $this->validate();
    }

    public function activate(): void
    {
        $this->isActive = true;
    }

    public function disable(): void
    {
        $this->isActive = false;
    }

    public function update(string $name, ?string $description = null): void
    {
        $this->name = $name;
        if ($description) {
            $this->description = $description;
        }
        $this->validate();
    }

    public function validate()
    {
        Validation::isNotEmpty($this->name);
        Validation::strMinLenght($this->name, 3);
        Validation::strMaxLenght($this->name, 255);
        Validation::strMaxLenght($this->description, 255);
    }
}
