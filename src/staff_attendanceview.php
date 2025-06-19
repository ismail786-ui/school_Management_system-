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
    <title>Attendance Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Staff Attendance Report</h2>
    <table class="table table-bordered">
        <thead class="table-success">
            <tr>
                <th>Date</th>
                <th>Staff ID</th>
                <th>Staff Name</th>
                <th>Status</th>
                <th>Timestamp</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['date'] ?></td>
                <td><?= $row['staff_id'] ?></td>
                <td><?= $row['staff_name'] ?></td>
                <td><?= $row['status'] ?></td>
                <td><?= $row['timestamp'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
