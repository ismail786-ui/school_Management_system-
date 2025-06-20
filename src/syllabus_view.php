<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Responsive Staff Panel</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

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
      padding: 20px;
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
    <a href="./stu_detail.php"><i class="bi bi-person me-2"></i> Student Details</a>
    <a href="./syllabus_view.php"><i class="bi bi-book me-2"></i> Syllabus</a>
    <a href="./ques_view.php"><i class="bi bi-calendar2-check me-2"></i> Question</a>
    <a href="./stu_payment.php"><i class="bi bi-cash me-2"></i> Payments</a>
    <a href="login.php"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
  </div>

  <!-- Main Content -->
  <div class="main" id="mainContent">
    <div class="container mt-5 pt-4">
      <h2 class="text-center mb-4">Student Syllabus</h2>
      <div class="table-responsive">
        <table class="table table-bordered table-striped text-center align-middle">
          <thead class="table-success">
            <tr>
              <th>Syllabus Id</th>
              <th>Standard</th>
              <th>Subject</th>
              <th>Year</th>
              <th>File</th>
              <th>Syllabus</th>
            </tr>
          </thead>
          <tbody>
            <?php
              include './conn.php';
              $query = "SELECT * FROM syllabus_table ORDER BY sy_id DESC";
              $result = mysqli_query($conn, $query);
              if (mysqli_num_rows($result) > 0) {
                $count = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>
                          <td>{$count}</td>
                          <td>{$row['sy_standard']}</td>
                          <td>{$row['sy_subject']}</td>
                          <td>{$row['sy_year']}</td>
                          <td>{$row['sy_syllabus']}</td>
                          <td><a class='btn btn-success' href='syllabus_papers/{$row['sy_syllabus']}' download>Download</a></td>
                        </tr>";
                  $count++;
                }
              } else {
                echo "<tr><td colspan='6'>No syllabus found.</td></tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Scripts -->
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
