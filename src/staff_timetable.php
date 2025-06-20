<?php
include 'conn.php';

$search_term = isset($_GET['search']) ? trim($_GET['search']) : '';

// SQL query with JOIN to get staff_name from staff_timetable
$query = "SELECT timetable.*, staff_timetable.staff_name 
          FROM timetable 
          JOIN staff_timetable ON timetable.staff_id = staff_timetable.staff_id";

if ($search_term !== '') {
    $search_term = mysqli_real_escape_string($conn, $search_term);
    $query .= " WHERE timetable.staff_id = '$search_term'";
}

$query .= " ORDER BY FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'), starttime";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Staff Timetable</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
      overflow-x: hidden;
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
      background-color:#00d4ff;
      color:rgb(0,0,0);
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
        padding-top: 80px;
      }
    }

    .toggle-btn {
      background: none;
      border: none;
      color: white;
      font-size: 1.5rem;
    }

    .card-title {
      font-weight: bold;
    }

    h4 {
      border-bottom: 1px solid #ccc;
      padding-bottom: 5px;
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

<!-- Main Content -->
<div class="main" id="mainContent">
  <div class="container-fluid">
    <h2 class="mb-4 text-center">Staff Timetable</h2>

    <!-- Search Form -->
    <form method="GET" class="mb-4 col-lg-4">
      <div class="input-group mr-5">
        <input type="text" name="search" class="form-control rounded" placeholder="Enter Staff ID (e.g., ST101)" value="<?= htmlspecialchars($search_term) ?>">
        <button type="submit" class="btn btn-primary col-lg-4 mx-3 rounded">Search</button>
      </div>
    </form>

    <!-- Timetable Display -->
    <?php
    if (mysqli_num_rows($result) > 0) {
        $currentDay = '';
        while ($row = mysqli_fetch_assoc($result)) {
            if ($currentDay !== $row['day']) {
                if ($currentDay !== '') {
                    echo '</div>'; // close row
                }
                $currentDay = $row['day'];
                echo '<h4 class="mt-4">' . htmlspecialchars($currentDay) . '</h4>';
                echo '<div class="row">';
            }
            ?>
            <div class="col-lg-4 col-md-6 col-sm-12  mb-3">
              <div class="card shadow-sm h-100">
                <div class="card-body">
                  <h5>Staff Name: <?= htmlspecialchars($row['staff_name']) ?></h5>
                  <p class="card-text">
                    <strong>Subject:</strong> <?= htmlspecialchars($row['subject']) ?><br>
                    <strong>Class:</strong> <?= htmlspecialchars($row['clas']) ?><br>
                    <strong>Time:</strong> <?= htmlspecialchars($row['starttime']) ?> - <?= htmlspecialchars($row['endtime']) ?>
                  </p>
                </div>
              </div>
            </div>
            <?php
        }
        echo '</div>'; // close last row
    } else {
        echo '<div class="alert alert-warning text-center">No timetable found for this staff ID.</div>';
    }
    ?>
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
