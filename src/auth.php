<?php
include 'conn.php';


$students = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM student_admission"))['total'];


$teachers = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM employee_form"))['total'];

$classes = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM class_master"))['total'];


?>

<!DOCTYPE html>
<html>
<head>
  <title>School Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body { background: #0f172a; color: #fff; }
    .card { background-color: #1e293b; border: none; }
    .chart-container { width: 100%; height: 300px; }
  </style>
</head>
<body>

<div class="container py-5">
  <div class="mb-4 text-center">
    <h2>📊 Dashboard Overview</h2>
    <p class="text-muted">School users and activity</p>
  </div>

  <!-- Your 3 Summary Cards -->
  <div class="row mb-4 text-center">
    <div class="col-md-4 mb-3">
      <div class="card p-4">
        <h5>👩‍🎓 Students</h5>
        <h2 class="text-primary"><?= $students ?></h2>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="card p-4">
        <h5>👨‍🏫 Teachers</h5>
        <h2 class="text-success"><?= $teachers ?></h2>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="card p-4">
        <h5>🛠️ Total Classes</h5>
        <h2 class="text-warning"><?= $classes ?></h2>
      </div>
    </div>
  </div>

  <!-- Pie Chart Section -->
  <div class="row justify-content-center mb-5">
    <div class="col-md-6">
      <div class="card text-center p-4">
        <h5 class="mb-3">Overall Count</h5>
        <canvas id="circleChart"></canvas>
        <div class="mt-4">
          <span class="badge bg-primary">Students: <?= $students ?></span>
          <span class="badge bg-success">Teachers: <?= $teachers ?></span>
          <span class="badge bg-warning text-dark">Classes: <?= $classes ?></span>
        </div>
      </div>
    </div>
  </div>

  <!-- Chart.js Area -->
  <div class="row">
    <div class="col-md-8 mb-4">
      <div class="card p-4">
        <h5>📈 Attendance Overview</h5>
        <canvas id="attendanceChart" class="chart-container"></canvas>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card p-4">
        <h5>🎯 Class-wise Attendance</h5>
        <canvas id="radarChart" class="chart-container"></canvas>
      </div>
    </div>
  </div>
</div>

<!-- Chart.js Scripts -->
<script>
  // Line Chart - Attendance %
  fetch('chart-data.php')
    .then(res => res.json())
    .then(data => {
      new Chart(document.getElementById('attendanceChart'), {
        type: 'line',
        data: {
          labels: data.labels,
          datasets: [{
            label: 'Attendance %',
            data: data.values,
            borderColor: '#60a5fa',
            backgroundColor: 'rgba(96,165,250,0.2)',
            fill: true
          }]
        }
      });
    });

  // Radar Chart - Dummy Class-wise Attendance %
  new Chart(document.getElementById('radarChart'), {
    type: 'radar',
    data: {
      labels: ['Class 6', 'Class 7', 'Class 8', 'Class 9', 'Class 10'],
      datasets: [{
        label: 'Attendance %',
        data: [88, 92, 85, 90, 95],
        backgroundColor: 'rgba(34,197,94,0.2)',
        borderColor: '#22c55e',
        pointBackgroundColor: '#22c55e'
      }]
    }
  });

  // Circle (Pie) Chart - Students / Teachers / Classes
  new Chart(document.getElementById('circleChart'), {
    type: 'doughnut',
    data: {
      labels: ['Students', 'Teachers', 'Classes'],
      datasets: [{
        label: 'Count',
        data: [<?= $students ?>, <?= $teachers ?>, <?= $classes ?>],
        backgroundColor: ['#3b82f6', '#10b981', '#fbbf24'],
        borderColor: ['#3b82f6', '#10b981', '#fbbf24'],
        borderWidth: 1
      }]
    }
  });
</script>

</body>
</html>
