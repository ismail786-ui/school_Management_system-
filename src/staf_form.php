<?php
include "./conn.php";

if (isset($_POST['emp_submit'])) {

  
    // Collect input data
    $emp_name = $_POST['emp_name'];
    $emp_email = $_POST['emp_email'];
    $emp_dob = $_POST['emp_dob'];
    $emp_age = $_POST['emp_age'];
    $emp_gender = $_POST['emp_gender'];
    $emp_address = $_POST['emp_address'];
    $emp_city = $_POST['emp_city'];
    $emp_state = $_POST['emp_state'];
    $emp_pincode = $_POST['emp_pincode'];
    $emp_mother = $_POST['emp_mother'];
    $emp_father = $_POST['emp_father'];
    $emp_mobile = $_POST['emp_mobile'];
    $emp_experience = $_POST['emp_experience'];
    $emp_major = $_POST['emp_major'];
    $emp_types = $_POST['emp_types'];



    // File Uploads
    $upload_dir = "staff_files/";
    $emp_qualification = $_FILES['emp_qualification']['name'];
    $emp_photo = $_FILES['emp_photo']['name'];
    $emp_aadhar = $_FILES['emp_aadhar']['name'];
    $emp_bank = $_FILES['emp_bank']['name'];
    $emp_community = $_FILES['emp_community']['name'];
    $emp_ecertificate = $_FILES['emp_ecertificate']['name'];

    move_uploaded_file($_FILES['emp_qualification']['tmp_name'], $upload_dir . $emp_qualification);
    move_uploaded_file($_FILES['emp_photo']['tmp_name'], $upload_dir . $emp_photo);
    move_uploaded_file($_FILES['emp_aadhar']['tmp_name'], $upload_dir . $emp_aadhar);
    move_uploaded_file($_FILES['emp_bank']['tmp_name'], $upload_dir . $emp_bank);
    move_uploaded_file($_FILES['emp_community']['tmp_name'], $upload_dir . $emp_community);
    move_uploaded_file($_FILES['emp_ecertificate']['tmp_name'], $upload_dir . $emp_ecertificate);

    // Insert query
    $sql = "INSERT INTO employee_form (
        emp_name, emp_email, emp_dob, emp_age, emp_gender, emp_address,
        emp_city, emp_state, emp_pincode, emp_mother, emp_father, emp_mobile,
        emp_qualification, emp_photo, emp_aadhar, emp_bank,emp_experience,emp_ecertificate,emp_major,emp_types,emp_community
    ) VALUES (
        '$emp_name', '$emp_email', '$emp_dob', '$emp_age', '$emp_gender', '$emp_address',
        '$emp_city', '$emp_state', '$emp_pincode', '$emp_mother', '$emp_father', '$emp_mobile',
         '$emp_qualification', '$emp_photo', '$emp_aadhar', '$emp_bank','$emp_experience','$emp_ecertificate','$emp_major','$emp_types','$emp_community'
    )";

    if ($conn->query($sql) === TRUE) {
     echo "<script>alert('Record updated successfully');</script>";

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
       <link rel="shortcut icon" href="../src./assets/images/ps.png" type="image/png">
    <link href="../src./assets/images/ps.png" rel="apple-touch-icon">
    <title>Teacher Form</title>
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
      select.form-select,
      select.form-select option {
      color: #212529 !important;
     }
 
  .text-danger {
    color: red !important;
    font-size: 0.875rem;
    margin-top: 4px;
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
       <a class="nav-link m-4 text-white " href="">
        <h4 class='p-2 bg-success ml-5 mt-2 '>Teacher Enrollment</h4>
        </a>
      </li>
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
         <img src="../src./assets/images/login1.png" alt="Person" style="width:45px; height:45px;" class="">
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
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
          <li class="nav-item"><a class="nav-link" href="">Teacher Form</a></li>
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


<!------------------------------------------End bar ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
 <div class="container mt-5 mb-5 ">
  <div class="bg-white p-5 shadow rounded text-black">
    <h2 class="mb-4 text-center">Teachers Enrollment</h2>
    <form action="" method="POST" enctype="multipart/form-data" class="formcolor">
      <!-- Name and Email -->
      <div class="row mb-3">
        <div class="col-md-4">
          <label for="emp_name" class="form-label">Full Name</label>
         <input type="text" class="form-control" id="emp_name" name="emp_name">


          <div class="text-danger"></div>
        </div>
        <div class="col-md-4">
          <label for="emp_address" class="form-label">Address</label>
          <input type="text" class="form-control" id="emp_address" name="emp_address">
          <div class="text-danger"></div>
        </div>
        <div class="col-md-4">
          <label for="emp_aadhar" class="form-label">Qualification</label>
          <input type="file" class="form-control" id="emp_qualification"  name="emp_qualification" accept=".pdf, .doc, .docx, .jpg, .jpeg, .png">
          <div class="text-danger"></div>
        </div>
      </div>
      <!--Age,Gender,Address -->
      <div class="row mb-3">
        <div class="col-md-4">
          <label for="emp_email" class="form-label">Email</label>
          <input type="email" class="form-control" id="emp_email" name="emp_email" >
          
          <div class="text-danger"></div>
        </div>
        <div class="col-md-4">
          <label for="emp_city" class="form-label">City</label>
          <input type="text" class="form-control" id="emp_city" name="emp_city" >
          <div class="text-danger"></div>
        </div>
        <div class="col-md-4">
          <label for="emp_photo" class="form-label">Staff Photo</label>
          <input class="form-control" type="file" id="emp_photo"  name="emp_photo" accept=".doc, .docx,.jpg,.jpeg,.png">
          <div class="text-danger"></div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-4">
          <label for="emp_age" class="form-label">Age</label>
          <input type="number" class="form-control" id="emp_age" name="emp_age" max="99" >
          <div class="text-danger"></div>
        </div>
        <div class="col-md-4">
          <label for="emp_pincode" class="form-label">Pincode</label>
          <input type="text" class="form-control" id="emp_pincode" name="emp_pincode" maxlength="6" >
          <div class="text-danger"></div>
        </div>
        <div class="col-md-4">
          <label for="emp_aadhar" class="form-label">Aadhar Card</label>
          <input class="form-control" type="file" id="emp_aadhar"  name="emp_aadhar" accept=".doc, .docx, .jpg, .jpeg, .png">
          <div class="text-danger"></div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-4">
          <label for="emp_dob" class="form-label">Date of Birth</label>
          <input type="date" class="form-control" id="emp_dob" name="emp_dob">
          <div class="text-danger"></div>
        </div>
        <div class="col-md-4">
          <label for="emp_state" class="form-label">State</label>
          <input type="text" class="form-control" id="emp_state" name="emp_state" >
          <div class="text-danger"></div>
        </div>
        <div class="col-md-4">
          <label for="emp_bank" class="form-label">Bank Details</label>
          <input class="form-control" type="file" id="emp_bank"  name="emp_bank" accept=".pdf, .doc, .docx, .jpg, .jpeg, .png">
          <div class="text-danger"></div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-4">
          <label for="emp_gender" class="form-label">Gender</label>
          <select class="form-select text-dark p-3" id="emp_gender" name="emp_gender" >
            <option selected disabled>Select</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
             <option value="Others">Others</option>
          </select>
          <div class="text-danger"></div>
        </div>
        <div class="col-md-4">
          <label for="emp_mobile" class="form-label">Mobile Number</label>
          <input type="text" class="form-control" id="emp_mobile" name="emp_mobile" maxlength="10">
          <div class="text-danger"></div>
        </div>
        <div class="col-md-4">
          <label for="emp_community" class="form-label">Community</label>
          <input class="form-control" type="file" id="emp_community"  name="emp_community" accept=".pdf, .doc, .docx, .jpg, .jpeg, .png">
          <div class="text-danger"></div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-4">
          <label for="emp_mother" class="form-label">Mother Name</label>
          <input type="text" class="form-control" id="emp_mother" name="emp_mother" >
          <div class="text-danger"></div>
        </div>
        <div class="col-md-4">
          <label for="emp_major" class="form-label">Teacher Major</label>
          <input class="form-control" type="text" id="emp_major" name="emp_major">
          <div class="text-danger"></div>
        </div>
        <div class="col-md-4">
          <label for="experience" class="form-label">Experience</label>
          <select id="emp_experience" class="form-select text-dark p-3"  name="emp_experience" onchange="toggleExperienceInput(this)">
            <option selected disabled>Previous Experience</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select>
          <div class="text-danger"></div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-4">
          <label for="emp_father" class="form-label">Father Name</label>
          <input type="text" class="form-control" id="emp_father" name="emp_father" >
          <div class="text-danger"></div>
        </div>
        <div class="col-md-4">
          <label for="emp_types" class="form-label">Teacher Types</label>
          <select id="emp_types" class="form-select text-dark p-3"  name="emp_types">
            
            <option selected disabled>select</option>
            <option value="Primary level">Primary level</option>
            <option value="Secondary level">Secondary level</option>
            <option value="Senior secondary level">Senior secondary level</option>
            <option value="Professors">Professors</option>
          </select>
            <div class="text-danger"></div>
         
        </div>
        <div class="col-md-4" id="experienceDetail" style="display: none;">
          <label for="emp_ecertificate" class="form-label">Experience Certificates</label>
          <input type="file" class="form-control" id="emp_ecertificate" accept=".pdf,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" name="emp_ecertificate">
          <div class="text-danger"></div>
        </div>
      </div>
      <!---Submit button -->
      <div class="col-lg-12 mt-4 text-center">
        <button type="submit" class="btn btn-primary" name='emp_submit'
  style="background-color: rgb(27, 112, 196); border: none; border-radius: 0;">
  Save
</button>
          <button type="submit" class="btn btn-primary"
  style="background-color: rgb(240, 45, 49); border: none; border-radius: 0;">
  Reset
</button>
      </div>
    </form>
  </div>
</div>















<!-------------------------------------------Footer Start-------------------------------------------------------------->
                     <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">

</footer>
          <!-- partial -->
</div>












<script>
function toggleExperienceInput(select) {
  const expBox = document.getElementById("experienceDetail");
  const certInput = document.getElementById("emp_ecertificate");
  if (select.value === "Yes") {
    expBox.style.display = "block";
  } else {
    expBox.style.display = "none";
    certInput.value = "";
    certInput.parentElement.querySelector(".text-danger").textContent = "";
  }
}

document.querySelector("form").addEventListener("submit", function (e) {
  let valid = true;
  const form = e.target;
  const fields = form.querySelectorAll("input, select");

  // Clear previous error messages
  form.querySelectorAll(".text-danger").forEach(el => el.textContent = "");

  fields.forEach(field => {
    const name = field.name;
    const type = field.type;
    const tag = field.tagName.toLowerCase();
    const errorDiv = field.parentElement.querySelector(".text-danger");

    if (!errorDiv) return;

 
    if ((type === "text" || type === "email" || type === "number" || type === "date" || tag === "select") && field.value.trim() === "") {
      errorDiv.textContent = "This field is required.";
      valid = false;
      return;
    }

       if (name === "emp_name" && field.value.trim() !== "") {
      if (!/^[A-Za-z\s]+$/.test(field.value.trim())) {
        errorDiv.textContent = "Name should contain only letters.";
        valid = false;
      }
    }
    if (name === "emp_email" && field.value.trim() !== "") {
      const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,}$/;
      if (!emailPattern.test(field.value.trim())) {
        errorDiv.textContent = "Enter a valid email address.";
        valid = false;
      }
    }

    // --- Mobile number ---
    if (name === "emp_mobile" && field.value.trim() !== "") {
      if (!/^\d{10}$/.test(field.value.trim())) {
        errorDiv.textContent = "Enter a 10-digit mobile number.";
        valid = false;
      }
    }

    // --- Pincode ---
    if (name === "emp_pincode" && field.value.trim() !== "") {
      if (!/^\d{6}$/.test(field.value.trim())) {
        errorDiv.textContent = "Enter a 6-digit pincode.";
        valid = false;
      }
    }
    
        if (name === "emp_age" && field.value.trim() !== "") {
      if (!/^\d+$/.test(field.value.trim()) || parseInt(field.value) < 18 || parseInt(field.value) > 99) {
        errorDiv.textContent = "Enter a valid age (18–99).";
        valid = false;
      }
    }

    // --- File validation ---
    if (type === "file") {
      const isExperience = name === "emp_ecertificate";
      const expRequired = document.getElementById("emp_experience").value === "Yes";

      // Required file check
      if (field.files.length === 0 && (!isExperience || (isExperience && expRequired))) {
        errorDiv.textContent = "Please upload a file.";
        valid = false;
        return;
      }

      // Allowed file type check
      if (field.files.length > 0) {
        const file = field.files[0];
        const allowedTypes = [
          "application/pdf",
          "application/msword",
          "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
          "image/jpeg",
          "image/jpg",
          "image/png"
        ];
        if (!allowedTypes.includes(file.type)) {
          errorDiv.textContent = "Only PDF, Word, JPG, or PNG files allowed.";
          valid = false;
        }
      }
    }
  });

  // ✅ Gender validation
  const gender = document.getElementById("emp_gender");
  const genderError = gender.parentElement.querySelector(".text-danger");
  if (gender.selectedIndex === 0) {
    genderError.textContent = "Please select gender.";
    valid = false;
  }

  // ✅ Teacher type validation
  const teacherType = document.getElementById("emp_types");
  const typeError = teacherType.parentElement.querySelector(".text-danger");
  if (teacherType.selectedIndex === 0) {
    typeError.textContent = "Please select teacher type.";
    valid = false;
  }

  // ✅ Experience validation
  const expSelect = document.getElementById("emp_experience");
  const expError = expSelect.parentElement.querySelector(".text-danger");
  if (expSelect.selectedIndex === 0) {
    expError.textContent = "Please select experience option.";
    valid = false;
  }

  // ✅ Experience certificate required if Yes selected
  const expCert = document.getElementById("emp_ecertificate");
  const certError = expCert.parentElement.querySelector(".text-danger");
  if (expSelect.value === "Yes" && expCert.files.length === 0) {
    certError.textContent = "Please upload experience certificate.";
    valid = false;
  }

  if (!valid) e.preventDefault();
});
</script>











 <script>
  function toggleExperienceInput(select){
    var detailInput = document.getElementById("experienceDetail");
    if (select.value === "Yes") {
      detailInput.style.display = "block";
    } else {
      detailInput.style.display = "none";
    }
  }
</script>



         
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