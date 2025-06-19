<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $staff_id = $_POST['staff_id'];
    $status = $_POST['status'];
    $date = date('Y-m-d');

    $check = mysqli_query($conn, "SELECT * FROM staff_attendance WHERE staff_id='$staff_id' AND date='$date'");
    if (mysqli_num_rows($check) == 0) {
        $query = "INSERT INTO staff_attendance (staff_id, date, status) VALUES ('$staff_id', '$date', '$status')";
        mysqli_query($conn, $query);
        $msg = "Attendance marked successfully!";
    } else {
        $msg = "Already marked for today.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Mark Staff Attendance</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
    }

    .topbar {
      height: 60px;
      background-color: #0d6efd;
      color: white;
      display: flex;
      align-items: center;
      padding: 0 20px;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 1050;
    }

    .sidebar {
      width: 250px;
      background-color: #0d6efd;
      color: white;
      height: 100vh;
      position: fixed;
      top: 60px;
      left: 0;
      padding-top: 20px;
      transition: transform 0.3s ease;
      z-index: 1040;
    }

    .sidebar a {
      color: white;
      display: block;
      padding: 15px 20px;
      text-decoration: none;
    }

    .sidebar a:hover {
      background-color: #0b5ed7;
    }

    .sidebar.collapsed {
      transform: translateX(-100%);
    }

    .main {
      margin-left: 250px;
      padding: 80px 20px;
      transition: margin-left 0.3s ease;
    }

    .main.full {
      margin-left: 0;
    }

    .toggle-btn {
      background: none;
      border: none;
      color: white;
      font-size: 1.5rem;
    }

    /* Compact input */
    input.form-control-sm,
    select.form-select-sm {
      font-size: 12px;
      padding: 2px 6px !important;
      height: 28px !important;
    }

    /* Remove blue focus border */
    .form-control:focus,
    .form-select:focus {
      border-color: black !important;
      box-shadow: none !important;
    }

    .card-compact {
      width: 100%;
      max-width: 320px;
      padding: 10px;
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
  <a href="#"><i class="bi bi-house-door me-2"></i> Dashboard</a>
  <a href="sections.php"><i class="bi bi-people me-2"></i> Sections</a>
  <a href="sub_staff1.php"><i class="bi bi-book me-2"></i> Subject</a>
  <a href="staff_timetable.php"><i class="bi bi-calendar-week me-2"></i> Timetable</a>
  <a href="#"><i class="bi bi-bell me-2"></i> Staff Form</a>
  <a href="login.php"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
</div>

<!-- Main Content -->
<div class="main" id="mainContent">
  <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card card-compact shadow-sm">
      <div class="card-body">
        <h6 class="card-title text-center mb-2">Mark Attendance</h6>

       <?php if (isset($msg)) echo "<div class='fs-5 text-center fw-semibold bg-danger text-white mb-2'>$msg</div>"; ?>


        <form method="POST" class="needs-validation" novalidate>
          <div class="mb-2">
            <label for="staff_id" class="form-label mb-1 small">Staff ID</label>
            <input type="text" name="staff_id" id="staff_id" class="form-control form-control-sm border border-dark" required>
            <div class="invalid-feedback">Please enter Staff ID.</div>
          </div>

          <div class="mb-2">
            <label for="status" class="form-label mb-1 small">Status</label>
            <select name="status" id="status" class="form-select form-select-sm border border-dark" required>
              <option value="">Select</option>
              <option>Present</option>
              <option>Absent</option>
              <option>Leave</option>
            </select>
            <div class="invalid-feedback">Please select status.</div>
          </div>

          <div class="text-center mt-3">
            <button type="submit" class="btn btn-sm btn-primary px-3 py-2">Mark</button>
            <button type="submit" class="btn btn-sm btn-success px-3 py-2 "><a href="./staff_attendanceview.php" class='text-white'style="text-decoration:none">View</a></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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

  // Bootstrap validation
  (() => {
    'use strict';
    const forms = document.querySelectorAll('.needs-validation');
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  })();
</script>
</body>
</html>
