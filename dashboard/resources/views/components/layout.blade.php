<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title ?? 'dashboard'}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
:root {
  --primary-color: #508bfc;
  --primary-color-light: #7ca9fc;
  --text-color: #ffffff;
  --bg-color: #f8f9fa;
}
body {
  display: flex;
  height: 100vh;
  margin: 0;
  background-color: var(--bg-color);
}
.sidebar {
  position: sticky; /* Make sidebar sticky */
  top: 0; /* Stick to the top of the viewport */
  height: 100vh; /* Full viewport height */
  overflow-y: auto; /* Enable vertical scrolling if content overflows */
  width: 250px;
  background: var(--primary-color);
  color: var(--text-color);
  transition: width 0.3s ease;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
.sidebar.collapsed {
  width: 70px;
}
.sidebar .nav-link {
  color: var(--text-color);
  padding: 12px 20px;
  display: flex;
  align-items: center;
  white-space: nowrap;
  transition: background-color 0.3s ease, color 0.3s ease;
}
.sidebar .nav-link i {
  font-size: 1.2rem;
  margin-right: 10px;
}
.sidebar.collapsed .nav-link i {
  margin-right: 0;
}
.sidebar .nav-link:hover,
.sidebar .nav-link.active {
  background-color: var(--primary-color-light);
}
.sidebar.collapsed .nav-link span {
  display: none;
}
.sidebar .toggle-btn {
  text-align: center;
  padding: 10px 0;
  cursor: pointer;
  border-bottom: 1px solid rgba(255, 255, 255, 0.2);
}
.sidebar .toggle-btn i {
  color: var(--text-color);
}
.sidebar.collapsed .toggle-icon {
  transform: rotate(180deg);
}
.content {
  flex-grow: 1;
  padding: 20px;
  background: var(--bg-color);
  overflow-y: auto; /* Ensure content area can scroll */
}
.tooltip-inner {
  background-color: var(--primary-color);
  color: var(--text-color);
  font-size: 0.875rem;
}
</style>

</head>
<body class="d-flex m-0 vh-100 ">
<nav class="sidebar d-flex flex-column">
    <div class="toggle-btn">
      <i class="bi bi-chevron-left toggle-icon"></i>
    </div>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a href="/admin/index" class="nav-link active" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard">
          <i class="bi bi-speedometer2"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="/admin/user" class="nav-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Users">
          <i class="bi bi-people"></i> <span>Users</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="/admin/company" class="nav-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Companies">
          <i class="bi bi-building"></i> <span>Companies</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Messages">
          <i class="bi bi-envelope"></i> <span>Messages</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Analytics">
          <i class="bi bi-bar-chart"></i> <span>Analytics</span>
        </a>
      </li>
   

      @if (Auth::user()->role == 'super admin')
      <li class="nav-item">
        <a href="#" class="nav-link " data-bs-toggle="tooltip" data-bs-placement="right" title="Settings">
          <i class="bi bi-gear"></i> <span>manage admin</span>
        </a>
      </li>
      @endif
      
    </ul>
    <div class="mt-auto p-3">
      <a href="/admin/logout" class="nav-link text-ligth bg-danger rounded-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Logout">
        <i class="bi bi-box-arrow-right"></i> <span>Logout</span>
      </a>
    </div>
  </nav>

  <!-- Content -->
  <div class="content">
    {{$slot}}
  </div>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
      const sidebar = document.querySelector('.sidebar');
      const toggleBtn = document.querySelector('.toggle-btn');
      const toggleIcon = document.querySelector('.toggle-icon');
      const tooltips = document.querySelectorAll('[data-bs-toggle="tooltip"]');

      // Enable tooltips
    

      // Toggle sidebar
      toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
        toggleIcon.classList.toggle('rotate');
      });
    });
  </script>
</body>
</html>