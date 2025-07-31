<?php

namespace App\Services;

use App\Interfaces\TodoInterface;
use App\Models\TodoModel;

class TodoService implements TodoInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new TodoModel();
    }

    public function getPaginated(int $perPage = 10)
    {
        return [
            'todos' => $this->model->orderBy('id', 'DESC')->paginate($perPage),
            'pager' => $this->model->pager,
        ];
    }

    public function countCompleted(): int
    {
        return $this->model->where('is_done', 1)->countAllResults();
    }

    public function countPending(): int
    {
        return $this->model->where('is_done', 0)->countAllResults();
    }

    public function find(int $id)
    {
        return $this->model->find($id);
    }

    public function create(array $data): bool
    {
        if (!$this->model->save($data)) {
            return false;
        }

        return true;
    }

    public function update(int $id, array $data): bool
    {
        if (!$this->model->update($id, $data)) {
            return false;
        }

        return true;
    }

    public function delete(int $id): bool
    {
        return $this->model->delete($id);
    }

    public function getErrors(): array
    {
        return $this->model->errors();
    }
}
