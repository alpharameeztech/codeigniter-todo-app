<?php

namespace App\Controllers;

use App\Models\TodoModel;
use CodeIgniter\Controller;

class Todo extends Controller
{
    public function index()
    {
        $model = new TodoModel();
        $data['todos'] = $model->orderBy('id', 'DESC')->findAll();
        return view('todo/index', $data);
    }

    public function create()
    {
        return view('todo/create');
    }

    public function store()
    {
        $model = new TodoModel();
        $model->save(['task' => $this->request->getPost('task')]);
        return redirect()->to('/todo')->with('message', 'Task added!');
    }

    public function edit($id)
    {
        $model = new TodoModel();
        $data['todo'] = $model->find($id);
        return view('todo/edit', $data);
    }

    public function update($id)
    {
        $model = new TodoModel();
        $model->update($id, [
            'task' => $this->request->getPost('task'),
            'is_done' => $this->request->getPost('is_done') ? 1 : 0,
        ]);
        return redirect()->to('/todo')->with('message', 'Task updated!');
    }

    public function delete($id)
    {
        $model = new TodoModel();
        $model->delete($id);
        return redirect()->to('/todo')->with('message', 'Task deleted!');
    }
}
