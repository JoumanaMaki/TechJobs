<?php


require './PHPMailer/src/SMTP.php';
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Assuming you have the recipient email and user ID sent from your JavaScript
$toEmail = $_POST['toEmail'];


// Initialize PHPMailer
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
    $mail->setFrom('joumana.maki@gmail.com ', 'Jobs Tech'); // Set your email and name
    $mail->addAddress($toEmail); // Add recipient email

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Job Application Accepted';
    $mail->Body = 'Congratulations! Your job application has been accepted. Click the following link to view details: <a href="http://localhost/techjobs/applicant_details.php?user=' . $userId . '">View Details</a>';

    // Send the email
    $mail->send();

    echo 'Acceptance email sent successfully!';
} catch (Exception $e) {
    echo 'Error sending acceptance email: ' . $mail->ErrorInfo;
}
?>
