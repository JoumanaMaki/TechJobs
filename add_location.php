<?php


include "./db_config/connection.php";


if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    $checkQuery = "SELECT * FROM city WHERE name = '$name'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        header("Location: locations.php?error=duplicate");
        exit();
    }

$query = "INSERT INTO city(name, latitude, longitude) VALUES('$name','$latitude','$longitude')";

$result = mysqli_query($conn, $query);

if ($result) {
    header("Location: locations.php"); 
    exit();
} else {
  
   header("Location: locations.php?error=true"); 
   exit();
}
} else {
    header("Location: locations.php?error=true"); 
}

mysqli_close($conn);


?>