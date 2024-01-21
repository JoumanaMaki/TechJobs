<?php
include "../db_config/connection.php";

include "./PHPMailer/src/SMTP.php";
include "./PHPMailer/src/Exception.php";
include "./PHPMailer/src/PHPMailer.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendVerificationEmail($toEmail, $userId)
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0; // Enable verbose debug output for testing (set to 2 for more detailed output)
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Set your SMTP host
        $mail->SMTPAuth = true;
        $mail->Username = 'joumana.maki@gmail.com'; // Set your SMTP username
        $mail->Password = 'aymg aavg slwa skrm'; // Set your SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, 'ssl' also accepted
        $mail->Port = 587; // TCP port to connect to

        //Recipients
        $mail->setFrom('joumana.maki@gmail.com', 'Joumana Makki'); // Set your email and name
        $mail->addAddress($toEmail); // Add recipient email

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Email Verification';
        $mail->Body = 'Click the following link to verify your email: <a href="http://localhost/techjobs/apis/verify.php?user=' . $userId . '">Verify Email</a>';

        $mail->send();
    } catch (Exception $e) {
        echo 'Error sending email: ' . $mail->ErrorInfo;
    }
}


$conn->close();

?>
