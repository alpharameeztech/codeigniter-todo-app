<?php

namespace App\Controllers;

use App\Services\TodoService;
use CodeIgniter\Controller;
use App\Models\TodoModel;

class Todo extends Controller
{
    protected $todo;

    public function __construct()
    {
        helper(['form', 'time']);
        $this->todo = new TodoService();
    }

    public function index()
        {
            $model = new TodoModel();

            $data = [
                'todos'          => $model->orderBy('id', 'DESC')->paginate(10),
                'pager'          => $model->pager,
                'completedCount' => $model->where('is_done', 1)->countAllResults(),
                'pendingCount'   => $model->where('is_done', 0)->countAllResults(),
            ];

            return view('todo/index', $data);
        }

    public function create()
    {
        return view('todo/create');
    }

    public function store()
    {
        $data = ['task' => $this->request->getPost('task')];

        if (!$this->todo->create($data)) {
            return view('todo/create', [
                'validation' => $this->todo->getErrors()
            ]);
        }

        return redirect()->to('/todo')->with('message', 'Task added!');
    }

    public function edit($id)
    {
        return view('todo/edit', [
            'todo' => $this->todo->find($id),
        ]);
    }

    public function update($id)
    {
        $data = [
            'task' => $this->request->getPost('task'),
            'is_done' => $this->request->getPost('is_done') ? 1 : 0,
        ];

        if (!$this->todo->update($id, $data)) {
            return view('todo/edit', [
                'todo' => $this->todo->find($id),
                'validation' => (new \App\Models\TodoModel())->errors(),
            ]);
        }

        return redirect()->to('/todo')->with('message', 'Task updated!');
    }

    public function delete($id)
    {
        $this->todo->delete($id);
        return redirect()->to('/todo')->with('message', 'Task deleted!');
    }
}
