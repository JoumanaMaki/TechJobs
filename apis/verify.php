<?php
include "../db_config/connection.php";

if (isset($_GET['user'])) {
    $userId = $_GET['user'];

    // Update is_verified in user_login table
    $updateQuery = "UPDATE user_login SET is_verified = 1 WHERE id = '$userId'";
    if ($conn->query($updateQuery) === TRUE) {
        echo 'Email verified successfully! You can now log in.';
    } else {
        echo 'Error verifying email: ' . $conn->error;
    }
} else {
    echo 'Invalid verification link.';
}

// Close the database connection
$conn->close();
header('Location:../login.php');
?>