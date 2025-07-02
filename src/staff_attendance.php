<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $date = $_POST['attendance_date'] ?? date('Y-m-d');
  $teachers = $_POST['staff'];

  foreach ($teachers as $teacher) {
    if (!isset($teacher['attendance'])) continue;

    $staff_id = $teacher['id'];
    $staff_name = $teacher['name'];
    $status = is_array($teacher['attendance']) ? $teacher['attendance'][0] : $teacher['attendance'];

    $check = mysqli_query($conn, "SELECT * FROM teacher_attendance WHERE staff_id='$staff_id' AND date='$date'");
    if (mysqli_num_rows($check) == 0) {
      $sql = "INSERT INTO teacher_attendance (staff_id, staff_name, date, status)
              VALUES ('$staff_id', '$staff_name', '$date', '$status')";
      mysqli_query($conn, $sql);
    }
  }

  echo "<script>alert('Attendance saved successfully!'); window.location='staff_attendanceAV.php';</script>";
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
    * {
  box-sizing: border-box;
}
html, body {
  margin: 0;
  padding: 0;
  overflow-x: hidden;
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
  background-color: #00d4ff;
  color: rgb(0, 0, 0);
}

.sidebar.collapsed {
  transform: translateX(-100%);
}

/* Content wrapper with sidebar space */
.main-content {
  margin-left: 250px;
  padding: 80px 20px 20px;
  transition: margin-left 0.3s ease;
}

/* When sidebar is collapsed */
.sidebar.collapsed + .main-content {
  margin-left: 0;
}

.toggle-btn {
  background: none;
  border: none;
  color: white;
  font-size: 1.5rem;
}

.form-control:focus,
.form-select:focus {
  border-color: black !important;
  box-shadow: none !important;
}

@media (max-width: 768px) {
  .sidebar {
    transform: translateX(-100%);
  }

  .sidebar.show {
    transform: translateX(0);
  }

  .main-content {
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
  <a href="emp_d.php"><i class="bi bi-house-door me-2"></i> Dashboard</a>
  <a href="sections.php"><i class="bi bi-people me-2"></i> Sections</a>
  <a href="sub_staff1.php"><i class="bi bi-book me-2"></i> Subject</a>
  <a href="./staff_timetable.php"><i class="bi bi-calendar-week me-2"></i> Timetable</a>
  <a href="./staff_attendance.php"><i class="bi bi-bell me-2"></i> Attendance</a>
  <a href="./login.php"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
</div>

<!-- Centered Content -->
 <!-- Main Content Wrapper -->
<div class="main-content">
  <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="card col-12 col-md-7 p-4 shadow">
    <h3 class="mb-4 text-center text-primary">Mark Teacher Attendance</h3>

    <!-- Search Form -->
    <form method="GET" action="">
      <div class="row mb-3">
        <div class="col-md-3">
          <label for="search" class="form-label">ID or Name:</label>
          <input type="text" name="search" id="search" class="form-control" placeholder="e.g. 101" required value="<?= $_GET['search'] ?? '' ?>">
        </div>
        <div class="col-md-3 d-flex align-items-end">
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
      </div>
    </form>

    <?php
    if (!$_POST && isset($_GET['search'])) {
      $search = mysqli_real_escape_string($conn, $_GET['search']);
      $result = $conn->query("SELECT * FROM employee_form WHERE id LIKE '$search' OR emp_Name LIKE '$search'");

      if ($result->num_rows > 0) {
    ?>

    <!-- Attendance Form -->
    <form method="POST" action="">
      <input type="hidden" name="attendance_date" value="<?= date('Y-m-d') ?>">

      <div class="mb-3">
        <label class="form-label fw-bold">Date:</label>
        <input type="date" name="attendance_date" class="form-control w-25" value="<?= date('Y-m-d') ?>" readonly>
      </div>

      <div class="table-responsive mb-3">
        <table class="table table-bordered text-center">
          <thead class="table-info">
            <tr>
              <th>Staff Name</th>
              <th>Present</th>
              <th>Absent</th>
              <th>OT</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 0; while ($row = $result->fetch_assoc()) { ?>
            <tr>
              <td class="text-start">
                <input type="hidden" name="staff[<?= $i ?>][id]" value="<?= $row['id'] ?>">
                <input type="hidden" name="staff[<?= $i ?>][name]" value="<?= htmlspecialchars($row['emp_Name']) ?>">
                <?= htmlspecialchars($row['emp_Name']) ?>
              </td>
              <td><input type="checkbox" name="staff[<?= $i ?>][attendance][]" value="Present" class="form-check-input attendance-checkbox" checked data-index="<?= $i ?>"></td>
              <td><input type="checkbox" name="staff[<?= $i ?>][attendance][]" value="Absent" class="form-check-input attendance-checkbox" data-index="<?= $i ?>"></td>
              <td><input type="checkbox" name="staff[<?= $i ?>][attendance][]" value="OT" class="form-check-input attendance-checkbox" data-index="<?= $i ?>"></td>
            </tr>
            <?php $i++; } ?>
          </tbody>
        </table>
      </div>

      <div class="d-flex justify-content-center gap-2">
        <button type="submit" class="btn btn-primary text-white">Submit</button>
        <a href="staff_attendanceAV.php" class="btn btn-warning text-white">View</a>
      </div>
    </form>

    <?php
      } else {
        echo "<div class='alert alert-danger mt-3'>No staff found for <strong>" . htmlspecialchars($search) . "</strong>.</div>";
      }
    }
    ?>
  </div>
</div>

<script>
  // Only allow one checkbox to be selected per staff
  document.querySelectorAll('.attendance-checkbox').forEach(cb => {
    cb.addEventListener('change', function () {
      const index = this.dataset.index;
      if (this.checked) {
        document.querySelectorAll(`.attendance-checkbox[data-index="${index}"]`).forEach(box => box.checked = false);
        this.checked = true;
      }
    });
  });


  function toggleSidebar() {
  const sidebar = document.getElementById("sidebar");
  sidebar.classList.toggle("collapsed");
}
</script>

</body>
</html>
