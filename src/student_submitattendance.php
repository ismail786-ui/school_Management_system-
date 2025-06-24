<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $class = $_POST['class'];
  $staff = $_POST['staff_name'];
  $date = $_POST['attendance_date'];
  $students = $_POST['students'];

  foreach ($students as $stu) {
    if (!isset($stu['attendance'])) continue;

    $student_id = $stu['id'];
    $student_name = $stu['name'];

    // Handle checkbox value as array and extract first value
    $status = is_array($stu['attendance']) ? $stu['attendance'][0] : $stu['attendance'];

    $sql = "INSERT INTO student_attendance (student_id, student_name, class, staff_name, date, attendance_status)
            VALUES ('$student_id', '$student_name', '$class', '$staff', '$date', '$status')";
    $conn->query($sql);
  }

  echo "<script>alert('Attendance saved successfully!'); window.location='student_viewattendance.php';</script>";
}
?>