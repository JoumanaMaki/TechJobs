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
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;
    $mail->Username = 'joumana.maki@gmail.com'; 
    $mail->Password = 'aymg aavg slwa skrm'; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Port = 587; 

    $mail->setFrom('joumana.maki@gmail.com', 'Jobs Tech'); 
    $mail->addAddress($toEmail); 
    
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
