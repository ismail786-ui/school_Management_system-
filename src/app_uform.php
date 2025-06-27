<?php
include "./conn.php";

if (isset($_POST['update'])) {
    $id = $_GET['update'];  // 

    // Collect only the fields you want to update
    $stu_name     = $_POST['stu_name'];
    $stu_email    = $_POST['stu_email'];
    $stu_dob      = $_POST['stu_dob'];
    $stu_age      = $_POST['stu_age'];
    $stu_gender   = $_POST['stu_gender'];
    $stu_address  = $_POST['stu_address'];
    $stu_city     = $_POST['stu_city'];
    $stu_state    = $_POST['stu_state'];
    $stu_pincode  = $_POST['stu_pincode'];
    $stu_mother   = $_POST['stu_mother'];
    $stu_father   = $_POST['stu_father'];
    $stu_mobile   = $_POST['stu_mobile'];
   



    // Update query excluding 
    $sql = "UPDATE student_admission SET 
        stu_name = '$stu_name',
        stu_email = '$stu_email',
        stu_dob = '$stu_dob',
        stu_age = '$stu_age',
        stu_gender = '$stu_gender',
        stu_address = '$stu_address',
        stu_city = '$stu_city',
        stu_state = '$stu_state',
        stu_pincode = '$stu_pincode',
        stu_mother = '$stu_mother',
        stu_father = '$stu_father',
        stu_mobile = '$stu_mobile'
        WHERE stu_id = $id";

    if ($conn->query($sql) == TRUE) {
        echo "<script>alert('Record updated successfully'); window.location.href='app_vform.php';</script>";
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
    <!-- End plugin css for this page  -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
     <!--Internal Stylesheet-->
     <style rel="stylesheet">
    body {
       background-color: #f0f2f5; /* light gray background */
    }
  </style>
  </head>
  <body>
<!----------------------------------------Navbar Start------------------------------------------------------------------------------------------------------------------------------------>
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
          <li class="nav-item"> <a class="nav-link" href="">S</a></li>
          <li class="nav-item"> <a class="nav-link" href="">S</a></li>
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
          <li class="nav-item"> <a class="nav-link" href="./section.php">Class Standard</a></li>
          <li class="nav-item"> <a class="nav-link" href="./sub_staff.php">Class Teacher</a></li>
           <li class="nav-item"> <a class="nav-link" href="./staff_attendance.php">Attendance</a></li>
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
          <li class="nav-item"> <a class="nav-link" href="./staff_view.php">Staff View</a></li>
          <li class="nav-item"> <a class="nav-link" href="./stu_vfees.php">Fees View</a></li>
          <li class="nav-item"> <a class="nav-link" href="./student_viewattendance.php">Student Attendance</a></li>
          <li class="nav-item"> <a class="nav-link" href="./staff_attendanceview.php">Staff Attendance</a></li>
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

<!----------------------------------------------Admission Form------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
 
<div class="container mt-5 mb-5 ">
    <div class="bg-white p-5 shadow rounded text-black">
      <h2 class="mb-4 text-center">Update Form</h2>

      <?php
      include './conn.php';

// Fetch records
    $id = $_GET['update'];
    $sql = "SELECT * FROM student_admission where stu_id = '$id'";
    $result = $conn->query($sql);

               if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

?>
      <form method="POST" enctype="multipart/form-data">
         <input type="hidden" name="stu_id" value="<?php echo $row['stu_id']; ?>">
       <!-- Name and Email -->
        <div class="row mb-3">
          <div class="col-md-4">
             <label for="stu_name" class="form-label">Full Name</label>
          <input type="text" class="form-control" id="stu_name" value="<?php echo $row['stu_name']  ?>" name="stu_name" required>
          </div>
          <div class="col-md-4">
             <label for="stu_email" class="form-label">Email</label>
          <input type="email" class="form-control" id="stu_email" name="stu_email" value="<?php echo $row['stu_email']  ?>" required>
          </div>
           <div class="col-md-4">
            <label for="stu_dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="stu_dob" name="stu_dob" value="<?php echo $row['stu_dob']  ?>" required>
          </div>
        </div>     
        <!--Age,Gender,Address -->
<!---------------------------------------------------------------------------->
         <div class="row mb-3">   
          <div class="col-md-4">
            <label for="stu_age" class="form-label">Age</label>
            <input type="number" class="form-control" id="stu_age" name="stu_age" value="<?php echo $row['stu_age'] ?>" max="50" required>
          </div>
           <div class="col-md-4">
           <label for="stu_gender" class="form-label">Gender</label>
            <select class="form-select text-dark p-3" id="stu_gender" name="stu_gender" value="<?php echo $row['stu_gender'] ?>" required>
              <option selected disabled>Select</option>
              <option value="Male" <?php if($row['stu_gender'] == 'Male') echo 'selected'; ?>>Male</option>
             <option value="Female" <?php if($row['stu_gender'] == 'Female') echo 'selected'; ?>>Female</option>
            </select>
        </div>  
           <div class="col-md-4">
          <label for="stu_address" class="form-label">Address</label>
          <input type="text" class="form-control" id="stu_address" name="stu_address" value="<?php echo $row['stu_address'] ?>" required>
          </div>
        </div>
<!---------------------------------------------------------------------------->
          <div class="row mb-3">
          <div class="col-md-4">
            <label for="stu_city" class="form-label">City</label>
            <input type="text" class="form-control" id="stu_city" name="stu_city" value="<?php echo $row['stu_city'] ?>" required>
          </div>
          <div class="col-md-4">
            <label for="stu_state" class="form-label">State</label>
            <input type="text" class="form-control" id="stu_state" name="stu_state" value="<?php echo $row['stu_state'] ?>" required>
          </div>
          <div class="col-md-4">
            <label for="stu_pincode" class="form-label">Pincode</label>
            <input type="text" class="form-control" id="stu_pincode" name="stu_pincode" value="<?php echo $row['stu_pincode'] ?>" maxlength="6" required>
          </div>
        </div>
<!--------------------------------------------------------------------------------------------------------------->
        <div class="row mb-3">
          <div class="col-md-4">
            <label for="stu_mother" class="form-label">Mother Name</label>
            <input type="text" class="form-control" id="stu_mother" name="stu_mother" value="<?php echo $row['stu_mother'] ?>" required>
          </div>
          <div class="col-md-4">
            <label for="stu_father" class="form-label">Father Name</label>
            <input type="text" class="form-control" id="stu_father" name="stu_father" value="<?php echo $row['stu_father'] ?>" required>
          </div>
          <div class="col-md-4">
            <label for="stu_mobile" class="form-label">Mobile Number</label>
            <input type="text" class="form-control" id="stu_mobile" name="stu_mobile" maxlength="10" value="<?php echo $row['stu_mobile'] ?>" required>
          </div>
        </div>
<!------------------------------------------------------------------------------------------------------------>
<!--------------------Admission,Photo,certificate-------------------------->
          <div class="row mb-3">
          <div class="col-md-4">
        <label for="stu_admission" class="form-label">Admission Date</label>
        <input type="date" class="form-control" id="stu_admission" name="stu_admission" value="<?php echo $row['stu_admission'] ?>" required>
      </div>
      <script>
    // Get today's date in YYYY-MM-DD format
    const today = new Date().toISOString().split('T')[0];
  
    // Set the min attribute to today
    document.getElementById("stu_admission").setAttribute("min", today);
    // </script>
        </div>
<!--------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------------------------------------------------------------------------------------->
    <!---Submit button -->
    <div class="col-lg-12 mt-5 text-center">
    <button type="submit" name="update" class="btn btn-primary">Update</button>
    <button type="reset" name="reset" class="btn btn-danger text-white">Reset</button>
    </div>  
    </form>
    </div>
  </div>
    <?php
  }}
  ?>
<script>
  function toggleInputBox(selectElement) {
    const inputBox = document.getElementById("transferCertificate");
    const additionalBox = document.getElementById("markSheet");

    const requiresTransfer = [
      "ukg", "first", "second", "third", "fourth", "fifth",
      "sixth", "seventh", "eighth", "ninth", "tenth", "eleventh", "twelfth"
    ];

    const requiresAdditional = ["eleventh", "twelfth"];

    const selectedValue = selectElement.value.toLowerCase();

    // Show/hide Transfer Certificate field
    inputBox.style.display = requiresTransfer.includes(selectedValue) ? "block" : "none";

    // Show/hide Marksheet Input field for 11th & 12th
    additionalBox.style.display = requiresAdditional.includes(selectedValue) ? "block" : "none";
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- ------------------------------------------------------------------------------- -->
<!--------------------------------------------------------------------------------------------------------->
               
     


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