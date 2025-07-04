<?php
include 'conn.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM student_timetable WHERE timetable_id = $id");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="../src./assets/images/ps.png" type="image/png">
    <link href="../src./assets/images/ps.png" rel="apple-touch-icon">
    <title>Student Timetable Edit</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <h2 class="text-center mb-4">Edit Timetable Entry</h2>

      <form action="timetable_update.php" method="POST" class="border p-4 rounded shadow bg-white">
        <input type="hidden" name="timetable_id" value="<?= $row['timetable_id'] ?>">

        <!-- Class and Day -->
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Class</label>
            <select name="class_id" class="form-select" required>
              <option value="">Select Class</option>
              <?php
                $classes = mysqli_query($conn, "SELECT class_id, class_name, class_section FROM class_master");
                while ($class = mysqli_fetch_assoc($classes)) {
                  $selected = ($class['class_id'] == $row['class_id']) ? 'selected' : '';
                  echo "<option value='{$class['class_id']}' $selected>{$class['class_name']} - {$class['class_section']}</option>";
                }
              ?>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Day of Week</label>
            <select name="day_of_week" class="form-select" required>
              <?php
                $days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
                foreach ($days as $day) {
                  $selected = ($day == $row['day_of_week']) ? 'selected' : '';
                  echo "<option value='$day' $selected>$day</option>";
                }
              ?>
            </select>
          </div>
        </div>

        <!-- Period and Room -->
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Period No.</label>
            <input type="number" name="period_no" class="form-control" value="<?= $row['period_no'] ?>" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Room No.</label>
            <input type="text" name="room_no" class="form-control" value="<?= $row['room_no'] ?>" required>
          </div>
        </div>

        <!-- Subject and Teacher -->
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Subject</label>
            <select name="subject_name" class="form-select" required>
              <option value="">Select Subject</option>
              <?php
                $subjects = mysqli_query($conn, "SELECT subject_name FROM subjects");
                while ($sub = mysqli_fetch_assoc($subjects)) {
                  $selected = ($sub['subject_name'] == $row['subject_name']) ? 'selected' : '';
                  echo "<option value='{$sub['subject_name']}' $selected>{$sub['subject_name']}</option>";
                }
              ?>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Teacher Name</label>
            <input type="text" name="teacher_name" class="form-control" value="<?= $row['teacher_name'] ?>" required>
          </div>
        </div>

        <!-- Time -->
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Start Time</label>
            <input type="time" name="start_time" class="form-control" value="<?= $row['start_time'] ?>" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">End Time</label>
            <input type="time" name="end_time" class="form-control" value="<?= $row['end_time'] ?>" required>
          </div>
        </div>

        <!-- Submit -->
        <div class="text-center mt-4">
          <button type="submit" name="update" class="btn btn-success px-4">Update Timetable</button>
        </div>

      </form>
    </div>
  </div>
</div>

</body>
</html>
