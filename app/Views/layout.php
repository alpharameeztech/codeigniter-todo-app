<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= esc($title ?? 'Todo App') ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Chart.js CDN -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body id="theme-body" class="d-flex flex-column min-vh-100 bg-light text-dark">

  <!-- Header -->
  <nav id="main-navbar" class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
    <a class="navbar-brand" id="navbar-brand" href="/">📝 Todo App</a>
      <button id="theme-toggle" class="btn btn-outline-light btn-sm ms-auto">
        🌙 Dark Mode
      </button>
    </div>
  </nav>

  <div class="container flex-grow-1">
    <?= $this->renderSection('content') ?>
  </div>

  <!-- Sticky Footer -->
  <footer id="main-footer" class="border-top py-3 text-center small mt-auto bg-light text-muted">
    <div class="container">
      Simple todo app built with ❤️ by <strong>Rameez Israr 🏇</strong>
    </div>
  </footer>

  <script>
  const toggleBtn = document.getElementById('theme-toggle');
  const body = document.getElementById('theme-body');
  const navbar = document.getElementById('main-navbar');
  const footer = document.getElementById('main-footer');
  const brand = document.getElementById('navbar-brand');

  // Apply saved theme on load
  const savedTheme = localStorage.getItem('theme');
  if (savedTheme === 'dark') {
    setDarkMode();
  }

  toggleBtn.addEventListener('click', () => {
    const isDark = body.classList.contains('bg-dark');
    isDark ? setLightMode() : setDarkMode();
  });

  function setDarkMode() {
    body.classList.remove('bg-light', 'text-dark');
    body.classList.add('bg-dark', 'text-light');

    navbar.classList.remove('navbar-dark', 'bg-primary');
    navbar.classList.add('navbar-light', 'bg-dark');

    brand.classList.remove('text-dark');
    brand.classList.add('text-light');

    footer.classList.remove('bg-light', 'text-muted');
    footer.classList.add('bg-dark', 'text-light');

    toggleBtn.textContent = '☀️ Light Mode';
    localStorage.setItem('theme', 'dark');
  }

  function setLightMode() {
    body.classList.remove('bg-dark', 'text-light');
    body.classList.add('bg-light', 'text-dark');

    navbar.classList.remove('navbar-light', 'bg-dark');
    navbar.classList.add('navbar-dark', 'bg-primary');

    brand.classList.remove('text-light');
    brand.classList.add('text-dark');

    footer.classList.remove('bg-dark', 'text-light');
    footer.classList.add('bg-light', 'text-muted');

    toggleBtn.textContent = '🌙 Dark Mode';
    localStorage.setItem('theme', 'light');
  }
</script>

</body>
</html>
