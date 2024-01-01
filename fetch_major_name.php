<?php


include "./db_config/connection.php";
if (isset($_POST['major_id'])) {
    $major_id = $_POST['major_id'];

    $majorQuery = "SELECT name FROM major WHERE id = '$major_id'";
    $majorResult = mysqli_query($conn, $majorQuery);

    if ($majorResult) {
        $majorRow = mysqli_fetch_assoc($majorResult);
        $major_name = $majorRow['name'];

        $response = [
            'major_name' => $major_name
        ];

        echo json_encode($response);
    } else {
        // Handle the query error if needed
        $response = [
            'error' => 'Error in fetching major name'
        ];

        echo json_encode($response);
    }
} else {
    // Handle the case where major_id is not set in the POST data
    $response = [
        'error' => 'Major ID is not set in the POST data'
    ];

    echo json_encode($response);
}

// Close the database connection
mysqli_close($conn);
?>