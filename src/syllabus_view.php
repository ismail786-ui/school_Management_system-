<?php
include './conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Syllabus View</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center mb-4">Syllabus Uploads</h2>

    <div class="table-responsive">
      <table class="table table-bordered table-striped text-center align-middle">
        <thead class="table-success">
          <tr>
            <th>#</th>
            <th>Standard</th>
            <th>Subject</th>
            <th>Year</th>
            <th>File</th>
            <th>Syllabus</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT * FROM syllabus_table ORDER BY sy_id DESC";
          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
            $count = 1;
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>
                      <td>{$count}</td>
                      <td>{$row['sy_standard']}</td>
                      <td>{$row['sy_subject']}</td>
                      <td>{$row['sy_year']}</td>
                      <td>{$row['sy_syllabus']}</td>
                      <td><a class='btn btn-success btn-sm' href='syllabus_papers/{$row['sy_syllabus']}' download>Download</a></td>
                    </tr>";
              $count++;
            }
          } else {
            echo "<tr><td colspan='6'>No syllabus found.</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
