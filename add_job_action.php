<?php


include "./db_config/connection.php";
session_start();


if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $companyname = $_POST['company'];
    $description = $_POST['description'];
    $requirements = $_POST['requirements'];
    $objectives = $_POST['objectives'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $major = $_POST['major'];
    $type = $_POST['jobType'];
    $ispublish = 0; 
    $author_id = $_SESSION['login_id']; 

    $targetDir = "./uploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
    
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        $targetDir1 = "./uploads/";
        $targetFile1 = $targetDir1 . basename($_FILES["image"]["name"]);
        $imagePath = $targetFile1;
    
        $query = "INSERT INTO job (name, company_name, description, requirements, objectives, email, phone, city_id, major_id, type_id, is_published, author_id, image_url)
        VALUES ('$name', '$companyname', '$description', '$requirements', '$objectives', '$email', '$phone', '$city', '$major', '$type', '$ispublish', '$author_id', '$imagePath')";

$result = mysqli_query($conn, $query);

if ($result) {
    header("Location: view_jobs.php"); 
    exit();
}
} else {
  
    echo 'Error verifying email: ' . $conn->error;
    exit();
}
} else {
    echo 'Error verifying email: ' . $conn->error;

}

mysqli_close($conn);


?>