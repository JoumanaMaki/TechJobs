<?php
session_start();
include './db_config/connection.php';

if (isset($_POST['feedback']) && isset($_POST['rating']) && isset($_SESSION['image']) && isset($_SESSION['name'])) {
    // You can sanitize and validate the input here if needed
    $feedback = $_POST['feedback'];
    $rating = $_POST['rating'];
    $img_url = $_SESSION['image'];
    $name = $_SESSION['name'];

    // Prepare SQL statement to insert data into the review table
    $sql = "INSERT INTO review (name, img_url, feedback, rating) VALUES (?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $name, $img_url, $feedback, $rating);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: index.php?feedback_success=true");
      
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Feedback, rating, img_url, and name are required.";
}

$conn->close();
?>
