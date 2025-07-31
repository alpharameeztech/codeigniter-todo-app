<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h1 class="mb-4">📝 Todo List</h1>

<a href="/todo/create" class="btn btn-primary mb-3">+ Add Task</a>

<?php if (session()->getFlashdata('message')): ?>
  <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
<?php endif; ?>

<?php if (!empty($todos)): ?>
  <ul class="list-group">
    <?php foreach ($todos as $todo): ?>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <div>
          <?= $todo['is_done'] ? '<s>' . esc($todo['task']) . '</s>' : esc($todo['task']) ?>
        </div>
        <div>
          <a href="/todo/edit/<?= $todo['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="/todo/delete/<?= $todo['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this task?')">Delete</a>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
<?php else: ?>
  <div class="alert alert-info">No tasks found. Add your first one!</div>
<?php endif; ?>

<?= $this->endSection() ?>
