<?php
include "./conn.php";

if (isset($_GET['sf_id']) && !empty($_GET['sf_id'])) {
    $sf_id = mysqli_real_escape_string($conn, $_GET['sf_id']);
    $sql = "SELECT * FROM student_fees WHERE sf_id = '$sf_id'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        $student_name = $row['student_name'];
        $student_email = $row['student_email'];
        $stu_id = $row['stu_id'];
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
        die("❌ No record found for sf_id = $sf_id.");
    }
} else {
    die("❌ Invalid or missing 'sf_id' parameter in URL.");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Invoice - <?= $student_name ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  .invoice-header {
    background-color: #e9f1ff;
    padding: 20px;
    border-bottom: 4px solid #0d6efd;
  }
  .invoice-title {
    font-size: 28px;
    color: #0d6efd;
    font-weight: bold;
  }
  .section-title {
    font-weight: 600;
    margin-bottom: 6px;
  }
  .invoice-box {
    background: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0px 0px 15px rgba(0,0,0,0.05);
  }
  .table th {
    background-color: #f1f6ff;
    color: #0d6efd;
  }
  .text-blue {
    color: #0d6efd;
  }
</style>
</head>
<body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container my-5">
  <div class="invoice-box">

    <!-- Header -->
    <div class="invoice-header d-flex justify-content-between align-items-center">
      <div>
        <div class="invoice-title">SCHOOL FEES INVOICE</div>
        <p class="mb-0">Invoice No: INV-<?= date('Ymd') ?></p>
        <p class="mb-0">Invoice Date: <?= date('d M Y', strtotime($payment_date)) ?></p>
      </div>
      <div class="text-end">
        <strong class="d-block">Pearlsys School</strong>
         school@pearlsys.in<br>
        Perumal Kovil Street<br>
        Urapakkam , Chennai<br>
       
      </div>
    </div>

    <!-- Address Block -->
    <div class="row mt-4">
      <div class="col-md-6">
        <div class="section-title">Bill To</div>
        <p class="mb-0"><strong>Name:</strong> <?= $student_name ?></p>
        <p class="mb-0"><strong>Email:</strong> <?= $student_email ?></p>
        <p class="mb-0"><strong>Student ID:</strong> <?= $stu_id ?></p>
        <p class="mb-0"><strong>Class:</strong> <?= $standard ?></p>
      </div>
      <div class="col-md-6 text-md-end">
        <div class="section-title">Payment Details</div>
        <p class="mb-0"><strong>Mode:</strong> <?= $payment_mode ?></p>
        <p class="mb-0"><strong>Fees Type:</strong> <?= $fees_type ?></p>
        <p class="mb-0"><strong>Transaction No:</strong> <?= strtoupper(uniqid('TXN')) ?></p>
      </div>
    </div>

    <!-- Table -->
    <div class="mt-4">
      <table class="table table-bordered text-center">
        <thead>
          <tr>
      
            <th>School</th>
            <th>Term Fees</th>
        
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Total Fees - <?= $fees_type ?></td>
           
            <td>₹<?= $amount ?></td>
         
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Totals -->
    <div class="row justify-content-end">
      <div class="col-md-6">
        <table class="table">
         
          <tr>
            <td><strong>Paid Now</strong></td>
            <td class="text-end text-success">₹<?= $student_paid ?></td>
          </tr>
          <tr>
            <td><strong>Total Paid</strong></td>
            <td class="text-end">₹<?= $total_paid ?></td>
          </tr>
          <tr>
            <td><strong>Balance</strong></td>
            <td class="text-end text-danger">₹<?= $newbalance ?></td>
          </tr>
          <tr class="table-primary">
            <td><strong>Amount Due</strong></td>
            <td class="text-end fw-bold">₹<?= $newbalance ?></td>
          </tr>
        </table>
      </div>
    </div>



    <!-- Thank You -->
    <div class="text-center mt-4 text-blue">
      <p class="fw-bold">Thank you for your payment!</p>
    </div>

  </div>
</div>

</form>
</body>
</html>
