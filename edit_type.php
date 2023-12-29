<?php
// edit_type.php

include "./db_config/connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];

    // Perform the update in the database
    $query = "UPDATE type SET name = '$name' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Type updated successfully!";
    } else {
        echo "Error updating type: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request method!";
}
?>
