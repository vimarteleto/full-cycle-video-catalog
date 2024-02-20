<?php

namespace Core\Domain\Validation;

use Core\Domain\Exception\EntityValidationException;

class Validation
{
    public static function isNotEmpty(string $value): void
    {
        if (empty($value)) {
            throw new EntityValidationException();
        }
    }

    public static function strMaxLenght(?string $value, int $lenght): void
    {
        if (isset($value) && strlen($value) > $lenght) {
            throw new EntityValidationException();
        }
    }

    public static function strMinLenght(?string $value, int $lenght): void
    {
        if (isset($value) && strlen($value) < $lenght) {
            throw new EntityValidationException();
        }
    }
}
