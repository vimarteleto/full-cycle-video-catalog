<?php

namespace Tests\Unit\Domain\Entity;

use PHPUnit\Framework\TestCase;
use Core\Domain\Entity\Category;
use Core\Domain\ValueObject\Uuid;
use Core\Domain\Exception\EntityValidationException;

class CategoryUnitTest extends TestCase
{
    public function testAttibutes()
    {
        $category = new Category(
            name: 'New category',
            description: 'New description',
            isActive: true
        );
        $this->assertNotEmpty($category->id());
        $this->assertNotEmpty($category->createdAt());
        $this->assertEquals('New category', $category->name);
        $this->assertEquals('New description', $category->description);
        $this->assertTrue($category->isActive);
    }

    public function testActived()
    {
        $category = new Category(
            name: 'New category',
            isActive: false
        );

        $this->assertFalse($category->isActive);
        $category->activate();
        $this->assertTrue($category->isActive);
    }

    public function testDisabled()
    {
        $category = new Category(
            name: 'New category',
        );

        $this->assertTrue($category->isActive);
        $category->disable();
        $this->assertFalse($category->isActive);
    }

    public function testUpdated()
    {
        $category = new Category(
            id: Uuid::generate(),
            name: 'New category',
            description: 'New description',
        );

        $category->update(
            name: 'Updated name',
            description: 'Updated description'
        );

        $this->assertEquals('Updated name', $category->name);
        $this->assertEquals('Updated description', $category->description);
    }

    public function testExceptionEmptyName()
    {
        $this->expectException(EntityValidationException::class);
        $category = new Category(
            name: 'New category',
        );
        $category->update('');
    }

    public function testExceptionShorterName()
    {
        $this->expectException(EntityValidationException::class);
        new Category(
            name: $this->generateRandomString(2)
        );
    }

    public function testExceptionLongerName()
    {
        $this->expectException(EntityValidationException::class);
        new Category(
            name: $this->generateRandomString(256)
        );
    }

    public function testExceptionLongerDescription()
    {
        $this->expectException(EntityValidationException::class);
        new Category(
            name: $this->generateRandomString(256)
        );
    }

    private function generateRandomString(int $length)
    {
        $characters = "a";
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
    }
}
