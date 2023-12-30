<?php

include "./db_config/connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $is_published = $_POST['is_published'];
  
    $query = "UPDATE major SET name = '$name', is_published='$is_published' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Major updated successfully!";
    } else {
        echo "Error updating type: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request method!";
}
?>
