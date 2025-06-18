<?php
include './conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap & Icons -->
   <link href="../asset./css/style_stu.css" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<style type="text/css">
    
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f6f9;
    }
    .sidebar {
      width: 250px;
      background: #343a40;
      position: fixed;
      height: 100%;
      padding-top: 20px;
      transition: all 0.3s ease;
    }
    .sidebar.collapsed {
      margin-left: -250px;
    }
    .sidebar a {
      color: #fff;
      padding: 15px 20px;
      display: block;
      text-decoration: none;
    }
    .sidebar a:hover, .sidebar a.active {
      background: #00d4ff;
      color: #000;
    }
    .main {
      margin-left: 250px;
      transition: all 0.3s ease;
      padding: 20px;
    }
    .main.expanded {
      margin-left: 0;
    }
    .navbar {
      background: #fff;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .card-box {
      padding: 20px;
      border-radius: 10px;
      color: #fff;
    }
    .toggle-btn {
      display: none;
    }
    @media (max-width: 768px) {
      .sidebar {
        position: absolute;
        z-index: 1000;
      }
      .toggle-btn {
        display: inline-block;
      }
    }
    </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <h5 class="text-center text-white mb-4">Student Panel</h5>
    <a href="#" class="active"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
    <a href="./stu_detail.php"><i class="bi bi-person me-2"></i>Student Details</a>
    <a href="./syllabus_view.php"><i class="bi bi-book me-2"></i></i> Syllabus</a>
    <a href="./ques_view.php"><i class="bi bi-calendar2-check me-2"></i>Question</a>
    <a href="#"><i class="bi bi-cash me-2"></i> Payments</a>
    <a href="#"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
  </div>

  <!-- Main Content -->
  <div class="main" id="mainContent">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light mb-4">
      <div class="container-fluid">
        <button class="btn btn-outline-dark toggle-btn" id="toggleBtn"><i class="bi bi-list"></i></button>
        <h5 class="ms-3 mb-0">Student Dashboard</h5>
      </div>
    </nav>

    <!-- Welcome Section -->
    <!-- <div class="alert alert-info">
      Welcome back, <strong>Aaliya Raja</strong>! | Class: 8th | Roll No: ST20252788
    </div> -->

<div class="container mt-5">
    <h2 class="text-center mb-4">Student Syllabus</h2>
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
                      <td><a class='btn btn-success' href='syllabus_papers/{$row['sy_syllabus']}' download>Download</a></td>
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

<!------------------------------------------------------------------------------------------------------------------------------->


   
  <!-- Bootstrap and JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const toggleBtn = document.getElementById("toggleBtn");
    const sidebar = document.getElementById("sidebar");
    const main = document.getElementById("mainContent");

    toggleBtn.addEventListener("click", () => {
      sidebar.classList.toggle("collapsed");
      main.classList.toggle("expanded");
    });
  </script>
</body>
</html>

<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->
  
























  <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/chart.umd.js"></script>
    <script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <!-- <script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script> -->
    <script src="assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js"></script>
    <script src="assets/js/dataTables.select.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/template.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="assets/js/dashboard.js"></script>
    <!-- <script src="assets/js/Chart.roundedBarCharts.js"></script> -->
    <!-- End custom js for this page-->
  </body>
</html>
