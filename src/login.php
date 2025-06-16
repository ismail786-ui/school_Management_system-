<?php
session_start();
include 'conn.php';

if (isset($_POST['login'])) {
    $username = $_POST['admin_username'];
    $password = $_POST['admin_password'];
    $user_type = $_POST['user_type'];

    if ($user_type === 'admin') {
        $sql = "SELECT * FROM master_admin WHERE admin_user='$username' AND admin_password='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows === 1) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'admin';
            header("Location: index.php");
            exit;
        } else {
            echo "<script>alert('Invalid Admin');</script>";
        }
    }

    if ($user_type === 'employee') {
        $sql = "SELECT * FROM employee_login WHERE emp_user='$username' AND emp_pass='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'employee';
            header("Location: emp_dashboard.php");
            exit;
        } else {
            echo "<script>alert('Invalid Employee');</script>";
        }
    }

    if ($user_type === 'student') {
        $sql = "SELECT * FROM student_login WHERE stu_user='$username' AND stu_pass='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows === 1) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'student';
            header("Location: stu_dashboard.php");
            exit;
        } else {
            echo "<script>alert('Invalid Student');</script>";
        }
    }
}

$conn->close();
?>


<!-- HTML START -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #eaf2ff;
    }
  </style>
</head>
<body>
  <div class="container mt-5 d-flex justify-content-center">
    <div class="bg-white p-5 shadow rounded" style="width: 100%; max-width: 400px;">
      <h3 class="text-center mb-4">Login</h3>
      <!-- Radio buttons -->
      <form method="POST" action="">
         <div class="mb-4">
    <label class="form-label">User Type</label><br>
    <div class="form-check form-check-inline mt-3">
      <input class="form-check-input" type="radio" name="user_type" id="admin" value="admin" required>
      <label class="form-check-label" for="admin">Admin</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="user_type" id="employee" value="employee">
      <label class="form-check-label" for="employee">Employee</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="user_type" id="student" value="student">
      <label class="form-check-label" for="student">Student</label>
    </div>
  </div>

        <!-- Username -->
       <div class="mb-3">
    <label for="admin_username" class="form-label">Username</label>
    <input type="text" class="form-control" id="admin_username" name="admin_username" required>
  </div>

         <!-- Password -->
  <div class="mb-3">
    <label for="admin_password" class="form-label">Password</label>
    <input type="password" class="form-control" id="admin_password" name="admin_password" required>
  </div>
        <!-- Submit Button -->
         <div class="d-grid">
    <button type="submit" name="login" class="btn btn-primary">Login</button>
  </div>
      </form>
    </div>
  </div>
</body>
</html>










