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
      </div>
    </nav>


    <?php
include 'conn.php'; // your DB connection

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


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
  <h2 class="mb-4 text-center">Student Payment Details</h2>
<div class=" d-flex justify-content-center">
  <form method="POST" class="row g-3 mb-4">
    <div class="col-md-7 flex-column">
      <input type="text" name="student_search" class="form-control" placeholder="Enter ID name" required>
    </div>
    <div class="col-md-5">
      <button type="submit" name="search" class="btn btn-primary w-100">Search</button>
    </div>
  </form>
</div>
<div class=" d-flex justify-content-center">

  <?php if ($studentData): ?>
    <div class="card col-md-9">
      <div class="card-header bg-success text-white ">
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
</body>
</html>








    

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
