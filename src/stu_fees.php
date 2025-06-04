<?php
include './conn.php'; // your DB connection

$student_name = $student_email = $standard = "";
$default_fees = 15000;

if (isset($_POST['get_student'])) {
    $stu_id = intval($_POST['stu_id']);
    $query = "SELECT stu_name, stu_email, stu_standard,school_fees FROM student_admission WHERE stu_id = $stu_id";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        // $stu_id = $row['stu_id'];
        $student_name = $row['stu_name'];
        $student_email = $row['stu_email'];
        $standard = $row['stu_standard'];
        $school_fees = $row['school_fees'];
    } else {
        echo "<script>alert('Student ID not found');</script>";
    }
}
if (isset($_POST['submit_fees'])) {
    $student_name = $_POST['student_name'];
    $student_email = $_POST['student_email'];
    $standard = $_POST['standard'];
    $fees_type = $_POST['fees_type'];
    $amount = $_POST['amount'];
    $payment_date = $_POST['payment_date'];
    $payment_mode = $_POST['payment_mode'];
    $student_paid = $_POST['student_paid'];
    $balance = $_POST['balance'];

    $sql = "INSERT INTO student_fees (student_name, student_email, standard, fees_type, amount, payment_date, payment_mode, student_paid, balance_amount)
            VALUES ('$student_name', '$student_email', '$standard', '$fees_type', '$amount', '$payment_date', '$payment_mode', '$student_paid', '$balance')";

    if (mysqli_query($conn, $sql)) {
        header('Location: stu_vfees.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
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
    <style rel="stylesheet">
    body {
       /* background-color: #f0f2f5;  */
    }
  </style>
  </head>
  <body>
<!--------------------------------------------------------------------------------------------------------------->
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
        <h4 class='p-2 bg-success m-2 '>Application Form</h4>
        </a>
      </li>
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
        <h2><i class="bi bi-person-circle menu-icon"></i></h2>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="./login.php">
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
      <a class="nav-link" href="index.php">
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
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Classes</a></li>

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
          <li class="nav-item"> <a class="nav-link" href="./staf_form.php">Staff Form</a></li>
          <li class="nav-item"> <a class="nav-link" href="./staff_view.php">Staff View</a></li>
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
          <li class="nav-item"> <a class="nav-link" href="#">Fees</a></li>
          <li class="nav-item"> <a class="nav-link" href="./app_form.php">Syllabus</a></li>
          <li class="nav-item"> <a class="nav-link" href="./app_form.php">View Form</a></li>

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
          <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Section</a></li>
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
          <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
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
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
 <div class="container mt-5 mb-5">
  <h4 class="text-center mb-4">School Fees Payment Form</h4>

  <!-- Centered form using row + col-md-8 + mx-auto -->
  <div class="row justify-content-center">
    <div class="col-md-8">
      <form method="POST" action="" enctype="multipart/form-data">
        <div class="col-md-4">
      <label for="stu_id" class="form-label">Enter Student ID</label>
      <input type="number" class="form-control" id="stu_id" name="stu_id"  value="<?= $stu_id ?>">
    </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="student_name" class="form-label">Name</label>
            <input type="text" class="form-control p-2" id="student_name" name="student_name"  value="<?= $student_name ?>">
          </div>
          <div class="col-md-6">
            <label for="student_email" class="form-label">Email</label>
            <input type="text" class="form-control p-2" id="student_email" name="student_email"  value="<?= $student_email ?>">
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label for="standard" class="form-label">Standard</label>
<input type="text" class="form-control p-2" id="standard" name="standard"  value="<?= $standard ?>">
          </div>
          <div class="col-md-6">
            <label for="fees_type" class="form-label">Fees Type</label>
            <select class="form-select" id="fees_type" name="fees_type" >
              <option selected disabled>Select</option>
              <option class="text-dark" value="Tuition">School</option>
            </select>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label for="amount" class="form-label">Total Amount (₹)</label>
    <input type="number" class="form-control p-2" id="amount" name="amount" value="<?= $school_fees ?>">
          </div>
          <div class="col-md-6">
            <label for="payment_date" class="form-label">Payment Date</label>
            <input type="date" class="form-control p-2" id="payment_date" name="payment_date" >
            <script>
              const d = new Date();
              document.getElementById("payment_date").min = d.toISOString().split("T")[0];
            </script>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label for="payment_mode" class="form-label">Payment Mode</label>
            <select class="form-select" id="payment_mode" name="payment_mode" >
              <option selected disabled>Select</option>
              <option value="Cash" class="text-dark">Cash</option>
              <option value="Card" class="text-dark">Card</option>
              <option value="Online Transfer" class="text-dark">Online Transfer</option>
              <option value="UPI" class="text-dark">UPI</option>
            </select>
          </div>
          <div class="col-md-4">
            <label for="student_paid" class="form-label">Paid Amount</label>
    <input type="number" class="form-control p-2" id="student_paid" name="student_paid" max="15000" >
  </div>
        </div>
         <div class="col-md-4">
        <label for="balance" class="form-label">Balance (₹)</label>
    <input type="number" class="form-control p-2" id="balance" name="balance" readonly>
  </div>
        <div class="text-center mt-4">
          <button type="submit" name="submit_fees" class="btn btn-primary">Submit Form</button>
          <button type="submit" name="get_student" class="btn btn-info text-white">Get Student</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  document.getElementById('student_paid').addEventListener('input', function () {
    const paid = parseInt(this.value) || 0;
    const total = 15000;
    const balance = total - paid;
    if (paid > total) {
      alert("Amount should not exceed ₹15,000");
      this.value = total;
      document.getElementById('balance').value = 0;
    } else {
      document.getElementById('balance').value = balance;
    }
  });
</script>






<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
          <!-- partial -->
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