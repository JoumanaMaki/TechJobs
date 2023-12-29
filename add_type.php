<?php


include "./db_config/connection.php";


if (isset($_POST['name'])) {
    $name = $_POST['name'];


     $checkQuery = "SELECT * FROM type WHERE name = '$name'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Name already exists, handle the error as needed
        header("Location: types.php?error=duplicate");
        exit();
    }

$query = "INSERT INTO type(name) VALUES('$name')";

$result = mysqli_query($conn, $query);

if ($result) {
    header("Location: types.php"); 
    exit();
} else {
  
   header("Location: types.php?error=true"); 
   exit();
}
} else {
    header("Location: types.php?error=true"); 
}

mysqli_close($conn);


?>