<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap & Icons -->
   <link href="../asset./css/style_stu.css" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<style type="text/css">
    
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f6f9;
    }
    .sidebar {
      width: 250px;
      background: #343a40;
      position: fixed;
      height: 100%;
      padding-top: 20px;
      transition: all 0.3s ease;
    }
    .sidebar.collapsed {
      margin-left: -250px;
    }
    .sidebar a {
      color: #fff;
      padding: 15px 20px;
      display: block;
      text-decoration: none;
    }
    .sidebar a:hover, .sidebar a.active {
      background: #00d4ff;
      color: #000;
    }
    .main {
      margin-left: 250px;
      transition: all 0.3s ease;
      padding: 20px;
    }
    .main.expanded {
      margin-left: 0;
    }
    .navbar {
      background: #fff;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .card-box {
      padding: 20px;
      border-radius: 10px;
      color: #fff;
    }
    .toggle-btn {
      display: none;
    }
    @media (max-width: 768px) {
      .sidebar {
        position: absolute;
        z-index: 1000;
      }
      .toggle-btn {
        display: inline-block;
      }
    }
    </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <h5 class="text-center text-white mb-4">Student Panel</h5>
    <a href="#" class=""><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
    <a href="./stu_detail.php"><i class="bi bi-person me-2"></i>Student Details</a>
    <a href="./syllabus_view.php"><i class="bi bi-book me-2"></i></i> Syllabus</a>
    <a href="./ques_view.php"><i class="bi bi-calendar2-check me-2"></i>Question</a>
    <a href="./stu_payment.php"><i class="bi bi-cash me-2"></i> Payments</a>
    <a href="login.php"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
  </div>

  <!-- Main Content -->
  <div class="main" id="mainContent">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light mb-4">
      <div class="container-fluid">
        <button class="btn btn-outline-dark toggle-btn" id="toggleBtn"><i class="bi bi-list"></i></button>
        <h5 class="ms-3 mb-0">Student Dashboard</h5>
      </div>
    </nav>

    <!-- Welcome Section -->
    <div class="alert alert-info">
      Welcome back, <strong>Aaliya Raja</strong>! | Class: 8th | Roll No: ST20252788
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
      <div class="col-md-4">
        <div class="card-box bg-success">
          <h5>95%</h5>
          <p>Attendance</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-box bg-primary">
          <h5>₹2,000</h5>
          <p>Last Payment</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-box bg-warning text-dark">
          <h5>2</h5>
          <p>Books Issued</p>
        </div>
      </div>
    </div>

    <!-- Events and Homework -->
    <div class="row">
      <div class="col-md-6 mb-4">
        <div class="card p-3">
          <h5>📅 Upcoming Events</h5>
          <ul>
            <li>Math Test - 20 June</li>
            <li>Science Fair - 25 June</li>
            <li>Sports Day - 01 July</li>
          </ul>
        </div>
      </div>
      <div class="col-md-6 mb-4">
        <div class="card p-3">
          <h5>📘 Homework Due</h5>
          <ul>
            <li>English Essay - 18 June</li>
            <li>Math Worksheet - 19 June</li>
            <li>Science Project - 21 June</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap and JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const toggleBtn = document.getElementById("toggleBtn");
    const sidebar = document.getElementById("sidebar");
    const main = document.getElementById("mainContent");

    toggleBtn.addEventListener("click", () => {
      sidebar.classList.toggle("collapsed");
      main.classList.toggle("expanded");
    });
  </script>
</body>
</html>
