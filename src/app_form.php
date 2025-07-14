<?php
include "./conn.php";

$upload_dir = "uploads/"; // Make sure this folder exists and is writable

if (isset($_POST['submit'])) {

    // Get all form data
    $academic_year = $_POST['academic_year'];
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
    $stu_blood = $_POST['stu_blood'];

    // Upload file function
    function uploadFile($key) {
        global $upload_dir;
        if (isset($_FILES[$key]) && $_FILES[$key]['error'] === 0) {
            $filename = time() . '_' . basename($_FILES[$key]['name']);
            $targetPath = $upload_dir . $filename;
            if (move_uploaded_file($_FILES[$key]['tmp_name'], $targetPath)) {
                return $filename;
            }
        }
        return '';
    }

    // Handle file uploads
    $file_aadhar     = uploadFile('stu_aadhar');
    $file_photo      = uploadFile('stu_photo');
    $file_community  = uploadFile('stu_community');
    $file_pan        = uploadFile('stu_pan');
    $file_tc         = uploadFile('transfercertificate');
    $file_marksheet  = uploadFile('marksheet');

    // Step 1: Insert data without student_id (it will be added after)
    $insert = "INSERT INTO student_admission (
        stu_name, stu_email, stu_dob, stu_age, stu_gender,
        stu_address, stu_city, stu_state, stu_pincode,
        stu_mother, stu_father, stu_mobile, stu_admission,
        stu_standard, stu_blood, stu_aadhar, stu_photo,
        stu_community, stu_pan, stu_tc, stu_marksheet,
        academic_year
    ) VALUES (
        '$stu_name', '$stu_email', '$stu_dob', '$stu_age', '$stu_gender',
        '$stu_address', '$stu_city', '$stu_state', '$stu_pincode',
        '$stu_mother', '$stu_father', '$stu_mobile', '$stu_admission',
        '$stu_standard', '$stu_blood', '$file_aadhar', '$file_photo',
        '$file_community', '$file_pan', '$file_tc', '$file_marksheet',
        '$academic_year'
    )";

   if ($conn->query($insert) === TRUE) {
    $last_id = $conn->insert_id; 

    $student_id = 'PEA' . str_pad($last_id, 3, '0', STR_PAD_LEFT); 

    $conn->query("UPDATE student_admission SET student_id = '$student_id' WHERE stu_id = $last_id");

    echo "<script>alert('Student saved with ID: $student_id');";
}
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../src./assets/images/ps.png" type="image/png">
    <link href="../src./assets/images/ps.png" rel="apple-touch-icon">
    <title>Student Application</title>
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
    
     <style type="text/css">
    .text-danger {
      font-size: 0.875rem;
    }
    select.form-select,
    select.form-select option {
  color: #212529 !important; /* Bootstrap's default dark color */
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
<!----------------------------------------------Admission Form------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="container mt-5 mb-5">
  <div class="bg-white p-5 shadow rounded text-black">
    <h2 class="text-center mb-4">Student Enrollment</h2>
    <form id="enrollmentForm" method="POST" enctype="multipart/form-data" novalidate>

      <!-- Academic Year -->
      <div class="row mb-3">
        <div class="col-md-4">
          <label for="academic_year" class="form-label">Academic Year</label>
          <select class="form-select" id="academic_year" name="academic_year" required>
            <option value="" disabled selected>Select</option>
            <option value="2025-2026">2025-2026</option>
          </select>
          <div class="text-danger"></div>
        </div>
      </div>

      <!-- Name, Mother, Pincode -->
      <div class="row mb-3">
        <div class="col-md-4">
          <label for="stu_name" class="form-label">Full Name</label>
          <input type="text" class="form-control" id="stu_name" pattern="[A-Za-z\s]+" name="stu_name" required>
          <div class="text-danger"></div>
        </div>
        <div class="col-md-4">
          <label for="stu_mother" class="form-label">Mother Name</label>
          <input type="text" class="form-control" id="stu_mother" name="stu_mother" required>
          <div class="text-danger"></div>
        </div>
        <div class="col-md-4">
          <label for="stu_pincode" class="form-label">Pincode</label>
          <input type="text" class="form-control" id="stu_pincode" name="stu_pincode" pattern="\d{6}" maxlength="6" required>
          <div class="text-danger"></div>
        </div>
      </div>

      <!-- Email, Father, Aadhar -->
      <div class="row mb-3">
        <div class="col-md-4">
          <label for="stu_email" class="form-label">Email</label>
          <input type="email" class="form-control" id="stu_email" name="stu_email" required>
          <div class="text-danger"></div>
        </div>
        <div class="col-md-4">
          <label for="stu_father" class="form-label">Father Name</label>
          <input type="text" class="form-control" id="stu_father" name="stu_father" required>
          <div class="text-danger"></div>
        </div>
        <div class="col-md-4">
          <label for="stu_aadhar" class="form-label">Aadhar Card</label>
          <input type="file" class="form-control" id="stu_aadhar" name="stu_aadhar" required accept=".pdf,.jpg,.jpeg,.png">
          <div class="text-danger"></div>
        </div>
      </div>

      <!-- DOB, Mobile, Photo -->
      <div class="row mb-3">
        <div class="col-md-4">
          <label for="stu_dob" class="form-label">Date of Birth</label>
          <input type="date" class="form-control" id="stu_dob" name="stu_dob" required>
          <div class="text-danger"></div>
        </div>
        <div class="col-md-4">
          <label for="stu_mobile" class="form-label">Mobile Number</label>
          <input type="tel" class="form-control" id="stu_mobile" name="stu_mobile" required pattern="\d{10}">
          <div class="text-danger"></div>
        </div>
        <div class="col-md-4">
          <label for="stu_photo" class="form-label">Student Photo</label>
          <input type="file" class="form-control" id="stu_photo" name="stu_photo" required accept=".jpg,.jpeg,.png">
          <div class="text-danger"></div>
        </div>
      </div>

      <!-- Age, Address, Admission -->
      <div class="row mb-3">
        <div class="col-md-4">
          <label for="stu_age" class="form-label">Age</label>
          <input type="number" class="form-control" id="stu_age" name="stu_age" max="50" required>
          <div class="text-danger"></div>
        </div>
        <div class="col-md-4">
          <label for="stu_address" class="form-label">Address</label>
          <input type="text" class="form-control" id="stu_address" name="stu_address" required>
          <div class="text-danger"></div>
        </div>
        <div class="col-md-4">
          <label for="stu_admission" class="form-label">Admission Date</label>
          <input type="date" class="form-control" id="stu_admission" name="stu_admission" required>
          <div class="text-danger"></div>
        </div>
      </div>

      <!-- Gender, City, Community -->
      <div class="row mb-3">
        <div class="col-md-4">
          <label for="stu_gender" class="form-label">Gender</label>
          <select class="form-select" id="stu_gender" name="stu_gender" required>
            <option value="" disabled selected>Select</option>
            <option>Male</option>
            <option>Female</option>
            <option>Others</option>
          </select>
          <div class="text-danger"></div>
        </div>
        <div class="col-md-4">
          <label for="stu_city" class="form-label">City</label>
          <input type="text" class="form-control" id="stu_city" name="stu_city" required>
          <div class="text-danger"></div>
        </div>
        <div class="col-md-4">
          <label for="stu_community" class="form-label">Community Certificate</label>
        <input type="file" class="form-control" id="stu_community" name="stu_community" accept=".pdf,.jpg,.jpeg,.png" required>
          <div class="text-danger"></div>
        </div>
      </div>

      <!-- Blood, State, PAN -->
      <div class="row mb-3">
        <div class="col-md-4">
          <label for="stu_blood" class="form-label">Blood Group</label>
<select class="form-select" id="stu_blood" name="stu_blood" required>
  <option value="">Select </option>
  <option value="A+">A+</option>
  <option value="A-">A−</option>
  <option value="B+">B+</option>
  <option value="B-">B−</option>
  <option value="O+">O+</option>
  <option value="O-">O−</option>
  <option value="AB+">AB+</option>
  <option value="AB-">AB−</option>
</select>
<div class="text-danger" id="bloodError"></div>
        </div>
        <div class="col-md-4">
          <label for="stu_state" class="form-label">State</label>
          <input type="text" class="form-control" id="stu_state" name="stu_state" required>
          <div class="text-danger"></div>
        </div>
        <div class="col-md-4">
          <label for="stu_pan" class="form-label">PAN Card</label>
         <input type="file" class="form-control" id="stu_pan" name="stu_pan" accept=".pdf,.jpg,.jpeg,.png" required>

          <div class="text-danger"></div>
        </div>
      </div>

      <!-- Standard -->
      <div class="row mb-3">
        <div class="col-md-4">
          <label for="standard" class="form-label">School Standard</label>
          <select class="form-select" id="standard" name="standard" required onchange="toggleInputBox(this)">
            <option value="" disabled selected>Select</option>
            <option value="pre kg">Pre KG</option>
            <option value="lkg">LKG</option>
            <option value="ukg">UKG</option>
            <option value="I">I</option>
            <option value="II">II</option>
            <option value="III">III</option>
            <option value="IV">IV</option>
            <option value="V">V</option>
            <option value="VI">VI</option>
            <option value="VII">VII</option>
            <option value="VIII">VIII</option>
            <option value="IX">IX</option>
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
          </select>
          <div class="text-danger"></div>
        </div>
        <!-- Transfer Certificate Upload -->
  <div class="col-md-4"  id="transferCertificate" style="display: none;">
    <label for="transfercertificate" class="form-label">Transfer Certificate</label>
    <input type="file" class="form-control" id="transfercertificate" name="transfercertificate" accept=".pdf,.jpg,.jpeg,.png">
    <div class="text-danger"></div>
</div>

<!-- Marksheet Upload -->
<div class="col-md-4 mb-3 " id="markSheet" style="display: none;">
    <label for="marksheet" class="form-label">Marksheet</label>
    <input type="file" class="form-control" id="marksheet" name="marksheet" accept=".pdf,.jpg,.jpeg,.png">
    <div class="text-danger"></div>
</div>
  </div>

      <!-- Submit Buttons -->
  <div class="text-center mt-4">
  <button type="submit" class="btn btn-primary" name="submit"
    style="background-color: rgb(27, 112, 196); border: none; border-radius: 0;">
    Save
  </button>

  <button type="reset" class="btn btn-danger text-white"
    style="border-radius: 0;">
    Reset
  </button>
</div>

    </form>
  </div>
</div>

<!-- Validation Script -->
<script>
 document.getElementById("enrollmentForm").addEventListener("submit", function (e) {
  const form = e.target;
  let valid = true;
  const fields = form.querySelectorAll("input, select");

  form.querySelectorAll(".text-danger").forEach(el => el.textContent = "");

  fields.forEach(field => {
    const errorDiv = field.parentElement.querySelector(".text-danger");

    if (field.hasAttribute("required") && !field.value.trim() && field.type !== "file") {
      errorDiv.textContent = "This field is required.";
      valid = false;
    } else if (field.name === "stu_email" && field.value) {
      const pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
      if (!pattern.test(field.value)) {
        errorDiv.textContent = "Enter a valid email.";
        valid = false;
      }
    } else if (field.name === "stu_mobile" && field.value) {
      if (!/^\d{10}$/.test(field.value)) {
        errorDiv.textContent = "Enter 10-digit mobile number.";
        valid = false;
      }
    } else if (field.name === "stu_pincode" && field.value) {
      if (!/^\d{6}$/.test(field.value)) {
        errorDiv.textContent = "Enter 6-digit pincode.";
        valid = false;
      }
    } else if (field.type === "file" && field.hasAttribute("required") && field.files.length === 0) {
      errorDiv.textContent = "Please upload a file.";
      valid = false;
    } else if (field.name === "stu_pan" && field.files.length > 0) {
      const allowedTypes = ['application/pdf', 'image/jpeg', 'image/jpg', 'image/png'];
      if (!allowedTypes.includes(field.files[0].type)) {
        errorDiv.textContent = "Only PDF, JPG, or PNG files allowed.";
        valid = false;
      }
    }
  });

  if (!valid) {
    e.preventDefault();
  }
});



function toggleInputBox(selectElement) {
  const inputBox = document.getElementById("transferCertificate");
  const additionalBox = document.getElementById("markSheet");

  const transferInput = document.getElementById("transfercertificate");
  const marksheetInput = document.getElementById("marksheet");

  const selectedValue = selectElement.value.toUpperCase(); // Ensure match with Roman numerals

  const requiresTransfer = [
    "UKG", "I", "II", "III", "IV", "V", 
    "VI", "VII", "VIII", "IX", "X", "XI", "XII"
  ];

  const requiresAdditional = ["XI", "XII"];

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