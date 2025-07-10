<?php
include './conn.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Example dynamic data (replace with real values or $_POST/DB data)
$student_email = "student@example.com";
$student_name = "Ismail";
$stu_id = "STU123";
$standard = "8-B";
$payment_mode = "Cash";
$fees_type = "Term 1";
$amount = 15000;
$student_paid = 5000;
$total_paid = 10000;
$newbalance = 5000;
$payment_date = date("Y-m-d");

$mail = new PHPMailer(true);

try {
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'mohamedismail6362@gmail.com';        
    $mail->Password   = 'uzxgyktzwwzvblyq';                   
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      
    $mail->Port       = 587;

    // From and To
    $mail->setFrom('mohamedismail6362@gmail.com', 'Pearlsys School');
    $mail->addAddress($student_email, $student_name); 

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Your School Fee Invoice';

    $mail->Body = "
    <div style='font-family:Arial; padding:20px;'>
      <h2 style='color:#007bff;'>SCHOOL FEES INVOICE</h2>
      <p><strong>Invoice No:</strong> INV-" . date("Ymd") . "</p>
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
    </div>";

    $mail->send();
    echo "<script>alert('✅ Invoice email sent successfully to $student_email');</script>";
} catch (Exception $e) {
    echo "❌ Email sending failed: {$mail->ErrorInfo}";
}
?>
