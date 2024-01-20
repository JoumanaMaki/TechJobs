<?php
// Include your database connection here
include "db_config/connection.php";

// Check if the POST data is set
if (isset($_POST['userId']) && isset($_POST['jobId'])) {
    $userId = $_POST['userId'];
    $jobId = $_POST['jobId'];

    // Prepare and execute a query to check if the user has applied
    $checkQuery = "SELECT * FROM applicant WHERE user_id = $userId AND job_id = $jobId";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult) {
        // Check the number of rows returned
        if ($checkResult->num_rows > 0) {
            // User has already applied
            echo 'applied';
        } else {
            // User has not applied
            echo 'not_applied';
        }
    } else {
        // Error in the query
        echo 'error';
    }

    // Close the database connection
    $conn->close();
} else {
    // If POST data is not set
    echo 'invalid_request';
}
?>
