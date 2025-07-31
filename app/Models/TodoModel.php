<?php

namespace App\Models;

use CodeIgniter\Model;

class TodoModel extends Model
{
    protected $table      = 'todos';
    protected $primaryKey = 'id';

    protected $allowedFields = ['task', 'is_done'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'task' => 'required|min_length[3]|max_length[255]',
    ];

    protected $validationMessages = [
        'task' => [
            'required'   => 'Please enter a task.',
            'min_length' => 'Task must be at least 3 characters long.',
            'max_length' => 'Task cannot exceed 255 characters.',
        ],
    ];

    protected $skipValidation = false;
}
