<?php
include "./db_config/connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $applicantId = $_POST['id'];
    $isAccepted = $_POST['accepted'];


    $updateQuery = "UPDATE applicant SET is_answered = true, is_accepted = $isAccepted WHERE user_id = $applicantId";

    if ($conn->query($updateQuery) === TRUE) {
        echo json_encode(['status' => 'success', 'message' => 'Applicant status updated successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error updating applicant status: ' . $conn->error]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}

$conn->close();
?>
