<?php

namespace Tests\Unit\Domain\Validation;

use PHPUnit\Framework\TestCase;
use Core\Domain\Validation\Validation;
use Core\Domain\Exception\EntityValidationException;

class ValidationUnitTest extends TestCase
{
    public function testNotEmpty()
    {
        $this->expectException(EntityValidationException::class);
        $value = '';
        Validation::isNotEmpty($value);
    }

    public function testStrMaxLenght()
    {
        $this->expectException(EntityValidationException::class);
        $value = '123456';
        $lenght = 5;
        Validation::strMaxLenght($value, $lenght);
    }

    public function testStrMinLenght()
    {
        $this->expectException(EntityValidationException::class);
        $value = '123';
        $lenght = 5;
        Validation::strMinLenght($value, $lenght);
    }
}
