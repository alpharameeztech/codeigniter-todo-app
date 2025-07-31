<?php

namespace App\Interfaces;

interface TodoInterface
{
    public function getPaginated(int $perPage = 10);
    public function countCompleted(): int;
    public function countPending(): int;
    public function find(int $id);
    public function create(array $data): bool;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
    public function getErrors(): array;
}
