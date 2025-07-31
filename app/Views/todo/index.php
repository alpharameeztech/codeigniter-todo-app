<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h1 class="mb-4">📝 Todo List</h1>

<a href="/todo/create" class="btn btn-primary mb-3">+ Add Task</a>

<!-- 📊 Charts Row -->
<div class="row mb-5 text-center">
  <!-- Doughnut Chart -->
  <div class="col-md-4 mb-4 mb-md-0">
    <div class="card shadow-sm">
      <div class="card-body">
        <h6 class="card-title">Completion Stats</h6>
        <div style="position: relative; height: 300px;">
          <canvas id="doughnutChart"></canvas>
        </div>
      </div>
    </div>
  </div>

  <!-- Bar Chart -->
  <div class="col-md-4 mb-4 mb-md-0">
    <div class="card shadow-sm">
      <div class="card-body">
        <h6 class="card-title">Task Breakdown</h6>
        <div style="position: relative; height: 300px;">
          <canvas id="barChart"></canvas>
        </div>
      </div>
    </div>
  </div>

  <!-- Horizontal Bar Chart -->
  <div class="col-md-4">
    <div class="card shadow-sm">
      <div class="card-body">
        <h6 class="card-title">Overview</h6>
        <div style="position: relative; height: 300px;">
          <canvas id="horizontalChart"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Todo List Section -->
<?php if (!empty($todos)): ?>
  <ul class="list-group mb-4">
    <?php foreach ($todos as $todo): ?>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <div>
        <?= $todo['is_done'] ? '<s>' . esc($todo['task']) . '</s>' : esc($todo['task']) ?>
        <br>
        <small class="text-muted">
            Created <?= humanizeTime($todo['created_at']) ?>
        </small>
        </div>
        <div>
        <a href="/todo/edit/<?= $todo['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
        <a href="/todo/delete/<?= $todo['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this task?')">Delete</a>
        </div>
    </li>
    <?php endforeach; ?>
  </ul>

  <nav aria-label="Todo Pagination">
  <ul class="pagination justify-content-center">
    <?= $pager->links('default', 'custom_bootstrap') ?>
  </ul>
</nav>

<?php else: ?>
  <div class="alert alert-info">No tasks found.</div>
<?php endif; ?>

<!-- Chart JS Script -->
<script>
  const completed = <?= $completedCount ?>;
  const pending = <?= $pendingCount ?>;

  // Doughnut Chart
  new Chart(document.getElementById('doughnutChart'), {
    type: 'doughnut',
    data: {
      labels: ['Completed', 'Pending'],
      datasets: [{
        data: [completed, pending],
        backgroundColor: ['#28a745', '#ffc107']
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { position: 'bottom' }
      }
    }
  });

  // Bar Chart
  new Chart(document.getElementById('barChart'), {
    type: 'bar',
    data: {
      labels: ['Completed', 'Pending'],
      datasets: [{
        label: 'Tasks',
        data: [completed, pending],
        backgroundColor: ['#198754', '#fd7e14']
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: { beginAtZero: true }
      }
    }
  });

  // Horizontal Bar Chart
  new Chart(document.getElementById('horizontalChart'), {
    type: 'bar',
    data: {
      labels: ['Completed', 'Pending'],
      datasets: [{
        label: 'Todos',
        data: [completed, pending],
        backgroundColor: ['#0d6efd', '#dc3545']
      }]
    },
    options: {
      indexAxis: 'y',
      responsive: true,
      scales: {
        x: { beginAtZero: true }
      }
    }
  });
</script>


<?= $this->endSection() ?>
