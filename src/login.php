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
        if ($result->num_rows === 1) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'employee';
            header("Location: emp_d.php");
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
            header("Location: studentd.php");
            exit;
        } else {
            echo "<script>alert('Invalid Student');</script>";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color:rgba(222, 228, 234, 0.97);
      font-family: 'Segoe UI', sans-serif;
    }

    .card {
      width: 100%;
      max-width: 320px;
      border: none;
      box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }

    /* Username & password: dark border */
    .form-control {
      border: 1px solid #212529 !important;
    }

    /* Remove blue outline on input focus */
    .form-control:focus {
      outline: none !important;
      box-shadow: none !important;
      border-color: #212529 !important;
    }
    .form-select:focus{
      outline:none !important;
       box-shadow: none !important;
      border-color: #212529 !important;
    }

    /* Colored radio buttons when selected */
    .btn-check:checked + .btn-outline-primary {
      background-color: #0d6efd;
      color: white;
    }

    .btn-check:checked + .btn-outline-success {
      background-color: #198754;
      color: white;
    }

    .btn-check:checked + .btn-outline-danger {
      background-color: #dc3545;
      color: white;
    }

    /* Remove glow/border for all buttons */
    .btn {
      box-shadow: none !important;
    }
  </style>
</head>
<body>
  <div class="container vh-100 d-flex align-items-center justify-content-center">
    <div class="card">
      <h4 class="text-center mb-4">Login</h4>

      <form method="POST" action="">
        <!-- User Type -->
       <div class="mb-3">
  <label for="user_type" class="form-label">Role</label>
  <select class="form-select" id="user_type" name="user_type" required>
    <option value="" disabled selected>Select Role</option>
    <option value="admin">Admin</option>
    <option value="employee">Employee</option>
    <option value="student">Student</option>
  </select>
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

        <!-- Login Button -->
        <div class="d-flex mb-3 justify-content-center">
          <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
        </div>

        <!-- Sign Up -->
        <div class="text-center">
          <small>Don't have an account? <a href="#" class="text-decoration-none">Sign up</a></small>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
