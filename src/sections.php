<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="../src./assets/images/ps.png" type="image/png">
    <link href="../src./assets/images/ps.png" rel="apple-touch-icon">
    <title>Sidebar</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
    }

    .sidebar {
      width: 250px;
      height: 100vh;
      background-color: #0d6efd;
      color: white;
      position: fixed;
      top: 0;
      left: 0;
      padding-top: 60px;
      transition: all 0.3s;
      z-index: 1040;
    }

    .sidebar a {
      color: white;
      display: block;
      padding: 15px 20px;
      text-decoration: none;
    }

    .sidebar a:hover {
      background-color:#00d4ff;
      color:rgb(0,0,0);
    }

    .sidebar.collapsed {
      width: 70px;
    }

    .sidebar.collapsed .nav-link-text {
      display: none;
    }

    .main {
      margin-left: 250px;
      padding: 20px;
      transition: all 0.3s;
    }

    .main.collapsed {
      margin-left: 70px;
    }

    .topbar {
      position: fixed;
      top: 0;
      left: 0;
      height: 60px;
      width: 100%;
      background-color: #0d6efd;
      color: white;
      display: flex;
      align-items: center;
      padding: 0 20px;
      z-index: 1050;
    }

    .toggle-btn {
      background: none;
      border: none;
      color: white;
      font-size: 1.5rem;
    }

    .searchtop {
      margin-top: 60px;
    }

    @media (max-width: 768px) {
      .sidebar {
        position: fixed;
        transform: translateX(-100%);
      }

      .sidebar.show {
        transform: translateX(0);
      }

      .main {
        margin-left: 0 !important;
      }
    }
  </style>
</head>
<body>

  <!-- Topbar -->
  <div class="topbar">
    <button class="toggle-btn me-3" onclick="toggleSidebar()">
      <i class="bi bi-list"></i>
    </button>
    <div><strong>Staff Panel</strong></div>
  </div>

  <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
    <a href="emp_d.php"><i class="bi bi-house-door me-2"></i> Dashboard</a>
    <a href="sections.php"><i class="bi bi-people me-2"></i> Sections</a>
    <a href="sub_staff1.php"><i class="bi bi-book me-2"></i> Subject</a>
    <a href="./staff_timetable.php"><i class="bi bi-calendar-week me-2"></i> Timetable</a>
    <a href="./staff_attendance.php"><i class="bi bi-bell me-2"></i>Attendance</a>
    <a href="./login.php"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
  </div>

  <?php
    include 'conn.php';

    $classData = [];

    if (isset($_GET['search_name']) && $_GET['search_name'] !== '') {
        $searchName = mysqli_real_escape_string($conn, $_GET['search_name']);
        $sql = "SELECT * FROM class_master WHERE class_name LIKE '%$searchName%'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $classData = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
    }
  ?>

  <!-- Main Content -->
  <div class="main" id="mainContent">
    <div class="container-fluid">
      <h2 class="text-center searchtop">Search Standard</h2>

      <!-- Search Form -->
      <form method="GET" class="d-flex justify-content-center flex-wrap gap-2 mt-3">
        <input 
          type="text" 
          name="search_name" 
          class="form-control form-control-sm px-3" 
          placeholder="Enter Class Name (e.g., First)" 
          style="max-width: 180px;" 
          required >
        <button type="submit" class="btn btn-primary btn-sm px-3 py-2">Search</button>
      </form>

      <!-- Table Result -->
      <?php if (!empty($classData)) { ?>
        <div class="table-responsive mt-4">
          <table class="table table-bordered table-striped text-center">
            <thead class="table-primary">
              <tr>
                <th>Class ID</th>
                <th>Class Name</th>
                <th>Class Section</th>
                <th>Class Teacher</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($classData as $row) { ?>
                <tr>
                  <td><?= $row['class_id'] ?></td>
                  <td><?= $row['class_name'] ?></td>
                  <td><?= $row['class_section'] ?></td>
                  <td><?= $row['class_teacher'] ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      <?php } elseif (isset($_GET['search_name'])) { ?>
        <div class="alert alert-danger text-center">
          No record found for class name "<strong><?= htmlspecialchars($_GET['search_name']) ?></strong>"
        </div>
      <?php } ?>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Toggle Sidebar Script -->
  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const main = document.getElementById('mainContent');

      if (window.innerWidth <= 768) {
        sidebar.classList.toggle('show');
      } else {
        sidebar.classList.toggle('collapsed');
        main.classList.toggle('collapsed');
      }
    }
  </script>
</body>
</html>
