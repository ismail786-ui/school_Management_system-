<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Staff Panel - Sidebar</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    body {
      margin: 0;
      padding: 0;
      overflow-x: hidden;
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
    }

    .topbar {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 60px;
      background-color: #0d6efd;
      color: white;
      display: flex;
      align-items: center;
      padding: 0 20px;
      z-index: 1050;
    }

    .sidebar {
      position: fixed;
      top: 60px;
      left: 0;
      width: 250px;
      height: calc(100% - 60px);
      background-color: #0d6efd;
      padding-top: 20px;
      transition: transform 0.3s ease;
      z-index: 1040;
    }

    .sidebar a {
      color: white;
      text-decoration: none;
      display: block;
      padding: 15px 20px;
    }

    .sidebar a:hover {
      background-color: #00d4ff;
      color: rgb(0, 0, 0);
    }

    .main {
      margin-left: 250px;
      padding: 80px 20px 20px 20px;
      transition: margin-left 0.3s ease;
    }

    .sidebar.collapsed {
      transform: translateX(-100%);
    }

    .main.collapsed {
      margin-left: 0;
    }

    @media (max-width: 768px) {
      .sidebar {
        transform: translateX(-100%);
      }

      .sidebar.show {
        transform: translateX(0);
      }

      .main {
        margin-left: 0 !important;
      }
    }

    .toggle-btn {
      background: none;
      border: none;
      color: white;
      font-size: 1.5rem;
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
<!-- PHP Section -->
<?php
include 'conn.php';

$search_term = isset($_GET['search_term']) ? trim($_GET['search_term']) : '';
$show_table = false;

$sql = "SELECT 
            ef.emp_Name,
            sm.sub_code,
            sm.sub_name,
            sm.sub_standard,
            sm.sub_sec
        FROM employee_form AS ef
        JOIN sub_master AS sm ON ef.id = sm.id";

if (!empty($search_term)) {
    $show_table = true;
    $safe_term = mysqli_real_escape_string($conn, $search_term);
    if (is_numeric($search_term)) {
        $sql .= " WHERE ef.id = '$safe_term'";
    } else {
        $sql .= " WHERE ef.emp_Name LIKE '%$safe_term%'";
    }

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    }
}
?>

<!-- Main Content -->
<div class="main" id="mainContent">
  <div class="container-fluid">
    
    <h2 class="text-center mb-3 mt-2 card-title ">Subject Details</h2>

    <!-- Search Form -->
    <form method="GET" class="d-flex justify-content-center flex-wrap gap-2 mt-2 ">
      
        <div class="col-auto">
          <input 
            type="text" 
            name="search_term" 
            class="form-control form-control-sm px-3 py-2" 
          style="max-width: 180px;" 
            placeholder="ID or Name" 
            value="<?= htmlspecialchars($search_term) ?>"
            required
          >
        </div>
        <div class="col-auto">
          <button 
            type="submit" 
            class="btn btn-primary btn-sm px-4 py-2">Search</button>
        </div>
      </div>
    </form>



    <!-- Table -->
    <?php if ($show_table): ?>
      <div class="table-responsive mt-4">
        <table class="table table-bordered table-hover text-center align-middle">
          <thead class="table-primary">
            <tr>
              <th>Employee Name</th>
              <th>Subject Name</th>
              <th>Standard</th>
              <th>Section</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['emp_Name']}</td>
                            <td>{$row['sub_name']}</td>
                            <td>{$row['sub_standard']}</td>
                            <td>{$row['sub_sec']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No results found</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Sidebar Toggle Script -->
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
