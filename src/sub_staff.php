<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="shortcut icon" href="../src./assets/images/ps.png" type="image/png">
    <link href="../src./assets/images/ps.png" rel="apple-touch-icon">
    <title>Subject</title>
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
      <style type='text/css'> 
      .card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 0 12px rgba(0, 0, 0, 0.05);
    }
    .chart-card {
      background: white;
      padding: 30px;
      border-radius: 12px;
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
       <a class="nav-link m-4 text-white " href="./staf_form.php">
        <h4 class='p-1 bg-success ml-5 mt-2 '> Teacher Enrollment</h4>
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
          <li class="nav-item"> <a class="nav-link" href="">Teacher Details</a></li>
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
          <li class="nav-item"> <a class="nav-link" href="">Teacher Details</a></li>
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
          <li class="nav-item"> <a class="nav-link" href="./student_viewattendance.php">Student Attendance</a></li>
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


<!---------------------------------------Start bar------------------------------------------------------------------>
  
<!------------------------------------------------------------------------------------------------------------------------------------------->


<?php
include 'conn.php';

$search_term = isset($_GET['search_term']) ? trim($_GET['search_term']) : '';
$show_table = false;

$sql = "SELECT 
            ef.emp_Name,
            sm.sub_code,
            sm.sub_name,
            sm.sub_standard,
            sm.sub_sec
        FROM employee_form AS ef
        JOIN sub_master AS sm ON ef.id = sm.id";

if (!empty($search_term)) {
    $show_table = true;
    $safe_term = mysqli_real_escape_string($conn, $search_term);
    if (is_numeric($search_term)) {
        $sql .= " WHERE ef.id = '$safe_term'";
    } else {
        $sql .= " WHERE ef.emp_Name LIKE '%$safe_term%'";
    }

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    }
}
?>


   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container  bg-white shadow-sm rounded p-4">
  <!-- Page Title -->
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
  <h2 class="mb-3 mb-md-0">👩‍🏫 Teacher Details</h2>

  <!-- Search Form -->
<form method="GET" class="d-flex align-items-center " role="search">
  <input
    type="text"
    name="search_term"
    class="form-control me-2"
    style="border:1px solid black; box-shadow: none; outline: none; font-size:16px;"
    this.style.boxShadow='none';
    onblur="this.style.outline='none';"
    placeholder="Enter ID or Name"
    value="<?= htmlspecialchars($search_term ?? '') ?>">
 <button type="submit" class="btn btn-primary w-75 p-2 "
  style="background-color: rgb(27, 112, 196); border: none; border-radius:0;">
  Search
</button>

</form>

</div>



<!-- Results Table -->
<?php if ($show_table): ?>

  <!-- 🖥️ Table View on Medium+ screens -->
  <div class="table-responsive d-none d-md-block">
    <table class="table table-bordered table-hover align-middle text-center">
      <thead class="table-light">
        <tr>
          <th><h5>👤 Employee Name</h5></th>
          <th><h5>📘 Subject Name</h5></th>
          <th><h5>🎓 Standard</h5></th>
          <th><h5>🏫 Section</h5></th>
        </tr>
      </thead>
      <tbody>
        <?php if (mysqli_num_rows($result) > 0): ?>
          <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
              <td><h6><?= htmlspecialchars($row['emp_Name']) ?></h6></td>
              <td><h6><?= htmlspecialchars($row['sub_name']) ?></h6></td>
              <td><h6><?= htmlspecialchars($row['sub_standard']) ?></h6></td>
              <td><h6><?= htmlspecialchars($row['sub_sec']) ?></h6></td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr><td colspan="4" class="text-white bg-danger">No results found.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <!-- 📱 Card View on Small Screens -->
  <div class="d-block d-md-none">
    <?php if (mysqli_num_rows($result) > 0): ?>
      <?php
      // Move pointer to beginning for second loop
      mysqli_data_seek($result, 0);
      while ($row = mysqli_fetch_assoc($result)): ?>
        <div class="card mb-3 shadow-sm">
          <div class="card-body">
            <p class="mb-1"><strong>👤 Employee Name:</strong> <?= htmlspecialchars($row['emp_Name']) ?></p>
            <p class="mb-1"><strong>📘 Subject Name:</strong> <?= htmlspecialchars($row['sub_name']) ?></p>
            <p class="mb-1"><strong>🎓 Standard:</strong> <?= htmlspecialchars($row['sub_standard']) ?></p>
            <p class="mb-0"><strong>🏫 Section:</strong> <?= htmlspecialchars($row['sub_sec']) ?></p>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <div class="alert alert-danger text-center mt-2">No results found.</div>
    <?php endif; ?>
  </div>

<?php endif; ?>






</body>
</html>


         

















































































































































































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