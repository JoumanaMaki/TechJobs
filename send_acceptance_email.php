<?php

require './PHPMailer/src/SMTP.php';
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$toEmail = $_POST['toEmail'];
$jobId = $_POST['jobId'];
$jobName = $_POST['jobName'];


$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Set your SMTP host
    $mail->SMTPAuth = true;
    $mail->Username = 'joumana.maki@gmail.com'; // Set your SMTP username
    $mail->Password = 'aymg aavg slwa skrm'; // Set your SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, 'ssl' also accepted
    $mail->Port = 587; // TCP port to connect to

    // Recipients
    $mail->setFrom('joumana.maki@gmail.com', 'Jobs Tech'); 
    $mail->addAddress($toEmail); // Add recipient email

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Job Application Accepted';
    $mail->Body = 'Congratulations! Your application for the job <strong>' . $jobName . '</strong> has been accepted.';

    // Send the email
    $mail->send();

    echo 'Acceptance email sent successfully!';
} catch (Exception $e) {
    echo 'Error sending acceptance email: ' . $mail->ErrorInfo;
}
?>
