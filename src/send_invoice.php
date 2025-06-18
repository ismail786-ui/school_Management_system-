<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
require './PHPMailer/src/Exception.php';

include './conn.php';

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

        // Compose invoice HTML
        $invoiceBody = "
        <h2>School Fees Invoice</h2>
        <p><strong>Student:</strong> $student_name</p>
        <p><strong>Standard:</strong> $standard</p>
        <p><strong>Payment Date:</strong> $payment_date</p>
        <table border='1' cellpadding='5' cellspacing='0' style='border-collapse: collapse;'>
          <tr><th>Fees Type</th><td>$fees_type</td></tr>
          <tr><th>Payment Mode</th><td>$payment_mode</td></tr>
          <tr><th>Total Fees</th><td>₹$amount</td></tr>
          <tr><th>Paid This Time</th><td>₹$student_paid</td></tr>
          <tr><th>Total Paid</th><td>₹$total_paid</td></tr>
          <tr><th>Remaining</th><td>₹$newbalance</td></tr>
        </table>
        <br><p>Thank you for your payment.</p>";

        // Send email using PHPMailer
        $mail = new PHPMailer(true);

        try {
            // SMTP settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; // Use your mail server
            $mail->SMTPAuth   = true;
            $mail->Username   = 'yourgmail@gmail.com'; // your Gmail
            $mail->Password   = 'your_app_password';   // Gmail App Password
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            // Email content
            $mail->setFrom('yourgmail@gmail.com', 'ABC School');
            $mail->addAddress($student_email, $student_name);
            $mail->isHTML(true);
            $mail->Subject = 'Your School Fees Invoice';
            $mail->Body    = $invoiceBody;

            $mail->send();
            echo "<script>alert('Invoice email sent successfully to $student_email'); window.location.href='your-fees-list-page.php';</script>";
        } catch (Exception $e) {
            echo "Email sending failed. Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "No record found.";
    }
}
?>
