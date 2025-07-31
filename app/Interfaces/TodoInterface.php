<?php

namespace App\Interfaces;

interface TodoInterface
{
    public function getAll();
    public function create(array $data): bool;
    public function find(int $id);
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
    public function getStats(): array;
}
