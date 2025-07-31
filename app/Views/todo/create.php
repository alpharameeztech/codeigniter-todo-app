<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h1 class="mb-4">➕ Add New Task</h1>

<form action="/todo/store" method="post">
  <div class="mb-3">
    <input type="text" name="task" class="form-control" placeholder="Enter task..." required>
  </div>
  <button type="submit" class="btn btn-success">Save</button>
  <a href="/todo" class="btn btn-secondary">Back</a>
</form>

<?= $this->endSection() ?>
