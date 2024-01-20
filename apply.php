<?php

session_start();
include "./db_config/connection.php";


$applicantName = $_POST["applicantName"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$cv = $_FILES["cv"];
$motivationalLetter = $_POST["motivation"];
$jobId = $_POST["jobId"];


$userId = isset($_SESSION["login_id"]) ? $_SESSION["login_id"] : null;


$targetDirectory = "./uploads/"; 
$cvFileName = basename($_FILES["cv"]["name"]);
$targetFilePath = $targetDirectory . $cvFileName;
$uploadOk = 1;
$path = $targetFilePath;
$imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

$allowedFormats = ["pdf", "doc", "docx"];
if (!in_array($imageFileType, $allowedFormats)) {
    echo "Sorry, only PDF, DOC, and DOCX files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["cv"]["tmp_name"], $targetFilePath)) {
     
       
        $insertQuery = "INSERT INTO applicant (user_id, job_id, name, email, phone, cv, motivation) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("iisssss", $userId, $jobId, $applicantName, $email, $phone, $path, $motivationalLetter);

        if ($stmt->execute()) {
            
           header("location:jobs.php?sent=true");
        } else {
            echo "Error submitting application.";
        }

        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$conn->close();