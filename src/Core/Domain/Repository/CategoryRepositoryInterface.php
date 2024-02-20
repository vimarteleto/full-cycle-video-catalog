<?php

namespace Core\Domain\Repository;

use Core\Domain\Entity\Category;

interface CategoryRepositoryInterface
{
    public function insert(Category $category): Category;
    public function findById(Category $category): Category;
    public function findAll(string $filter, string $sort = 'DESC'): array;
    public function paginate(string $filter, string $sort = 'DESC', int $page = 1): array;
    public function update(Category $category): bool;
    public function delete(string $id): bool;
    public function toCategory(object $data): Category;
}
