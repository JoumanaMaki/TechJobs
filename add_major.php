<?php


include "./db_config/connection.php";


if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $isPublished = isset($_POST['is_published']) ? 1 : 0;

    $checkQuery = "SELECT * FROM major WHERE name = '$name'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        header("Location: majors.php?error=duplicate");
        exit();
    }

$query = "INSERT INTO major(name, is_published) VALUES('$name','$isPublished')";

$result = mysqli_query($conn, $query);

if ($result) {
    header("Location: majors.php"); 
    exit();
} else {
  
   header("Location: majors.php?error=true"); 
   exit();
}
} else {
    header("Location: majors.php?error=true"); 
}

mysqli_close($conn);


?>