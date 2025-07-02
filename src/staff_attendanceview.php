<?php
include 'conn.php';

$result = mysqli_query($conn, "
  SELECT staff_attendance.*, staff_timetable.staff_name 
  FROM staff_attendance 
  JOIN staff_timetable ON staff_attendance.staff_id = staff_timetable.staff_id 
  ORDER BY staff_attendance.date DESC
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Staff Attendance Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .attendance-card {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            transition: transform 0.2s ease;
        }
        .attendance-card:hover {
            transform: scale(1.02);
        }
    </style>
</head>
<body>
<div class="container mt-5 ">
    <!-- Header with Button -->
    <div class="card bg-primary">
        <div class="d-flex justify-content-between align-items-center my-2 mx-3">
        <h2 class=" card-title text-white p-1">Staff Attendance Report</h2>
        <a href="staff_attendance.php" class="btn btn-warning px-3 ">Add Attendance</a>
    </div>
    </div>

    <!-- Attendance Cards -->
    <div class="row g-3 mt-3">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-md-4">
                <div class="card attendance-card border-primary">
                    <div class="card-header bg-primary text-white">
                        <?= htmlspecialchars($row['staff_name']) ?>
                    </div>
                    <div class="card-body">
                        <p><strong>Staff ID:</strong> <?= htmlspecialchars($row['staff_id']) ?></p>
                        <p><strong>Status:</strong> 
                          <span class="badge <?= $row['status'] === 'Present' ? 'bg-success' : 'bg-danger' ?>">
                            <?= htmlspecialchars($row['status']) ?>
                          </span>
                        </p>
                        <p><strong>Timestamp:</strong> <?= htmlspecialchars($row['timestamp']) ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
