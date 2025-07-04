<?php
include 'conn.php';

if (isset($_POST['submit'])) {
    // Get form data
    $class_id      = $_POST['class_id'];
    $day_of_week   = $_POST['day_of_week'];
    $period_no     = $_POST['period_no'];
    $room_no       = $_POST['room_no'];
    $subject_name  = $_POST['subject_name'];
    $teacher_name  = $_POST['teacher_name'];
    $start_time    = $_POST['start_time'];
    $end_time      = $_POST['end_time'];

    // Insert query
    $sql = "INSERT INTO student_timetable (
                class_id, day_of_week, period_no, room_no, 
                subject_name, teacher_name, start_time, end_time
            ) VALUES (
                '$class_id', '$day_of_week', '$period_no', '$room_no',
                '$subject_name', '$teacher_name', '$start_time', '$end_time'
            )";

    if (mysqli_query($conn, $sql)) {
        echo "Timetable entry added successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html>
<head>
   <link rel="shortcut icon" href="../src./assets/images/ps.png" type="image/png">
    <link href="../src./assets/images/ps.png" rel="apple-touch-icon">
    <title>Student Timetable</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h2 class="text-center mb-4">Add Class Timetable</h2>

      <form action="" method="POST" class="border p-4 rounded shadow bg-light">

        <!-- Row 1: Class and Day -->
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="class_id" class="form-label">Class</label>
            <select name="class_id" class="form-select" required>
              <option value="">Select Class</option>
              <?php
                $result = mysqli_query($conn, "SELECT class_id, class_name, class_section FROM class_master");
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<option value='{$row['class_id']}'>{$row['class_name']} - {$row['class_section']}</option>";
                }
              ?>
            </select>
          </div>
          <div class="col-md-6">
            <label for="day_of_week" class="form-label">Day of Week</label>
            <select name="day_of_week" class="form-select" required>
              <option value="">Select Day</option>
              <option>Monday</option>
              <option>Tuesday</option>
              <option>Wednesday</option>
              <option>Thursday</option>
              <option>Friday</option>
              <option>Saturday</option>
            </select>
          </div>
        </div>

        <!-- Row 2: Period and Room -->
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Period No.</label>
            <input type="number" name="period_no" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Room No.</label>
            <input type="text" name="room_no" class="form-control" required>
          </div>
        </div>

        <!-- Row 3: Subject and Teacher -->
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Subject</label>
            <input type="text" name="subject_name" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Teacher</label>
            <input type="text" name="teacher_name" class="form-control" required>
          </div>
        </div>

        <!-- Row 4: Start and End Time -->
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Start Time</label>
            <input type="time" name="start_time" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">End Time</label>
            <input type="time" name="end_time" class="form-control" required>
          </div>
        </div>

        <!-- Submit Button -->
        <div class="text-center mt-3">
          <button type="submit" name="submit" class="btn btn-primary px-4">Add Timetable</button>
        </div>

      </form>
    </div>
  </div>
</div>

</body>
</html>
