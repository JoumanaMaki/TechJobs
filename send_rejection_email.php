<?php
include "./db_config/connection.php";

require './PHPMailer/src/SMTP.php';
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Get the recipient email from the POST data
$toEmail = $_POST['toEmail'];
$jobId = $_POST['jobId'];
$jobName = $_POST['jobName'];

echo $jobName;
// Function to send rejection email
function sendRejectionEmail($toEmail) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = 0; // Enable verbose debug output for testing (set to 2 for more detailed output)
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Set your SMTP host
        $mail->SMTPAuth = true;
        $mail->Username = 'joumana.maki@gmail.com'; // Set your SMTP username
        $mail->Password = 'aymg aavg slwa skrm'; // Set your SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, 'ssl' also accepted
        $mail->Port = 587; // TCP port to connect to

        // Recipients
        $mail->setFrom('joumana.maki@gmail.com ', 'Jobs Tech'); // Set your email and name
        $mail->addAddress($toEmail); // Add recipient email

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Job Application Rejected';
        $mail->Body = 'We regret to inform you that your application for the job <strong>' . $jobName . '</strong> has been rejected.';

        $mail->send();
        echo 'Email sent successfully';
    } catch (Exception $e) {
        echo 'Error sending email: ' . $mail->ErrorInfo;
    }
}

// Call the function to send rejection email
sendRejectionEmail($toEmail);
?>
