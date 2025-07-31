<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h1 class="mb-4">✏️ Edit Task</h1>

<?php if (isset($validation) && is_array($validation)): ?>
  <div class="alert alert-danger">
    <ul class="mb-0">
      <?php foreach ($validation as $error): ?>
        <li><?= esc($error) ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>
<form action="/todo/update/<?= $todo['id'] ?>" method="post">
  <div class="mb-3">
    <input type="text" name="task" class="form-control" value="<?= esc($todo['task']) ?>" required>
  </div>
  <div class="form-check mb-3">
    <input class="form-check-input" type="checkbox" name="is_done" value="1" <?= $todo['is_done'] ? 'checked' : '' ?>>
    <label class="form-check-label">Mark as done</label>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
  <a href="/todo" class="btn btn-secondary">Back</a>
</form>

<?= $this->endSection() ?>
