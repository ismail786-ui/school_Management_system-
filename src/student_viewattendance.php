<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="shortcut icon" href="../src./assets/images/ps.png" type="image/png">
    <link href="../src./assets/images/ps.png" rel="apple-touch-icon">
    <title>Student Attendance view</title>
    <!-- plugins:css -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- endinject -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style type="text/css">
    .chart-container {
      width: 400px;
      height: 400px;
      margin: auto;
    }
    .card {
      border-radius: 1rem;
      box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075);
    }
  </style>
  </head>
  <body>
<!------------------------------------------navbar start--------------------------------------------------------------------->
   <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
     <h3 class="navbar-brand brand-logo me-5 ">
        <img class="logo-image" src="../src./assets/images/ps.png" width="50" alt="Logo"><span class="text-success">Pearlsys</span> </h3>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown">
       <a class="nav-link m-4 text-white " href="./app_form.php">
        <h4 class='p-2 bg-success ml-5 mt-2 '>Student Enrollment</h4>
        </a>
      </li>
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
         <img src="../src./assets/images/login1.png" alt="Person" style="width:45px; height:45px;" class="">
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <!-- <a href="./login.php" class="dropdown-item">
          <i class="bi bi-person-fill"></i>Admin</a> -->
          <a class="dropdown-item text-dark" href="./login.php">
          <i class="bi bi-box-arrow-right"></i> Logout </a>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="icon-menu"></span>
    </button>
  </div>
</nav>
<!----------------------------------------------Start bar------------------------------------------------------------------>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper ">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav position-fixed">
    <li class="nav-item">
      <a class="nav-link" href="./index.php">
        <i class="bi bi-graph-up-arrow menu-icon"></i>
               <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="bi bi-person-fill menu-icon"></i>
        <span class="menu-title">Admin</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="./stu_detailA.php">Student Details</a></li>
          <li class="nav-item"> <a class="nav-link" href="./sub_staff.php">Teacher Details</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
        <i class="bi bi-people-fill menu-icon"></i>
        <span class="menu-title">Teachers</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="form-elements">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="./staf_form.php">Teacher Form</a></li>
          <li class="nav-item"> <a class="nav-link" href="./section.php">Class Standard</a></li>
          <li class="nav-item"> <a class="nav-link" href="./sub_staff.php">Teacher Details</a></li>
             <li class="nav-item"> <a class="nav-link" href="./staff_attendanceA.php">Attendance</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
        <i class="bi bi-mortarboard-fill menu-icon"></i>
        <span class="menu-title">Students</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="tables">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="./app_form.php">Form</a></li>
          <li class="nav-item"> <a class="nav-link" href="./stu_fees.php">Fees</a></li>
          <li class="nav-item"><a class="nav-link" href="./student_attendance.php">Attendance</a>
          <li class="nav-item"> <a class="nav-link" href="./syllabus_upload.php">Syllabus Upload</a></li>
          <li class="nav-item"> <a class="nav-link" href="./ques_upload.php">Question Upload</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="bi bi-bus-front menu-icon"></i>
        <span class="menu-title">Transport</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="bus_form.php"> Buses </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title"> Report</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="error">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="./app_vform.php">Student View</a></li>
          <li class="nav-item"> <a class="nav-link" href="./standard.php">Standard View</a></li>
          <li class="nav-item"> <a class="nav-link" href="./staff_view.php">Teacher View</a></li>
          <li class="nav-item"> <a class="nav-link" href="./stu_vfees.php">Fees View</a></li>
          <li class="nav-item"> <a class="nav-link" href="">Student Attendance</a></li>
          <li class="nav-item"> <a class="nav-link" href="./staff_attendanceAV.php">Teacher Attendance</a></li>
          <li class="nav-item"> <a class="nav-link" href="./syllabus_view.php">Syllabus View</a></li>
          <li class="nav-item"> <a class="nav-link" href="./ques_view.php">Questions View</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
     <a class="nav-link" href="./login.php">
        <i class="bi bi-box-arrow-right menu-icon text-dark"></i>
        <span class="menu-title">Logout</span>
      </a>
    </li>
  </ul>
