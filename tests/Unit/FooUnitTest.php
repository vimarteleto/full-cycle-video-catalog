<?php

namespace Tests\Unit;

use Core\Foo;
use PHPUnit\Framework\TestCase;

class FooUnitTest extends TestCase
{
    public function testCallMethodFoo()
    {
        $teste = new Foo();
        $response = $teste->bar();

        $this->assertEquals('123', $response);
    }
}
