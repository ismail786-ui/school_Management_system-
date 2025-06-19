<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Staff Timetable</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f0f2f5;
    }

    .day-section {
      margin-bottom: 40px;
    }

    .card-title {
      text-transform: capitalize;
      font-size: 1.4rem;
    }

    .card {
      border: none;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
      border-radius: 12px;
    }

    .table {
      margin-bottom: 0;
    }

    @media (max-width: 768px) {
      .card-title {
        font-size: 1.2rem;
      }
    }
  </style>
</head>
<body>

  <div class="container py-4">
    <h2 class="text-center mb-5 text-primary">📅 Staff Timetable</h2>

    <?php
    include 'conn.php';
    $staff_id = 1; // Use session or dynamic value here

    $sql = "SELECT * FROM staff_timetable 
            WHERE staff_id = '$staff_id' 
            ORDER BY FIELD(day_of_week, 'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'), period_number";
    $result = mysqli_query($conn, $sql);

    $current_day = '';
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        if ($current_day != $row['day_of_week']) {
          if ($current_day != '') echo '</tbody></table></div></div></div>';
          $current_day = $row['day_of_week'];

          echo "<div class='day-section'>
                  <div class='card'>
                    <div class='card-body'>
                      <h4 class='card-title text-primary'>$current_day</h4>
                      <div class='table-responsive'>
                        <table class='table table-bordered table-hover table-striped text-center'>
                          <thead class='table-dark'>
                            <tr>
                              <th>Period</th>
                              <th>Subject</th>
                              <th>Class</th>
                              <th>Time</th>
                            </tr>
                          </thead>
                          <tbody>";
        }

        echo "<tr>
                <td>{$row['period_number']}</td>
                <td>{$row['subject']}</td>
                <td>{$row['class_name']}</td>
                <td>{$row['start_time']} - {$row['end_time']}</td>
              </tr>";
      }

      echo "</tbody></table></div></div></div>";
    } else {
      echo "<div class='alert alert-warning text-center'>No timetable found for this staff.</div>";
    }
    ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
