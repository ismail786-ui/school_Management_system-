<?php

include './conn.php';

// Fetch records
$sql = "SELECT * FROM employee_form";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Records</title>
  
</head>
<body>


    <!-- plugins:css -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
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
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Accountant</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Students</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Staffs</a></li>
          <li class="nav-item"> <a class="nav-link" href="./ques_upload.php">Syllabus</a></li>

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
          <li class="nav-item"><a class="nav-link" href="./staf_form.php">Staff Form</a></li>
          <li class="nav-item"><a class="nav-link" href="">Staff View</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
        <i class="bi bi-mortarboard-fill menu-icon"></i>
        <span class="menu-title">Student</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="tables">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="./app_form.php">Form</a></li>
          <li class="nav-item"> <a class="nav-link" href="./stu_fees.php">Fees</a></li>
          <li class="nav-item"> <a class="nav-link" href="./ques_view.php">Syllabus</a></li>
          <li class="nav-item"> <a class="nav-link" href="./app_vform.php">View Form</a></li>

        </ul>
      </div>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
        <i class="bi  bi-bar-chart-fill menu-icon"></i>
        <span class="menu-title">Classes</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="icons">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Sections</a></li>
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
          <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Buses </a></li>
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
          <li class="nav-item"> <a class="nav-link" href="./app_vform.php">Stud Form</a></li>
          <li class="nav-item"> <a class="nav-link" href="#">Emp Form</a></li>
          <li class="nav-item"> <a class="nav-link" href="./stu_vfees.php">Fees Form</a></li>
          <li class="nav-item"> <a class="nav-link" href="./ques_view.php">Questions</a></li>
           <li class="nav-item"> <a class="nav-link" href="./syllabus_upload.php">Syllabus</a></li>
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