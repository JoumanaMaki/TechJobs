<?php
// edit_type.php

include "./db_config/connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    $query = "UPDATE city SET name = '$name' , latitude='$latitude', longitude='$longitude' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Location updated successfully!";
    } else {
        echo "Error updating type: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request method!";
}
?>
