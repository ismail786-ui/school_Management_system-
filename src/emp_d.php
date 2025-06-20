<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Responsive Staff Panel</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
    }

    .sidebar {
      width: 250px;
      background-color: #0d6efd;
      color: white;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      padding-top: 60px;
      transition: 0.3s;
    }

    .sidebar a {
      color: white;
      display: block;
      padding: 15px 20px;
      text-decoration: none;
    }

    .sidebar a:hover {
      background-color: #00d4ff;
      color:rgb(0,0,0);
    }

    .sidebar.collapsed {
      transform: translateX(-100%);
    }

    .main {
      margin-left: 250px;
      padding: 20px;
      transition: margin-left 0.3s;
    }

    .main.full {
      margin-left: 0;
    }

    .topbar {
      height: 60px;
      width: 100%;
      background-color: #0d6efd;
      color: white;
      display: flex;
      align-items: center;
      padding: 0 20px;
      position: fixed;
      top: 0;
      left: 0;
      z-index: 1050;
    }

    .toggle-btn {
      background: none;
      border: none;
      color: white;
      font-size: 1.5rem;
    }

    @media (max-width: 768px) {
      .sidebar {
        transform: translateX(-100%);
      }

      .sidebar.show {
        transform: translateX(0);
        z-index: 1040;
      }

      .main {
        margin-left: 0;
      }
    }
  </style>
</head>
<body>

  <!-- Topbar -->
  <div class="topbar">
    <button class="toggle-btn me-3" onclick="toggleSidebar()"><i class="bi bi-list"></i></button>
    <div><strong>Staff Panel</strong></div>
  </div>

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <a href="emp_d.php"><i class="bi bi-house-door me-2"></i> Dashboard</a>
    <a href="sections.php"><i class="bi bi-people me-2"></i> Sections</a>
    <a href="sub_staff1.php"><i class="bi bi-book me-2"></i> Subject</a>
    <a href="./staff_timetable.php"><i class="bi bi-calendar-week me-2"></i> Timetable</a>
    <a href="./staff_attendance.php"><i class="bi bi-bell me-2"></i>Attendance</a>
    <a href="login.php"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
  </div>

  <!-- Main Content -->
  <div class="main pt-5" id="mainContent">
    <div class="container-fluid pt-4">
      <div class="row g-4 mt-3">
        <div class="col-sm-12 col-md-6 col-lg-4">
          <div class="card text-bg-primary p-3">
            <div class="card-body">
              <h5 class="card-title">7 Classes</h5>
              <p class="card-text">Assigned to you</p>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
          <div class="card text-bg-success p-3">
            <div class="card-body">
              <h5 class="card-title">132 Students</h5>
              <p class="card-text">Currently under your guidance</p>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
          <div class="card text-bg-warning p-3 text-dark">
            <div class="card-body">
              <h5 class="card-title">96% Attendance</h5>
              <p class="card-text">Overall class attendance</p>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-5">
        <h4>Notices</h4>
        <ul>
          <li>Workshop on 20th June</li>
          <li>Monthly Reports due 25th June</li>
          <li>Parent-Teacher Meeting on 30th June</li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->

  <!-- Toggle Script -->
  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById("sidebar");
      const main = document.getElementById("mainContent");

      if (window.innerWidth <= 768) {
        sidebar.classList.toggle("show");
      } else {
        sidebar.classList.toggle("collapsed");
        main.classList.toggle("full");
      }
    }
  </script>
</body>
</html>
