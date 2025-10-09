<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MiApp - @yield('title', 'Dashboard')</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary: #0077B6;
      --primary-dark: #03045E;
      --secondary: #00B4D8;
      --accent: #90E0EF;
      --light-blue: #CAF0F8;
      --text: #333333;
      --text-light: #6c757d;
      --background: #f8f9fa;
      --white: #ffffff;
      --sidebar-width: 280px;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: var(--background);
      color: var(--text);
      padding-top: 60px;
      min-height: 100vh;
    }

    /* Top Navigation */
    .top-navbar {
      background: linear-gradient(90deg, var(--primary-dark) 0%, var(--primary) 100%);
      height: 60px;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1030;
      padding: 0 1rem;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
      font-weight: 800;
      font-size: 1.8rem;
      color: white !important;
      display: flex;
      align-items: center;
    }

    .navbar-brand img {
      margin-right: 10px;
    }

    .top-navbar .nav-link {
      color: rgba(255, 255, 255, 0.85) !important;
      font-weight: 600;
      padding: 0.5rem 1rem !important;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .top-navbar .nav-link:hover {
      background-color: rgba(255, 255, 255, 0.15);
      color: var(--white) !important;
    }

    /* Sidebar Navigation */
    .sidebar {
      position: fixed;
      top: 60px;
      left: 0;
      bottom: 0;
      width: var(--sidebar-width);
      background-color: var(--white);
      border-right: 1px solid #dee2e6;
      padding: 1.5rem 0;
      overflow-y: auto;
      z-index: 1020;
      transition: transform 0.3s ease;
    }

    .sidebar-header {
      padding: 0 1.5rem 1rem;
      border-bottom: 1px solid #dee2e6;
      margin-bottom: 1rem;
    }

    .sidebar-nav .nav-item {
      margin-bottom: 0.25rem;
    }

    .sidebar-nav .nav-link {
      color: var(--text);
      padding: 0.75rem 1.5rem;
      font-weight: 500;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
    }

    .sidebar-nav .nav-link i {
      margin-right: 10px;
      color: var(--primary);
      width: 24px;
      text-align: center;
    }

    .sidebar-nav .nav-link:hover {
      background-color: var(--light-blue);
      color: var(--primary-dark);
    }

    .sidebar-nav .nav-link.active {
      background-color: var(--primary);
      color: white;
    }

    .sidebar-nav .nav-link.active i {
      color: white;
    }

    .sidebar-section {
      padding: 1rem 1.5rem 0;
      margin-top: 1.5rem;
      border-top: 1px solid #dee2e6;
    }

    .sidebar-section-title {
      font-size: 0.9rem;
      text-transform: uppercase;
      font-weight: 700;
      color: var(--text-light);
      margin-bottom: 1rem;
    }

    /* Mobile Sidebar Overlay */
    .sidebar-overlay {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 1015;
      display: none;
    }

    .sidebar-overlay.active {
      display: block;
    }

    /* Main Content */
    .main-content {
      padding: 2rem;
      transition: margin-left 0.3s ease;
    }

    .welcome-banner {
      background: linear-gradient(120deg, var(--secondary) 0%, var(--primary) 100%);
      border-radius: 12px;
      padding: 2rem;
      color: white;
      margin-bottom: 2rem;
    }

    .welcome-title {
      font-weight: 700;
      font-size: 1.8rem;
      margin-bottom: 0.5rem;
    }

    .welcome-text {
      font-size: 1.1rem;
      opacity: 0.9;
      margin-bottom: 1.5rem;
    }

    .content-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 1.5rem;
      margin-bottom: 2rem;
    }

    .content-card {
      background-color: var(--white);
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .content-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .card-header {
      background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
      color: white;
      padding: 1rem 1.5rem;
      font-weight: 600;
    }

    .card-body {
      padding: 1.5rem;
    }

    .card-title {
      font-weight: 700;
      color: var(--primary-dark);
      margin-bottom: 0.5rem;
    }

    .card-text {
      color: var(--text-light);
      margin-bottom: 1rem;
    }

    .btn-primary {
      background-color: var(--primary);
      border-color: var(--primary);
      font-weight: 600;
    }

    .btn-primary:hover {
      background-color: var(--primary-dark);
      border-color: var(--primary-dark);
    }

    .btn-outline-primary {
      color: var(--primary);
      border-color: var(--primary);
      font-weight: 600;
    }

    .btn-outline-primary:hover {
      background-color: var(--primary);
      color: white;
    }

    /* Mobile Search */
    .mobile-search-container {
      display: none;
      padding: 1rem;
      background-color: var(--white);
      border-bottom: 1px solid #dee2e6;
    }

    /* Responsive */
    @media (min-width: 992px) {
      body {
        padding-left: var(--sidebar-width);
      }

      .navbar-toggler {
        display: none !important;
      }

      .mobile-search-container {
        display: none !important;
      }
    }

    @media (max-width: 991.98px) {
      body {
        padding-left: 0;
      }

      .sidebar {
        transform: translateX(-100%);
      }

      .sidebar.show {
        transform: translateX(0);
      }

      .navbar-toggler {
        display: block !important;
      }

      .top-navbar .navbar-collapse {
        display: none !important;
      }

      .mobile-search-container {
        display: block;
      }
    }
  </style>
</head>

<body>
  <!-- Top Navigation -->
  <nav class="navbar navbar-expand-lg top-navbar">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" id="sidebarToggle">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand" href="{{ route('dashboard') }}">
        <img src="{{ asset('images/LogoWorldAquatics.jpeg') }}" alt="Logo" height="30" class="d-inline-block align-top">
      </a>

      <div class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto ms-auto ">
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
              <i class="fas fa-home me-1"></i> Inicio
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin') ? 'active' : '' }}" href="{{ route('admin') }}">
              <i class="fas fa-users me-1"></i> Administrar Usuarios
            </a>
          </li>        
        </ul>

        <button class="btn btn-outline-light ms-2 d-none d-lg-block" id="refreshButton">
          <i class="fas fa-sync-alt"></i> Actualizar
        </button>
      </div>
    </div>
  </nav>

  <!-- Sidebar Overlay -->
  <div class="sidebar-overlay" id="sidebarOverlay"></div>

  <!-- Sidebar Navigation -->
  <div class="sidebar" id="sidebar">
    <div class="sidebar-header">
      <h5>Navegación principal</h5>
    </div>

    <nav class="sidebar-nav">
      <div class="nav-item">
        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
          <i class="fas fa-home"></i> Inicio
        </a>
      </div>
      <div class="nav-item">
        <a class="nav-link {{ request()->routeIs('descubre') ? 'active' : '' }}" href="{{ route('descubre') }}">
          <i class="fas fa-compass"></i> Descubre
        </a>
      </div>
      <div class="nav-item">
        <a class="nav-link {{ request()->routeIs('biblioteca') ? 'active' : '' }}" href="{{ route('biblioteca') }}">
          <i class="fas fa-book"></i> Biblioteca
        </a>
      </div>
      <div class="nav-item">
        <a class="nav-link {{ request()->routeIs('informes') ? 'active' : '' }}" href="{{ route('informes') }}">
          <i class="fas fa-chart-bar"></i> Informes
        </a>
      </div>
      <div class="nav-item">
        <a class="nav-link {{ request()->routeIs('grupos') ? 'active' : '' }}" href="{{ route('grupos') }}">
          <i class="fas fa-users"></i> Grupos
        </a>
      </div>
      <div class="nav-item">
        <a class="nav-link {{ request()->routeIs('idiomas') ? 'active' : '' }}" href="{{ route('idiomas') }}">
          <i class="fas fa-language"></i> Aprendizaje de idiomas
        </a>
      </div>
      <div class="nav-item">
        <a class="nav-link {{ request()->routeIs('marketplace') ? 'active' : '' }}" href="{{ route('marketplace') }}">
          <i class="fas fa-store"></i> Marketplace
        </a>
      </div>
      <div class="nav-item">
        <a class="nav-link {{ request()->routeIs('password') ? 'active' : '' }}" href="{{ route('password') }}">
          <i class="fas fa-key"></i> Password
        </a>
      </div>
    </nav>

    <div class="sidebar-section">
      <div class="sidebar-section-title">¿Qué hay de nuevo?</div>
      <nav class="sidebar-nav">
        <div class="nav-item">
          <a class="nav-link {{ request()->routeIs('otras-apps') ? 'active' : '' }}" href="{{ route('otras-apps') }}">
            <i class="fas fa-mobile-alt"></i> Otras apps de MiApp!
          </a>
        </div>
        <div class="nav-item">
          <a class="nav-link {{ request()->routeIs('ayuda') ? 'active' : '' }}" href="{{ route('ayuda') }}">
            <i class="fas fa-question-circle"></i> Ayuda
          </a>
        </div>
      </nav>
    </div>
  </div>

  <!-- Main Content -->
  <div class="main-content" id="mainContent">
    @yield('content')
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Configurar menú móvil
    document.addEventListener('DOMContentLoaded', function() {
      const sidebar = document.getElementById('sidebar');
      const sidebarToggle = document.getElementById('sidebarToggle');
      const sidebarOverlay = document.getElementById('sidebarOverlay');

      sidebarToggle.addEventListener('click', function() {
        sidebar.classList.toggle('show');
        sidebarOverlay.classList.toggle('active');
      });

      sidebarOverlay.addEventListener('click', function() {
        sidebar.classList.remove('show');
        sidebarOverlay.classList.remove('active');
      });
    });
  </script>
</body>

</html>