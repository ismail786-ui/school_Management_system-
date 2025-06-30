<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>School</title>
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
    <link rel="shortcut icon" href="assets/images/favicon.png"/>
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
     <h3 class="navbar-brand brand-logo me-5 ">School</h3>
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
        <h2><i class="bi bi-person-circle menu-icon"></i></h2>
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
          <li class="nav-item"> <a class="nav-link" href="">Student Details</a></li>
          <li class="nav-item"> <a class="nav-link" href="sub_staff.php">Teacher Details</a></li>
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
  
<?php
include 'conn.php';
$search_id = $_GET['stu_id'] ?? '';
$data = null;

if (!empty($search_id)) {
    $id = mysqli_real_escape_string($conn, $search_id);
    $sql = "SELECT sa.stu_id, sa.stu_name, sa.stu_admission, sa.stu_blood, sa.stu_dob, cm.class_name, cm.class_section, cm.class_teacher
            FROM student_admission sa
            JOIN class_master cm ON sa.class_id = cm.class_id
            WHERE sa.stu_id = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        $error = "No student found.";
    }
}
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-lg-5 col-md-5">

      <!-- Top Section: Title + Home Button -->
      <div class="d-flex  justify-content-start align-items-center">
        <h3 class="mb-0 ml-2">Search Student</h3>
</div>
      <!-- Search Form -->
      <form method="GET" class="row g-2 mb-2 p-3">
        <div class="col-md-4">
          <input type="text" name="stu_id" class="form-control p-2 gx-2" placeholder="Enter Student ID" value="<?= htmlspecialchars($search_id ?? '') ?>" required>
        </div>
        <div class="col-md-4">
          <button type="submit" class="btn btn-primary w-75  p-2 ">Search</button>
        </div>
      </form>
      <!-- Result Card -->
      <?php if (isset($data) && $data): ?>
        <div class="card shadow-sm mt-4">
          <div class="card-header bg-success text-white">Student Information</div>
          <div class="card-body">
            <table class="table table-bordered mb-0">
              <tr><th>ID</th><td><?= $data['stu_id'] ?></td></tr>
              <tr><th>Admission Date</th><td><?= $data['stu_admission'] ?></td></tr>
              <tr><th>Name</th><td><?= $data['stu_name'] ?></td></tr>
              <tr><th>Date of Birth</th><td><?= $data['stu_dob'] ?></td></tr>
              <tr><th>Blood Group</th><td><?= $data['stu_blood'] ?></td></tr>
              <tr><th>Class</th><td><?= $data['class_name'] ?></td></tr>
              <tr><th>Section</th><td><?= $data['class_section'] ?></td></tr>
              <tr><th>Class Teacher</th><td><?= $data['class_teacher'] ?></td></tr>
            </table>
          </div>
        </div>
      <?php elseif (!empty($search_id)): ?>
        <div class="alert alert-danger text-center mt-4">No record found for ID: <?= htmlspecialchars($search_id) ?></div>
      <?php endif; ?>

    </div>
  </div>
</div>
<!------------------------------------------------------------------------------------------------------------------------------------------->



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

