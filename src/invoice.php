<?php
include "./conn.php";

if (isset($_GET['sf_id'])) {
    $sf_id = $_GET['sf_id'];
    $sql = "SELECT * FROM student_fees WHERE sf_id = '$sf_id'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        $student_name = $row['student_name'];
        $student_email = $row['student_email'];
        $standard = $row['standard'];
        $fees_type = $row['fees_type'];
        $payment_date = $row['payment_date'];
        $payment_mode = $row['payment_mode'];
        $amount = $row['amount'];
        $student_paid = $row['student_paid'];
        $balance_amount = $row['balance_amount'];
        $total_paid = $row['total_paid'];
        $newbalance = $row['newbalance'];
    } else {
        echo "No record found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Invoice - <?= $student_name ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .invoice-box {
      max-width: 800px;
      margin: auto;
      padding: 30px;
      border: 1px solid #ccc;
      border-radius: 8px;
      background-color: #fff;
    }
    .invoice-header {
      border-bottom: 1px solid #ccc;
      margin-bottom: 20px;
      padding-bottom: 10px;
    }
    .invoice-footer {
      border-top: 1px solid #ccc;
      margin-top: 20px;
      padding-top: 10px;
      text-align: center;
    }
  </style>
</head>
<body>
<div class="invoice-box mt-5 shadow">
  <div class="invoice-header d-flex justify-content-between align-items-center">
    <div>
      <h4 class="mb-0">School Fees Invoice</h4>
      <small>Date: <?= date('d M Y', strtotime($payment_date)) ?></small>
    </div>
    <div class="text-end">
      <strong>ABC School</strong><br>
      123 School Lane<br>
      City, State, ZIP
    </div>
  </div>

  <div class="mb-4">
    <h5>Billing To:</h5>
    <p>
      <strong><?= $student_name ?></strong><br>
      Email: <?= $student_email ?><br>
      Standard: <?= $standard ?><br>
      Student ID: <?= $sf_id ?>
    </p>
  </div>

  <table class="table table-bordered">
    <thead class="table-light">
      <tr>
        <th>Description</th>
        <th class="text-end">Amount (₹)</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Total School Fees</td>
        <td class="text-end">₹<?= $amount ?></td>
      </tr>
      <tr>
        <td>Previously Paid</td>
        <td class="text-end">₹<?= $total_paid - $student_paid ?></td>
      </tr>
      <tr>
        <td>Paid Now</td>
        <td class="text-end">₹<?= $student_paid ?></td>
      </tr>
      <tr>
        <td><strong>Total Paid</strong></td>
        <td class="text-end"><strong>₹<?= $total_paid ?></strong></td>
      </tr>
      <tr>
        <td><strong>Remaining Balance</strong></td>
        <td class="text-end text-danger"><strong>₹<?= $newbalance ?></strong></td>
      </tr>
    </tbody>
  </table>

  <div class="mt-4">
    <p><strong>Payment Mode:</strong> <?= $payment_mode ?></p>
    <p><strong>Fees Type:</strong> <?= $fees_type ?></p>
  </div>

  <div class="invoice-footer text-muted">
    <p>Thank you for your payment!</p>
  </div>
</div>

</body>
</html>
