<?php include 'conn.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>View Attendance</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h3 class="mb-0 text-center">📋 Attendance Records</h3>

  <!-- Buttons -->
  <div class="d-flex justify-content-end align-items-center my-4"> 
    <a href="./index.php" class="btn btn-success mx-2">🏠 Home</a>
    <a href="student_attendance.php" class="btn btn-primary">➕ Add Attendance</a>
  </div>

  <!-- Filter Form -->
  <form method="GET" class="mb-4">
    <div class="row g-3 align-items-center">
      <div class="col-md-4">
        <input type="text" name="class_filter" class="form-control" placeholder="Enter Class (e.g. 10-A)" value="<?= isset($_GET['class_filter']) ? htmlspecialchars($_GET['class_filter']) : '' ?>">
      </div>
      <div class="col-md-4">
        <input type="date" name="date_filter" class="form-control" value="<?= isset($_GET['date_filter']) ? $_GET['date_filter'] : '' ?>">
      </div>
      <div class="col-md-4 d-flex gap-2">
        <button type="submit" class="btn btn-primary px-3"> Search</button>
        <a href="view_attendance.php" class="btn btn-secondary px-3"> Reset</a>
      </div>
    </div>
  </form>

  <!-- Attendance Table -->
  <table class="table table-bordered mt-3 text-center">
    <thead class="table-info">
      <tr>
        <th>Date</th>
        <th>Student Name</th>
        <th>Class</th>
        <th>Staff Name</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $presentCount = 0;
      $absentCount = 0;
      $otCount = 0;

      // Build filters
      $conditions = [];
      if (!empty($_GET['class_filter'])) {
        $class = $conn->real_escape_string(trim($_GET['class_filter']));
        $conditions[] = "class = '$class'";
      }
      if (!empty($_GET['date_filter'])) {
        $date = $conn->real_escape_string($_GET['date_filter']);
        $conditions[] = "date = '$date'";
      }

      $where = '';
      if (count($conditions) > 0) {
        $where = "WHERE " . implode(" AND ", $conditions);
      }

      $sql = "SELECT * FROM student_attendance $where ORDER BY date DESC";
      $result = $conn->query($sql);

      if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $status = strtolower(trim($row['attendance_status']));

          if ($status === 'present') $presentCount++;
          elseif ($status === 'absent') $absentCount++;
          elseif ($status === 'ot') $otCount++;

          echo "<tr>
            <td>{$row['date']}</td>
            <td>" . htmlspecialchars($row['student_name']) . "</td>
            <td>" . htmlspecialchars($row['class']) . "</td>
            <td>" . htmlspecialchars($row['staff_name']) . "</td>
            <td>" . ucfirst($status) . "</td>
          </tr>";
        }
      } else {
        echo "<tr><td colspan='5' class='text-center'>No attendance data found.</td></tr>";
      }
      ?>
    </tbody>
  </table>

  <!-- Summary Cards -->
  <div class="row text-center mt-4">
    <div class="col-md-4 mb-3">
      <div class="card border-success">
        <div class="card-header bg-success text-white">✅ Present</div>
        <div class="card-body">
          <h4><?= $presentCount ?></h4>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="card border-danger">
        <div class="card-header bg-danger text-white">❌ Absent</div>
        <div class="card-body">
          <h4><?= $absentCount ?></h4>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="card border-warning">
        <div class="card-header bg-warning text-white">🕐 OT</div>
        <div class="card-body">
          <h4><?= $otCount ?></h4>
        </div>
      </div>
    </div>
  </div>

</div>
</body>
</html>
