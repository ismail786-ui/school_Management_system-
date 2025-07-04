<?php include 'conn.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="../src./assets/images/ps.png" type="image/png">
    <link href="../src./assets/images/ps.png" rel="apple-touch-icon">
    <title>Student Timetable View</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2 class="mb-4 text-center">Timetable Records</h2>
  <table class="table table-bordered table-hover">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Class</th>
        <th>Day</th>
        <th>Period</th>
        <th>Subject</th>
        <th>Teacher</th>
        <th>Room</th>
        <th>Time</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $sql = "SELECT t.*, c.class_name, c.class_section FROM student_timetable t
              JOIN class_master c ON t.class_id = c.class_id";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['timetable_id']}</td>
                <td>{$row['class_name']} - {$row['class_section']}</td>
                <td>{$row['day_of_week']}</td>
                <td>{$row['period_no']}</td>
                <td>{$row['subject_name']}</td>
                <td>{$row['teacher_name']}</td>
                <td>{$row['room_no']}</td>
                <td>{$row['start_time']} - {$row['end_time']}</td>
                <td>
                  <a href='student_timetableedit.php?id={$row['timetable_id']}' class='btn btn-sm btn-warning'>Edit</a>
                </td>
              </tr>";
      }
    ?>
    </tbody>
  </table>
</div>
</body>
</html>
