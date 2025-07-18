<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Your attendance saving logic here (if any)

    // After submitting, force reload without POST data
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="shortcut icon" href="../src./assets/images/ps.png" type="image/png">
    <link href="../src./assets/images/ps.png" rel="apple-touch-icon">
    <title>Student Attendance</title>
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
          <li class="nav-item"><a class="nav-link" href=".">Attendance</a>
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




<!-- Main Content -->
<div class="col-md-10">
  <div class="container mt-4 bg-white shadow-sm rounded p-4">
    
    <!-- Page Title -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
      <h3 class="mb-3 mb-md-0">📋 Student Attendance</h3>

<!-- Search Form -->
<form method="GET" class="d-flex align-items-center flex-wrap gap-2" role="search">
  <input
    type="text"
    name="search_class"
    id="search_class"
    class="form-control me-2 w-50"
    placeholder="e.g. 11-A"
    required
    style="border: 1px solid black; box-shadow: none; outline: none;height:44px;"
    this.style.boxShadow='none';
    onblur="this.style.outline='none';"
  >
  <button type="submit" class="btn btn-primary"
  style="background-color: rgb(27, 112, 196); border: none; border-radius: 0;">
  Search
</button>

  <!-- View Button -->
 
  <a href="student_viewattendance.php" class="btn btn-warning text-white" style=" border: none; border-radius: 0;">View </a>
</form>

    </div>

    <!-- Attendance Table -->
    <?php
    if (isset($_GET['search_class'])) {
      $class = $_GET['search_class'];
      $result = $conn->query("SELECT * FROM students WHERE class='$class'");
      if ($result->num_rows > 0) {
    ?>

    <form method="POST" action="student_submitattendance.php">
      <input type="hidden" name="staff_name" value="Shankar">
      <input type="hidden" name="class" value="<?= htmlspecialchars($class) ?>">

      <div class="mb-3 mt-3">
        <label><strong>Date:</strong></label>
        <input type="date" name="attendance_date" id="attendance_date" class="form-control w-25" required>
      </div>

      <!-- Table -->
      <div class="table-responsive">
        <table class="table table-bordered text-center align-middle">
          <thead class="table-primary">
            <tr>
              <th>👤 Student Name</th>
              <th>✅ Present</th>
              <th>❌ Absent</th>
              <th>🕒 OT</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 0; while ($row = $result->fetch_assoc()) { ?>
              <tr>
                <td class="text-start">
                  <input type="hidden" name="students[<?= $i ?>][id]" value="<?= $row['id'] ?>">
                  <input type="hidden" name="students[<?= $i ?>][name]" value="<?= $row['name'] ?>">
                  <?= htmlspecialchars($row['name']) ?>
                </td>
                <td>
                  <input type="checkbox" name="students[<?= $i ?>][attendance][]" value="Present" class="form-check-input attendance-checkbox" checked data-index="<?= $i ?>"  style="border:1px solid black;">
                </td>
                <td>
                  <input type="checkbox" name="students[<?= $i ?>][attendance][]" value="Absent" class="form-check-input attendance-checkbox" data-index="<?= $i ?>"  style="border:1px solid black;">
                </td>
                <td>
                  <input type="checkbox" name="students[<?= $i ?>][attendance][]" value="OT" class="form-check-input attendance-checkbox" data-index="<?= $i ?>"  style="border:1px solid black;">
                </td>
              </tr>
            <?php $i++; } ?>
          </tbody>
        </table>
      </div>

      <!-- Buttons -->
      <div class="text-center mt-3">
        <!-- <a href="student_viewattendance.php" class="btn text-white" style="background-color: rgb(27, 112, 196); border: none; border-radius: 0;" class="btn btn-warning text-white">View </a> -->
        <button type="submit" class="btn text-white" style="background-color: rgb(27, 112, 196); border: none; border-radius: 0;">Submit </button>
      </div>
    </form>

    <?php
      } else {
        echo "<div class='alert alert-danger w-25'>No students found for class <strong>" . htmlspecialchars($class) . "</strong>.</div>";
      }
    }
    ?>
  </div>
</div>





<script>
  // This ensures only one checkbox per row can be checked
  document.querySelectorAll('.attendance-checkbox').forEach((checkbox) => {
    checkbox.addEventListener('click', function () {
      const index = this.getAttribute('data-index');
      const allCheckboxes = document.querySelectorAll('.attendance-checkbox[data-index="' + index + '"]');
      allCheckboxes.forEach(cb => {
        if (cb !== this) cb.checked = false;
      });
    });
  });

  // Optional: Auto-fill today's date
  const today = new Date().toISOString().split('T')[0];
  const dateInput = document.getElementById("attendance_date");
  if (dateInput) {
    dateInput.setAttribute("min", today);
    dateInput.setAttribute("max", today);
    dateInput.value = today;
  }
</script>


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






