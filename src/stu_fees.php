<?php
include './conn.php';

$student_name = $student_email = $standard = $school_fees = $stu_id = "";
$default_fees = 15000;
if (isset($_POST['get_student'])) {
    $stu_id = intval($_POST['stu_id']);

    $query = "SELECT stu_name, stu_standard, stu_email, school_fees FROM student_admission WHERE stu_id = $stu_id";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $student_name = $row['stu_name'];
        $student_email = $row['stu_email'];
        $standard = $row['stu_standard'];
        $school_fees = $row['school_fees'];
    } else {
        echo "<script>alert('Student ID not found');</script>";
    }
}

if (isset($_POST['submit_fees'])) {
    $stu_id = intval($_POST['stu_id']);
    $student_name = trim($_POST['student_name']);
    $student_email = trim($_POST['student_email']);
    $standard = trim($_POST['standard']);
    $fees_type = trim($_POST['fees_type']);
    $amount = (int) $_POST['amount'];
    $payment_date = $_POST['payment_date'];
    $payment_mode = trim($_POST['payment_mode']);
    $student_paid = (int) $_POST['student_paid'];
    $balance = (int) $_POST['balance'];

    $check_sql = "SELECT * FROM student_fees WHERE stu_id = ? AND fees_type = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("is", $stu_id, $fees_type);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Fees already submitted for this student and type.');</script>";
    } else {
        $insert_sql = "INSERT INTO student_fees (stu_id, student_name, student_email, standard, fees_type, amount, payment_date, payment_mode, student_paid, balance_amount) 
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($insert_sql);
        $stmt->bind_param("isssssissi", $stu_id, $student_name, $student_email, $standard, $fees_type, $amount, $payment_date, $payment_mode, $student_paid, $balance);

        if ($stmt->execute()) {
            echo "<script>alert('Fees submitted successfully'); window.location.href='stu_vfees.php';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
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
          <li class="nav-item"> <a class="nav-link" href="">Fees</a></li>
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

<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
 <!-- School Fees Payment Form (Centered) -->
<div class="container d-flex justify-content-end align-items-center" style="min-height: 85vh;">
  <div class="col-md-10">
    <div class="card p-4 ">
      <h2 class="mb-4 text-center col-md-8">Student Fees Form</h2>
      <form method="POST" action="" enctype="multipart/form-data">

        <!-- Student ID Row -->
        <div class="row mb-3">
          <div class="col-md-3">
            <label for="stu_id" class="form-label">Student ID</label>
            <input type="number" class="form-control p-2" id="stu_id" name="stu_id" value="<?= $stu_id ?>">
          </div>
          <div class="col-md-2 d-flex align-items-end">
            <button type="submit" name="get_student" class="btn btn-info text-white w-100 p-2 " Required>Search</button>
          </div>
        </div>

        <!-- Name and Standard -->
        <div class="row mb-3">
          <div class="col-md-4">
            <label for="student_name" class="form-label">Student Name</label>
            <input type="text" class="form-control p-2" id="student_name"  name="student_name" value="<?= $student_name ?>">
          </div>
          <div class="col-md-4">
            <label for="standard" class="form-label">Standard</label>
            <input type="text" class="form-control p-2" id="standard"  name="standard" value="<?= $standard ?>">
          </div>
        </div>

        <!-- Fees Type & Payment Mode -->
        <div class="row mb-3">
          <div class="col-md-4">
            <label for="fees_type" class="form-label">Fees Type</label>
            <select class="form-select p-2" id="fees_type" name="fees_type" Required>
              <option selected disabled>Select</option>
              <option class="text-dark" value="Tuition">School</option>
            </select>
          </div>
          <div class="col-md-4">
            <label for="payment_mode" class="form-label">Payment Mode</label>
            <select class="form-select p-2" id="payment_mode" name="payment_mode" Required>
              <option selected disabled>Select</option>
              <option value="Cash" class="text-dark">Cash</option>
              <option value="Card" class="text-dark">Card</option>
              <option value="Online Transfer" class="text-dark">Online Transfer</option>
              <option value="UPI" class="text-dark">UPI</option>
            </select>
          </div>
        </div>

        <!-- Total Amount & Payment Date -->
        <div class="row mb-3">
          <div class="col-md-4">
            <label for="amount" class="form-label">Total Amount (₹)</label>
            <input type="number" class="form-control p-2" id="amount"  name="amount" value="<?= $school_fees ?>">
          </div>
          <div class="col-md-4">
            <label for="payment_date" class="form-label">Payment Date</label>
            <input type="date" class="form-control p-2"  id="payment_date" name="payment_date">
            <script>
              const d = new Date();
              document.getElementById("payment_date").min = d.toISOString().split("T")[0];
            </script>
          </div>
        </div>

        <!-- Paid & Balance -->
        <div class="row mb-3">
          <div class="col-md-4">
            <label for="student_paid" class="form-label">Paid Amount (₹)</label>
            <input type="number" class="form-control p-2"  id="student_paid" name="student_paid" max="15000">
          </div>
          <div class="col-md-4">
            <label for="balance" class="form-label">Balance (₹)</label>
            <input type="number" class="form-control p-2"  id="balance" name="balance" readonly>
          </div>
        </div>

        <!-- Submit -->
        <div class="col-md-8 text-center mt-4">
          <button type="submit" name="submit_fees" class="btn btn-primary px-4 py-2">Submit Form</button>
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
 
  document.querySelector("form").addEventListener("submit", function (e) {
    const stuId = document.getElementById("stu_id").value.trim();
    const name = document.getElementById("student_name").value.trim();
    const email = document.getElementById("student_email").value.trim();
    const standard = document.getElementById("standard").value.trim();
    const feesType = document.getElementById("fees_type").value;
    const totalAmount = parseFloat(document.getElementById("amount").value) || 0;
    const paymentDate = document.getElementById("payment_date").value;
    const paymentMode = document.getElementById("payment_mode").value;
    const paidAmount = parseFloat(document.getElementById("student_paid").value) || 0;

    // Email pattern
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (stuId === "") {
      alert("Please enter Student ID.");
      e.preventDefault();
      return;
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