</nav>

<div class="container mt-5">
  <h3 class="mb-0 text-center">📋 Attendance Records</h3>

  <!-- Buttons -->
  <div class="d-flex justify-content-end align-items-center my-4"> 
    <a href="./index.php" class="btn btn-success mx-2 text-white">🏠 Home</a>
    <a href="student_attendance.php" class="btn btn-primary">➕ Add Attendance</a>
  </div>

  <!-- Filter Form -->
  <form method="GET" class="mb-4">
    <div class="row g-3 align-items-center">
      <div class="col-md-2">
        <input type="text" name="class_filter" class="form-control" placeholder="Enter Class (e.g. 10-A)" value="<?= isset($_GET['class_filter']) ? htmlspecialchars($_GET['class_filter']) : '' ?>">
      </div>
      <div class="col-md-2">
        <input type="date" name="date_filter" class="form-control" value="<?= isset($_GET['date_filter']) ? $_GET['date_filter'] : '' ?>">
      </div>
      <div class="col-md-4 d-flex gap-2">
              <button type="submit" class="btn btn-primary" name="submit_fees"
  style="background-color: rgb(27, 112, 196); border: none; border-radius: 0;">
  Search</button>
        <button type='reset' style=" border: none; border-radius: 0;" class="btn btn-danger text-white px-3"> Reset</button>
      </div>
    </div>
  </form>

  <!-- Attendance Table -->
  <table class="table table-bordered mt-3 text-center">
    <thead class="table-info">
      <tr>
        <th>Date</th>
        <th>Student Name</th>
        <th>Class</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include './conn.php';
      $presentCount = 0;
      $absentCount = 0;
      $otCount = 0;

      // Build filters
      $conditions = [];
      if (!empty($_GET['class_filter'])) {
        $class = $conn->real_escape_string(trim($_GET['class_filter']));
        $conditions[] = "class = '$class'";
      }
      if (!empty($_GET['date_filter'])) {
        $date = $conn->real_escape_string($_GET['date_filter']);
        $conditions[] = "date = '$date'";
      }

      $where = '';
      if (count($conditions) > 0) {
        $where = "WHERE " . implode(" AND ", $conditions);
      }

      $sql = "SELECT * FROM student_attendance $where ORDER BY date DESC";
      $result = $conn->query($sql);

      if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $status = strtolower(trim($row['attendance_status']));

          if ($status === 'present') $presentCount++;
          elseif ($status === 'absent') $absentCount++;
          elseif ($status === 'ot') $otCount++;

          echo "<tr>
            <td>{$row['date']}</td>
            <td>" . htmlspecialchars($row['student_name']) . "</td>
            <td>" . htmlspecialchars($row['class']) . "</td>
            <td>" . ucfirst($status) . "</td>
          </tr>";
        }
      } else {
        echo "<tr><td colspan='5' class='text-center'>No attendance data found.</td></tr>";
      }
      ?>
    </tbody>
  </table>

  <!-- Summary Cards -->
  <div class="row text-center mt-4">
    <div class="col-md-4 mb-3">
      <div class="card border-success">
        <div class="card-header bg-success text-white">✅ Present</div>
        <div class="card-body">
          <h4><?= $presentCount ?></h4>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="card border-danger">
        <div class="card-header bg-danger text-white">❌ Absent</div>
        <div class="card-body">
          <h4><?= $absentCount ?></h4>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="card border-warning">
        <div class="card-header bg-warning text-white">🕐 OT</div>
        <div class="card-body">
          <h4><?= $otCount ?></h4>
        </div>
      </div>
    </div>
  </div>

</div>




























          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
  <div class="d-sm-flex justify-content-center">
    <!-- <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2025 All rights reserved.</span> -->
  </div>
</footer>
          <!-- partial -->
</div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
































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

