<?php
include 'conn.php'; // Make sure this connects to your database

// Fetch all bus records
$sql = "SELECT * FROM bus_form ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Transport View</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3>🚌 School Bus List</h3>
      <a href="bus_form.php" class="btn btn-primary">+ Add New Bus</a>
    </div>

    <?php if ($result->num_rows > 0) { ?>
      <div class="table-responsive">
        <table class="table table-bordered table-hover text-center">
          <thead class="table-info">
            <tr>
              <th>ID</th>
              <th>Bus Number</th>
              <th>Plate Number</th>
              <th>From Route</th>
              <th>To Route</th>
              <th>Driver Name</th>
              <th>Conductor Name</th>
              <th>Driver Contact</th>
              <th>Bus Capacity</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; while ($row = $result->fetch_assoc()) { ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= htmlspecialchars($row['bus_number']) ?></td>
                <td><?= htmlspecialchars($row['plate_number']) ?></td>
                <td><?= htmlspecialchars($row['from_route']) ?></td>
                <td><?= htmlspecialchars($row['to_route']) ?></td>
                <td><?= htmlspecialchars($row['driver_name']) ?></td>
                <td><?= htmlspecialchars($row['conductor_name']) ?></td>
                <td><?= htmlspecialchars($row['driver_contact']) ?></td>
                <td><?= htmlspecialchars($row['capacity']) ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    <?php } else { ?>
      <div class="alert alert-warning">No transport records found.</div>
    <?php } ?>
  </div>
</body>
</html>
