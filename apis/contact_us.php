<?php

include "../db_config/connection.php";
// Ensure that the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response = ['status' => 'error', 'message' => 'Invalid email address'];
        header('Content-type: application/json');
        echo json_encode($response);
        exit();
    }
    $sql = "INSERT INTO contact_us (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
 
    // Execute the statement
    if ($conn->query($sql)) {
    // Example: Send a response back to the client
    $response = ['status' => 'success', 'message' => 'Message Sent Successfully'];
   
            header('Content-type: application/json');
            echo json_encode($response);
            exit();
}
} else {
    // Handle non-POST requests (optional)
    $response = ['status' => 'error', 'message' => 'Error in Database'];
       
    header('Content-type: application/json');
    echo json_encode($response);
    exit();
}

?>
