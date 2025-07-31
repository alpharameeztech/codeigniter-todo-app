<?php

namespace App\Controllers;

use App\Models\TodoModel;
use CodeIgniter\Controller;

class Todo extends Controller
{
    public function __construct()
    {
        helper(['time']);
    }
    public function index()
    {
        $model = new TodoModel();

        $todos = $model->orderBy('id', 'DESC')->findAll();
        $completedCount = $model->where('is_done', 1)->countAllResults();
        $pendingCount   = $model->where('is_done', 0)->countAllResults();

        return view('todo/index', compact('todos', 'completedCount', 'pendingCount'));
    }

    public function create()
    {
        return view('todo/create');
    }

    public function store()
    {
        helper(['form']);
        $model = new TodoModel();

        $data = ['task' => $this->request->getPost('task')];

        if (!$model->save($data)) {
            return view('todo/create', [
                'validation' => $model->errors()
            ]);
        }

        return redirect()->to('/todo')->with('message', 'Task added!');
    }

    public function edit($id)
    {
        $model = new TodoModel();
        $todo = $model->find($id);

        if (!$todo) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Task with ID $id not found.");
        }

        return view('todo/edit', ['todo' => $todo]);
    }

    public function update($id)
    {
        $model = new TodoModel();

        $data = [
            'id'       => $id,
            'task'     => $this->request->getPost('task'),
            'is_done'  => $this->request->getPost('is_done') ? 1 : 0,
        ];

        if (!$model->save($data)) {
            return view('todo/edit', [
                'todo'       => $model->find($id),
                'validation' => $model->errors(),
            ]);
        }

        return redirect()->to('/todo')->with('message', 'Task updated!');
    }

    public function delete($id)
    {
        $model = new TodoModel();
        $model->delete($id);
        return redirect()->to('/todo')->with('message', 'Task deleted!');
    }
}
