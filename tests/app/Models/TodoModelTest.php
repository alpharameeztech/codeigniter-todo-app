<?php

namespace Tests\App\Models;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\TodoModel;

class TodoModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $refresh = true;  // Rebuild database before each test
    protected $namespace = 'App';

    public function testCreateTodo()
    {
        $model = new TodoModel();
        $id = $model->insert(['task' => 'Unit Test Task']);
        $this->assertIsInt($id);
        $this->assertGreaterThan(0, $id);
    }

    public function testReadTodo()
    {
        $model = new TodoModel();
        $id = $model->insert(['task' => 'Read Test']);
        $task = $model->find($id);
        $this->assertEquals('Read Test', $task['task']);
    }

    public function testUpdateTodo()
    {
        $model = new TodoModel();
        $id = $model->insert(['task' => 'Before Update']);
        $model->update($id, ['task' => 'After Update']);

        $updated = $model->find($id);
        $this->assertEquals('After Update', $updated['task']);
    }

    public function testDeleteTodo()
    {
        $model = new TodoModel();
        $id = $model->insert(['task' => 'Delete Me']);
        $model->delete($id);
        $this->assertNull($model->find($id));
    }
}
