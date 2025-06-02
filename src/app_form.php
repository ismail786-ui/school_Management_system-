<?php
include "./conn.php";

if (isset($_POST['submit'])) {
    // Collect form data
    $stu_name = $_POST['stu_name'];
    $stu_email = $_POST['stu_email'];
    $stu_dob = $_POST['stu_dob'];
    $stu_age = $_POST['stu_age'];
    $stu_gender = $_POST['stu_gender'];
    $stu_address = $_POST['stu_address'];
    $stu_city = $_POST['stu_city'];
    $stu_state = $_POST['stu_state'];
    $stu_pincode = $_POST['stu_pincode'];
    $stu_mother = $_POST['stu_mother'];
    $stu_father = $_POST['stu_father'];
    $stu_mobile = $_POST['stu_mobile'];
    $stu_admission = $_POST['stu_admission'];
    $stu_standard = $_POST['standard'];

$upload_dir = "uploads/";

$stu_aadhar = $_FILES['stu_aadhar']['name'];
move_uploaded_file($_FILES['stu_aadhar']['tmp_name'], $upload_dir . $stu_aadhar);

$stu_photo = $_FILES['stu_photo']['name'];
move_uploaded_file($_FILES['stu_photo']['tmp_name'], $upload_dir . $stu_photo);

// Optional fields
$stu_tc = '';
if (isset($_FILES['transfercertificate']) && $_FILES['transfercertificate']['error'] === 0) {
    $stu_tc = $_FILES['transfercertificate']['name'];
    move_uploaded_file($_FILES['transfercertificate']['tmp_name'], $upload_dir . $stu_tc);
}

$stu_marksheet = '';
if (isset($_FILES['marksheet']) && $_FILES['marksheet']['error'] === 0) {
    $stu_marksheet = $_FILES['marksheet']['name'];
    move_uploaded_file($_FILES['marksheet']['tmp_name'], $upload_dir . $stu_marksheet);
}


    // Insert into DB
    $sql = "INSERT INTO student_admission (
        stu_name, stu_email, stu_dob, stu_age, stu_gender, stu_address,
        stu_city, stu_state, stu_pincode, stu_mother, stu_father, stu_mobile,
        stu_aadhar, stu_photo, stu_admission, stu_standard, stu_tc, stu_marksheet
    ) VALUES (
        '$stu_name', '$stu_email', '$stu_dob', '$stu_age', '$stu_gender', '$stu_address',
        '$stu_city', '$stu_state', '$stu_pincode', '$stu_mother', '$stu_father', '$stu_mobile',
        '$stu_aadhar', '$stu_photo', '$stu_admission', '$stu_standard', '$stu_tc', '$stu_marksheet'
    )";

    if ($conn->query($sql) === TRUE) {
        echo "<script>window.location.href='app_vform.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
        <h4 class='p-2 bg-success ml-5 mt-2 '>Application Form</h4>
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
<!---------------------------------------------------------------------------------------------------------------->
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
          <li class="nav-item"><a class="nav-link" href="./staf_form.php">Staff Form</a></li>
          <li class="nav-item"><a class="nav-link" href="./staff_view.php">Staff View</a></li>
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
          <li class="nav-item"> <a class="nav-link" href="./app_form.php">Information</a></li>
          <li class="nav-item"> <a class="nav-link" href="./app_form.php">Syllabus</a></li>
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
<!----------------------------------------------Admission Form------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
 <div class="container mt-5 mb-5 ">
    <div class="bg-white p-5 shadow rounded text-black">
      <h2 class="mb-4 text-center">Admission Form</h2>
      <form action="app_form.php" method="POST" enctype="multipart/form-data">
       <!-- Name and Email -->
        <div class="row mb-3">
          <div class="col-md-4">
             <label for="stu_name" class="form-label">Full Name</label>
          <input type="text" class="form-control" id="stu_name" name="stu_name" required>
          </div>
          <div class="col-md-4">
             <label for="stu_email" class="form-label">Email</label>
          <input type="email" class="form-control" id="stu_email" name="stu_email" required>
          </div>
           <div class="col-md-4">
            <label for="stu_dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="stu_dob" name="stu_dob" required>
          </div>
        </div>     
        <!--Age,Gender,Address -->
<!---------------------------------------------------------------------------->
         <div class="row mb-3">   
          <div class="col-md-4">
            <label for="stu_age" class="form-label">Age</label>
            <input type="number" class="form-control" id="stu_age" name="stu_age" max="50" required>
          </div>
           <div class="col-md-4">
           <label for="stu_gender" class="form-label">Gender</label>
            <select class="form-select text-dark p-3" id="stu_gender" name="stu_gender" required>
              <option selected disabled>Select</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
        </div>  
           <div class="col-md-4">
          <label for="stu_address" class="form-label">Address</label>
          <input type="text" class="form-control" id="stu_address" name="stu_address" required>
          </div>
        </div>
<!---------------------------------------------------------------------------->
          <div class="row mb-3">
          <div class="col-md-4">
            <label for="stu_city" class="form-label">City</label>
            <input type="text" class="form-control" id="stu_city" name="stu_city" required>
          </div>
          <div class="col-md-4">
            <label for="stu_state" class="form-label">State</label>
            <input type="text" class="form-control" id="stu_state" name="stu_state" required>
          </div>
          <div class="col-md-4">
            <label for="stu_pincode" class="form-label">Pincode</label>
            <input type="text" class="form-control" id="stu_pincode" name="stu_pincode" maxlength="6" required>
          </div>
        </div>
<!--------------------------------------------------------------------------------------------------------------->
        <div class="row mb-3">
          <div class="col-md-4">
            <label for="stu_mother" class="form-label">Mother Name</label>
            <input type="text" class="form-control" id="stu_mother" name="stu_mother" required>
          </div>
          <div class="col-md-4">
            <label for="stu_father" class="form-label">Father Name</label>
            <input type="text" class="form-control" id="stu_father" name="stu_father" required>
          </div>
          <div class="col-md-4">
            <label for="stu_mobile" class="form-label">Mobile Number</label>
            <input type="text" class="form-control" id="stu_mobile" name="stu_mobile"maxlength="10" required>
          </div>
        </div>
<!------------------------------------------------------------------------------------------------------------>
<!--------------------Admission,Photo,certificate-------------------------->
          <div class="row mb-3">
         <div class="col-md-4">
           <label for="stu_aadhar" class="form-label">Aadhar Card</label>
          <input class="form-control" type="file" id="stu_aadhar" name="stu_aadhar" required accept=".pdf, .doc, .docx, .jpg, .jpeg, .png">
          </div>
          <div class="col-md-4">
           <label for="stu_photo" class="form-label">Student Photo</label>
          <input class="form-control" type="file" id="stu_photo" name="stu_photo" accept=".pdf, .doc, .docx, .jpg, .jpeg, .png" required>
          </div>
          <div class="col-md-4">
        <label for="stu_admission" class="form-label">Admission Date</label>
        <input type="date" class="form-control" id="stu_admission" name="stu_admission" required>
      </div>
 
        </div>
<!--------------------------------------------------------------------------------------------------------->
 <div class="row mb-3">
  <div class="col-md-4">
    <label for="standard" class="form-label ">School Standard</label>
    <select id="standard" class="form-select text-dark p-3" name="standard" onchange="toggleInputBox(this)">
      <option selected disabled>Select</option>
      <option value="Pre Kg">Pre Kg</option>
      <option value="Lkg">Lkg</option>
      <option value="ukg">Ukg</option>
      <option value="first">First</option>
      <option value="second">Second</option>
      <option value="third">Third</option>
      <option value="fourth">Fourth</option>
      <option value="fifth">Fifth</option>
      <option value="sixth">Sixth</option>
      <option value="seventh">Seventh</option>
      <option value="eighth">Eighth</option>
      <option value="ninth">Ninth</option>
      <option value="tenth">Tenth</option>
      <option value="eleventh">Eleventh</option>
      <option value="twelfth">Twelfth</option>
    </select>
  </div>

  <div class="col-md-4">
    <div id="transferCertificate" style="display:none;">
      <label for="transfercertificate" class="form-label">Transfer Certificate</label>
      <input class="form-control" type="file" id="transfercertificate" required name="transfercertificate"accept=".pdf, .doc, .docx, .jpg, .jpeg, .png">
    </div>
    </div>
    <div class="col-md-4">
    <div id="markSheet" style="display:none;">
    <label for="marksheet" class="form-label">Marksheet</label>
    <input class="form-control" type="file" id="marksheet" name="marksheet" required accept=".pdf, .doc, .docx, .jpg, .jpeg, .png">
    </div>
  </div>
<!---------------------------------------------------------------------------------------------------------------------------------------------->
    <!---Submit button -->
    <div class="col-lg-12 mt-5 text-center">
    <button type="submit" name="submit" class="btn btn-primary">Save</button>
    <!-- <button type="reset" name="reset" class="btn btn-danger text-white">Reset</button> -->
    </div>  
    </form>
    </div>
  </div>

<script>
  function toggleInputBox(selectElement) {
    const inputBox = document.getElementById("transferCertificate");
    const additionalBox = document.getElementById("markSheet");

    const transferInput = document.getElementById("transfercertificate");
    const marksheetInput = document.getElementById("marksheet");

    const requiresTransfer = [
      "ukg", "first", "second", "third", "fourth", "fifth",
      "sixth", "seventh", "eighth", "ninth", "tenth", "eleventh", "twelfth"
    ];

    const requiresAdditional = ["eleventh", "twelfth"];

    const selectedValue = selectElement.value.toLowerCase();

    // Toggle Transfer Certificate
    if (requiresTransfer.includes(selectedValue)) {
      inputBox.style.display = "block";
      transferInput.setAttribute("required", "required");
    } else {
      inputBox.style.display = "none";
      transferInput.removeAttribute("required");
    }

    // Toggle Marksheet
    if (requiresAdditional.includes(selectedValue)) {
      additionalBox.style.display = "block";
      marksheetInput.setAttribute("required", "required");
    } else {
      additionalBox.style.display = "none";
      marksheetInput.removeAttribute("required");
    }
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- ------------------------------------------------------------------------------- -->
<!--------------------------------------------------------------------------------------------------------->
        </div>