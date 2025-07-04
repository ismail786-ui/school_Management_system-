<?php include 'conn.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="../src./assets/images/ps.png" type="image/png">
  <link href="../src./assets/images/ps.png" rel="apple-touch-icon">
  <title>Student Standard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

  <!-- Title Row with Home Button -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Students by Standard</h2>
    <a href="index.php" class="btn btn-warning">Home</a>
  </div>

  <!-- Dropdown Form -->
  <form method="GET" class="row g-3 mb-4 justify-content-center">
    <div class="col-md-2">
      <select name="std" class="form-select" required>
        <option value="">Select Standard</option>
        <?php
          $standards = [
            "Pre-KG", "LKG", "UKG",
            "First", "Second", "Third", "Fourth", "Fifth",
            "Sixth", "Seventh", "Eighth",
            "Ninth", "Tenth", "Eleventh", "Twelfth"
          ];
          foreach ($standards as $std) {
            $selected = (isset($_GET['std']) && $_GET['std'] == $std) ? 'selected' : '';
            echo "<option value='$std' $selected>$std</option>";
          }
        ?>
      </select>
    </div>
    <div class="col-md-2">
      <button type="submit" class="btn btn-primary w-100">Search</button>
    </div>
  </form>

  <?php
    if (isset($_GET['std'])) {
      $standard = $_GET['std'];
      echo "<h4 class='text-center text-primary mb-3'>Students in $standard</h4>";

      $sql = "SELECT * FROM student_admission WHERE stu_standard = '$standard'";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        echo "<table class='table table-bordered table-striped'>
                <thead class='table-info'>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Blood Group</th>
                    <th>City</th>
                    <th>Mobile</th>
                  </tr>
                </thead>
                <tbody>";
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>
                  <td>{$i}</td>
                  <td>{$row['stu_name']}</td>
                  <td>{$row['stu_email']}</td>
                  <td>{$row['stu_gender']}</td>
                  <td>{$row['stu_dob']}</td>
                  <td>{$row['stu_blood']}</td>
                  <td>{$row['stu_city']}</td>
                  <td>{$row['stu_mobile']}</td>
                </tr>";
          $i++;
        }
        echo "</tbody></table>";
      } else {
        echo "<div class='d-flex justify-content-center'><div class='alert alert-warning text-center'>No students found in $standard.</div></div>";
      }
    }
  ?>
</div>
</body>
</html>
