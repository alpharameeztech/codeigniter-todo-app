<?php

namespace App\Services;

use App\Models\TodoModel;
use App\Interfaces\TodoInterface;

class TodoService implements TodoInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new TodoModel();
    }

    public function getAll()
    {
        return $this->model->orderBy('id', 'DESC')->findAll();
    }

    public function create(array $data): bool
    {
        return $this->model->save($data);
    }

    public function find(int $id)
    {
        return $this->model->find($id);
    }

    public function update(int $id, array $data): bool
    {
        $data['id'] = $id;
        return $this->model->save($data);
    }

    public function delete(int $id): bool
    {
        return $this->model->delete($id);
    }

    public function getStats(): array
    {
        return [
            'completed' => $this->model->where('is_done', 1)->countAllResults(),
            'pending'   => $this->model->where('is_done', 0)->countAllResults(),
        ];
    }

    public function getErrors(): array
    {
        return $this->model->errors() ?? [];
    }

}
