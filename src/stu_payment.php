<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Responsive Staff Panel</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
    }

    .sidebar {
      width: 250px;
      background-color: #0d6efd;
      color: white;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      padding-top: 60px;
      transition: 0.3s;
    }

    .sidebar a {
      color: white;
      display: block;
      padding: 15px 20px;
      text-decoration: none;
    }

    .sidebar a:hover {
      background-color: #00d4ff;
      color: black;
    }

    .sidebar.collapsed {
      transform: translateX(-100%);
    }

    .main {
      margin-left: 250px;
      padding: 80px 20px 20px;
      transition: margin-left 0.3s;
    }

    .main.full {
      margin-left: 0;
    }

    .topbar {
      height: 60px;
      width: 100%;
      background-color: #0d6efd;
      color: white;
      display: flex;
      align-items: center;
      padding: 0 20px;
      position: fixed;
      top: 0;
      left: 0;
      z-index: 1050;
    }

    .toggle-btn {
      background: none;
      border: none;
      color: white;
      font-size: 1.5rem;
    }

    @media (max-width: 768px) {
      .sidebar {
        transform: translateX(-100%);
      }

      .sidebar.show {
        transform: translateX(0);
        z-index: 1040;
      }

      .main {
        margin-left: 0;
      }
    }
  </style>
</head>
<body>

  <!-- Topbar -->
  <div class="topbar">
    <button class="toggle-btn me-3" onclick="toggleSidebar()"><i class="bi bi-list"></i></button>
    <div><strong>Student Panel</strong></div>
  </div>

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <a href="studentd.php"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
    <a href="./stu_detail.php"><i class="bi bi-person me-2"></i>Student Details</a>
    <a href="./syllabus_view.php"><i class="bi bi-book me-2"></i> Syllabus</a>
    <a href="./ques_view.php"><i class="bi bi-calendar2-check me-2"></i>Question</a>
    <a href="./stu_payment.php"><i class="bi bi-cash me-2"></i> Payments</a>
    <a href="login.php"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
  </div>

  <!-- Main Content -->
  <div class="main" id="mainContent">

    <!-- Payment Section -->
    <div class="container">
      <h2 class="mb-4 text-center">Student Payment Details</h2>
      <div class="d-flex justify-content-center">
        <form method="POST" class="row g-3 mb-4" style="max-width: 700px;">
          <div class="col-md-8">
            <input type="text" name="student_search" class="form-control" placeholder="Enter ID or name" required>
          </div>
          <div class="col-md-4">
            <button type="submit" name="search" class="btn btn-primary w-100">Search</button>
          </div>
        </form>
      </div>

      <?php
      include 'conn.php';
      $studentData = null;

      if (isset($_POST['search'])) {
          $searchTerm = $_POST['student_search'];
          $sql = "SELECT * FROM student_fees
                  WHERE student_name LIKE '%$searchTerm%'
                     OR student_email LIKE '%$searchTerm%'
                     OR sf_id = '$searchTerm'
                  LIMIT 1";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
              $studentData = mysqli_fetch_assoc($result);
          } else {
              $error = "No student payment details found.";
          }
      }
      ?>

      <div class="d-flex justify-content-center">
        <?php if ($studentData): ?>
          <div class="card col-md-9">
            <div class="card-header bg-success text-white">
              Payment Details For <?= htmlspecialchars($studentData['student_name']) ?>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <tr><th>Student ID</th><td><?= $studentData['sf_id'] ?></td></tr>
                <tr><th>Name</th><td><?= $studentData['student_name'] ?></td></tr>
                <tr><th>Email</th><td><?= $studentData['student_email'] ?></td></tr>
                <tr><th>Standard</th><td><?= $studentData['standard'] ?></td></tr>
                <tr><th>Fees Type</th><td><?= $studentData['fees_type'] ?></td></tr>
                <tr><th>Amount</th><td>₹<?= $studentData['amount'] ?></td></tr>
                <tr><th>Paid</th><td>₹<?= $studentData['student_paid'] ?></td></tr>
                <tr><th>Total Paid</th><td>₹<?= $studentData['total_paid'] ?></td></tr>
                <tr><th>Balance Amount</th><td>₹<?= $studentData['balance_amount'] ?></td></tr>
                <tr><th>New Balance</th><td>₹<?= $studentData['newbalance'] ?></td></tr>
                <tr><th>Payment Mode</th><td><?= $studentData['payment_mode'] ?></td></tr>
                <tr><th>Payment Date</th><td><?= $studentData['payment_date'] ?></td></tr>
              </table>
            </div>
          </div>
        <?php elseif (isset($error)): ?>
          <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- JS -->
  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById("sidebar");
      const main = document.getElementById("mainContent");

      if (window.innerWidth <= 768) {
        sidebar.classList.toggle("show");
      } else {
        sidebar.classList.toggle("collapsed");
        main.classList.toggle("full");
      }
    }
  </script>
</body>
</html>
