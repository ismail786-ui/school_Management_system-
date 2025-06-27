<?php
require 'PHPMailer/PHPMailerAutoload.php';
include './conn.php';

// 1. Fetch student fee data from database
if (isset($_GET['sf_id']) && !empty($_GET['sf_id'])) {
    $sf_id = mysqli_real_escape_string($conn, $_GET['sf_id']);
    $sql = "SELECT * FROM student_fees WHERE sf_id = '$sf_id'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        // Dynamically set variables from DB
        $student_name   = $row['student_name'];
        $student_email  = $row['student_email'];
        $stu_id         = $row['stu_id'];
        $standard       = $row['standard'];
        $fees_type      = $row['fees_type'];
        $payment_date   = $row['payment_date'];
        $payment_mode   = $row['payment_mode'];
        $amount         = $row['amount'];
        $student_paid   = $row['student_paid'];
        $total_paid     = $row['total_paid'];
        $newbalance     = $row['newbalance'];
    } else {
        die("❌ No record found for sf_id = $sf_id.");
    }
} else {
    die("❌ Invalid or missing 'sf_id' parameter in URL.");
}

// 2. Send email using fetched data
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'mohamedismail6362@gmail.com';      
$mail->Password   = 'uzxg yktz wwzv blyq';          
$mail->SMTPSecure = 'tls';
$mail->Port       = 587;

$mail->setFrom('your_email@gmail.com', 'Pearlsys School');
$mail->addAddress($student_email, $student_name);
$mail->isHTML(true);
$mail->Subject = 'School Fee Invoice - Pearlsys School';

$mail->Body = "
  <div style='font-family:Arial;padding:20px;'>
    <h2 style='color:#007bff;'>SCHOOL FEES INVOICE</h2>
    <p><strong>Invoice No:</strong> INV-" . date("Ymd", strtotime($payment_date)) . "</p>
    <p><strong>Invoice Date:</strong> " . date("d M Y", strtotime($payment_date)) . "</p>
    <hr>
    <h4>Bill To</h4>
    <p><strong>Name:</strong> $student_name<br>
       <strong>Email:</strong> $student_email<br>
       <strong>Student ID:</strong> $stu_id<br>
       <strong>Class:</strong> $standard</p>

    <h4>Payment Details</h4>
    <p><strong>Mode:</strong> $payment_mode<br>
       <strong>Fees Type:</strong> $fees_type<br>
       <strong>Transaction No:</strong> " . strtoupper(uniqid('TXN')) . "</p>

    <table border='1' cellpadding='10' cellspacing='0' style='width:100%; margin-top:20px; text-align:center;'>
      <tr style='background:#007bff; color:white;'>
        <th>School</th>
        <th>Term Fees</th>
      </tr>
      <tr>
        <td>Total Fees - $fees_type</td>
        <td>₹$amount</td>
      </tr>
    </table>

    <table cellpadding='10' cellspacing='0' style='width:100%; margin-top:20px;'>
      <tr><td><strong>Paid Now:</strong></td><td align='right' style='color:green;'>₹$student_paid</td></tr>
      <tr><td><strong>Total Paid:</strong></td><td align='right'>₹$total_paid</td></tr>
      <tr><td><strong>Balance:</strong></td><td align='right' style='color:red;'>₹$newbalance</td></tr>
      <tr style='background:#e0f0ff;'><td><strong>Amount Due:</strong></td><td align='right'><strong>₹$newbalance</strong></td></tr>
    </table>

    <div style='text-align:center; margin-top:30px;'>
      <p><strong>Thank you for your payment!</strong></p>
      <small>Pearlsys School, Urapakkam, Chennai</small>
    </div>
  </div>
";

if ($mail->send()) {
   header('location:invoice_thanks.php');
} else {
    echo "❌ Error sending email: " . $mail->ErrorInfo;
}
?>
