<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="shortcut icon" href="../src./assets/images/ps.png" type="image/png">
    <link href="../src./assets/images/ps.png" rel="apple-touch-icon">
    <title>Staff Panel</title>

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
      color: rgb(0, 0, 0);
    }

    .sidebar.collapsed {
      transform: translateX(-100%);
    }

    .main {
      margin-left: 250px;
      padding: 20px;
      padding-top: 100px; /* Ensure visibility below the fixed topbar */
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
    <?php
    include "conn.php";
    $search_id = $_GET['stu_id'] ?? '';
    $data = null;

    if (!empty($search_id)) {
        $id = mysqli_real_escape_string($conn, $search_id);
        $sql = "SELECT sa.stu_id, sa.stu_name,sa.stu_admission,sa.stu_blood,cm.class_name, cm.class_section, cm.class_teacher
                FROM student_admission sa
                JOIN class_master cm ON sa.class_id = cm.class_id
                WHERE sa.stu_id = '$id'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
        } else {
            $error = "No student found.";
        }
    }
    ?>

    <div class="container">
      <h2 class="text-center mb-4">Search Student</h2>
      <div class="d-flex justify-content-center">
        <form method="GET" class="row g-3 mb-4">
          <div class="col-md-7">
            <input type="text" name="stu_id" class="form-control" placeholder="Enter Student ID" value="<?= htmlspecialchars($search_id) ?>" required>
          </div>
          <div class="col-md-5">
            <button type="submit" class="btn btn-primary w-100">Search</button>
          </div>
        </form>
      </div>

      <div class="d-flex justify-content-center">
        <?php if ($data): ?>
          <div class="card col-md-12">
            <div class="card-header bg-success text-white">Student Information</div>
            <div class="card-body">
              <table class="table table-bordered">
                <tr><th>ID</th><td><?= $data['stu_id'] ?></td></tr>
                <tr><th>Admission Date</th><td><?= $data['stu_admission'] ?></td></tr>
                <tr><th>Name</th><td><?= $data['stu_name'] ?></td></tr>
                <tr><th>Blood Group</th><td><?= $data['stu_blood'] ?></td></tr>
                <tr><th>Class</th><td><?= $data['class_name'] ?></td></tr>
                <tr><th>Section</th><td><?= $data['class_section'] ?></td></tr>
                <tr><th>Class Teacher</th><td><?= $data['class_teacher'] ?></td></tr>
              </table>
            </div>
          </div>
        <?php elseif (!empty($search_id)): ?>
          <div class="alert alert-danger text-center w-50"><?= $error ?></div>
        <?php endif; ?>
      </div>
    </div>
  </div>


  <!-- Sidebar Toggle Script -->
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
