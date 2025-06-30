<?php
include './conn.php';

if (isset($_POST['update_fees'])) {
    $id = $_GET['sfedit'];

    // Fetch form inputs
    $name = $_POST['student_name'];
    $email = $_POST['student_email'];
    $standard = $_POST['standard'];
    $fees_type = $_POST['fees_type'];
    $payment_date = $_POST['payment_date'];
    $payment_mode = $_POST['payment_mode'];
    $old_paid = $_POST['student_paid'];
    $new_pay = $_POST['pay_amount'];

    // Fixed total fee
    $amount = 15000;

    // Calculate totals
    $total_paid = $old_paid + $new_pay;
    $new_balance = $amount - $total_paid;

    // Prevent overpayment
    if ($total_paid > $amount) {
        echo "<script>alert('Total paid amount exceeds total fees.'); window.history.back();</script>";
        exit;
    }

    // Update query
    $update_sql = "UPDATE student_fees SET 
        student_name = '$name',
        student_email = '$email',
        standard = '$standard',
        fees_type = '$fees_type',
        amount = '$amount',
        payment_date = '$payment_date',
        payment_mode = '$payment_mode',
        student_paid = '$total_paid',
        balance_amount = '$new_balance',
        total_paid = '$total_paid',
        newbalance = '$new_balance'
        WHERE sf_id = '$id'";

    if (mysqli_query($conn, $update_sql)) {
        echo "<script>alert('Record updated successfully'); window.location.href='stu_vfees.php';</script>";
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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


<!----------------------------------------------------------------------------------------------------------->
<div class="container mt-5 vh-100">
  <?php 
  include 'conn.php';

  if (isset($_GET['sfedit'])) {
      $id = intval($_GET['sfedit']); // sanitize input

      $sql = "SELECT * FROM student_fees WHERE sf_id = $id";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
  ?>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h2 class="text-center mb-4">Update Fees Form</h2>
      <form method="POST" action="" class="border p-4 rounded bg-white shadow-sm">
        <div class="row mb-3">
          <div class="col-md-6">
            <label>Name</label>
            <input type="text" name="student_name" class="form-control" value="<?= $row['student_name']; ?>" required>
          </div>
          <div class="col-md-6">
            <label>Email</label>
            <input type="email" name="student_email" class="form-control" value="<?= $row['student_email']; ?>" required>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label>Standard</label>
            <input type="text" name="standard" class="form-control" value="<?= $row['standard']; ?>" required>
          </div>
          <div class="col-md-6">
            <label>Fees Type</label>
            <input type="text" name="fees_type" class="form-control" value="<?= $row['fees_type']; ?>" required>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label>Total Fees (₹)</label>
            <input type="number" id="total_fees" class="form-control" value="15000" readonly>
            <input type="hidden" name="amount" value="15000">
          </div>
          <div class="col-md-6">
            <label>Paid Amount (₹)</label>
            <input type="number" id="paid_so_far" name="student_paid" class="form-control" value="<?= $row['student_paid']; ?>" readonly>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label>Payment Date</label>
          <input type="date" name="payment_date" class="form-control" value="<?= $row['payment_date']; ?>" required>

           
           
          </div>
          <div class="col-md-6">
            <label>Payment Mode</label>
            <input type="text" name="payment_mode" class="form-control" value="<?= $row['payment_mode']; ?>" required>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label>Remaining Balance (₹)</label>
            <input type="number" id="new_balance" class="form-control" value="" readonly>
            <input type="hidden" name="payment_balance" id="payment_balance" value="<?= $row['balance_amount']; ?>">
          </div>
          <div class="col-md-6">
            <label>New Pay Amount (₹)</label>
            <input type="number" name="pay_amount" id="pay_amount" class="form-control" max="15000" required>
          </div>
        </div>

        <div class="text-center">
          <button type="submit" name="update_fees" class="btn btn-success text-white px-4">Update</button>
          <button type="button" class="btn btn-warning text-white px-4"><a href="./stu_vfees.php" class="text-white text-decoration-none">View</a></button>
        </div>
      </form>
    </div>
  </div>
  <?php 
          }
      }
  }
  ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const payAmountInput = document.getElementById('pay_amount');
    const paidSoFarInput = document.getElementById('paid_so_far');
    const newBalanceInput = document.getElementById('new_balance');
    const paymentBalanceInput = document.getElementById('payment_balance');

    payAmountInput.addEventListener('input', function () {
        const totalFees = 15000;
        const paidSoFar = parseInt(paidSoFarInput.value) || 0;
        const newPay = parseInt(payAmountInput.value) || 0;
        const totalPaid = paidSoFar + newPay;
        const balance = totalFees - totalPaid;

        newBalanceInput.value = balance >= 0 ? balance : 0;
        paymentBalanceInput.value = newBalanceInput.value;
    });
});
</script>


</div>




<!------------------------------------------------------------------------------------------------------------->
       <!-- partial -->
        </div>
        <!-- main-panel ends -->
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