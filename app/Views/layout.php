<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= esc($title ?? 'Todo App') ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Chart.js CDN -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

  <!--  Header -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
      <a class="navbar-brand" href="/">📝 Todo App</a>
    </div>
  </nav>

  <div class="container">
    <?= $this->renderSection('content') ?>
  </div>

<!-- Sticky Footer -->
<footer class="bg-white border-top py-3 text-center small text-muted mt-auto">
  <div class="container">
    Simple todo app built with ❤️ by <strong>Rameez Israr 🏇</strong>
  </div>
</footer>

</body>
</html>
