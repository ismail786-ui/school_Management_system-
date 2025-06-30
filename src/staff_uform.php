<?php
include "./conn.php";



if (isset($_POST['emp_update'])) {
    $id = $_GET['update'] ?? 0;

    $emp_name     = $_POST['emp_name'] ?? '';
    $emp_email    = $_POST['emp_email'] ?? '';
    $emp_dob      = $_POST['emp_dob'] ?? '';
    $emp_age      = $_POST['emp_age'] ?? '';
    $emp_gender   = $_POST['emp_gender'] ?? '';
    $emp_address  = $_POST['emp_address'] ?? '';
    $emp_city     = $_POST['emp_city'] ?? '';
    $emp_state    = $_POST['emp_state'] ?? '';
    $emp_pincode  = $_POST['emp_pincode'] ?? '';
    $emp_mother   = $_POST['emp_mother'] ?? '';
    $emp_father   = $_POST['emp_father'] ?? '';
    $emp_mobile   = $_POST['emp_mobile'] ?? '';
    $emp_types    = $_POST['emp_types'] ?? '';
    $emp_major    = $_POST['emp_major'] ?? '';

    $sql = "UPDATE employee_form SET 
        emp_name = '$emp_name',
        emp_email = '$emp_email',
        emp_dob = '$emp_dob',
        emp_age = '$emp_age',
        emp_gender = '$emp_gender',
        emp_address = '$emp_address',
        emp_city = '$emp_city',
        emp_state = '$emp_state',
        emp_pincode = '$emp_pincode',
        emp_mother = '$emp_mother',
        emp_father = '$emp_father',
        emp_mobile = '$emp_mobile',
        emp_major = '$emp_major',
        emp_types = '$emp_types'
        WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record updated successfully'); window.location.href='staff_view.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>School</title>
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

<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
      <?php
  include './conn.php';

// Fetch records
    $id = $_GET['update'];
    $sql = "SELECT * FROM employee_form where id = '$id'";
    $result = $conn->query($sql);

               if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

?>

<div class="container mt-5 mb-5 ">
    <div class="bg-white p-5 shadow rounded text-black">
      <h2 class="mb-4 text-center">Employee Enrollment</h2>
      <form action="" method="POST" enctype="multipart/form-data" class="formcolor">
       <!-- Name and Email -->
        <div class="row mb-3">
          <div class="col-md-4">
             <label for="emp_name" class="form-label">Full Name</label>
          <input type="text" class="form-control" value="<?php echo $row['emp_Name']; ?>" id="stu_name" name="emp_name" required>
          </div>
           <div class="col-md-4">
             <label for="emp_email" class="form-label">Email</label>
          <input type="email" class="form-control" id="emp_email" name="emp_email" value="<?php echo $row['emp_email']; ?>"  required>
          </div>   
          
            <div class="col-md-4">
          <label for="emp_address" class="form-label">Address</label>
          <input type="text" class="form-control" id="emp_address" name="emp_address" value="<?php echo $row['emp_address']; ?>"  required> 
          </div>
        </div>     
        <!--Age,Gender,Address -->
<!----------------------------------------------------------------------------------------------------------------->
         <div class="row mb-3">
            <div class="col-md-4">
            <label for="emp_age" class="form-label">Age</label>
            <input type="number" class="form-control" id="emp_age" value="<?php echo $row['emp_age']; ?>" name="emp_age"max="99"  required>
          </div>
            <div class="col-md-4">
            <label for="emp_dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="emp_dob" name="emp_dob" value="<?php echo $row['emp_dob']; ?>"  required>
          </div>
           <div class="col-md-4">
            <label for="emp_city" class="form-label">City</label>
            <input type="text" class="form-control" id="emp_city" name="emp_city" value="<?php echo $row['emp_city']; ?>" required>
          </div>
           
        
        </div>
<!-------------------------------------------------------------------------------------------------------------->
     
<!--------------------Admission,Photo,certificate-------------------------->
          <div class="row mb-3">
            <div class="col-md-4">
           <label for="emp_gender" class="form-label">Gender</label>
            <select class="form-select text-dark p-3" id="emp_gender" name="emp_gender" value="<?php echo $row['emp_gender']; ?>"  required>
              <option selected disabled>Select</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
        </div>  
        <div class="col-md-4">
            <label for="emp_mobile" class="form-label">Mobile Number</label>
            <input type="text" class="form-control" id="emp_mobile" name="emp_mobile" value="<?php echo $row['emp_mobile']; ?>"maxlength="10"  required>
          </div>    
          <div class="col-md-4">
            <label for="emp_pincode" class="form-label">Pincode</label>
            <input type="text" class="form-control" id="emp_pincode" name="emp_pincode" value="<?php echo $row['emp_pincode']; ?>" maxlength="6"  required>
          </div>
        </div>
<!--------------------------------------------------------------------------------------------------------->
 <div class="row mb-3">
   <div class="col-md-4">
            <label for="emp_mother" class="form-label">Mother Name</label>
            <input type="text" class="form-control" id="emp_mother" name="emp_mother" value="<?php echo $row['emp_mother']; ?>"  required>
          </div>
                <div class="col-md-4">
    <div id="">
    <label for="emp_major" class="form-label">Teacher Major</label>
    <input class="form-control" type="text" id="emp_major" required name="emp_major" value="<?php echo $row['emp_major']; ?>">
    </div>
  </div>
          
    <div class="col-md-4">
            <label for="emp_state" class="form-label">State</label>
            <input type="text" class="form-control" id="emp_state" name="emp_state" value="<?php echo $row['emp_state']; ?>"  required>
          </div>
  </div>
  <!---------------------------------------------------------------------------------------------------------------->
 <div class="row mb-3">
  <div class="col-md-4">
            <label for="emp_father" class="form-label">Father Name</label>
            <input type="text" class="form-control" id="emp_father" name="emp_father" value="<?php echo $row['emp_father']; ?>"  required>
          </div>
            <div class="col-md-4">
  <label for="emp_types" class="form-label">Teacher Types</label>
  <select id="emp_types" class="form-select text-dark p-3"  required name="emp_types" value="<?php echo $row['emp_types']; ?>">
    <option selected disabled>select</option>
    <option value="Primary level">Primary level</option>
    <option value="Secondary level">Secondary level</option>
    <option value="Senior secondary level">Senior secondary level</option>
    <option value="Professors">Professors</option>

  </select>
</div>
       
  
        
<!---------------------------------------------------------------------------------------------------------------------------------------------->
    <!---Submit button -->
    <div class="col-lg-12 mt-4 text-center">
    <button type="submit" name="emp_update" class="btn btn-primary">Update</button>
    <button type="reset" name="reset" class="btn btn-danger text-white">Reset</button>

    </div>  
    </form>
    </div>
  </div>

<?php

    }}
    ?>

































































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