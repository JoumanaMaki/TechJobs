<?php


include "./db_config/connection.php";
if (isset($_POST['type_id'])) {
    $type_id = $_POST['type_id'];

    $typeQuery = "SELECT name FROM type WHERE id = '$type_id'";
    $typeResult = mysqli_query($conn, $typeQuery);

    if ($typeResult) {
        $typeRow = mysqli_fetch_assoc($typeResult);
        $type_name = $typeRow['name'];

        $response = [
            'type_name' => $type_name
        ];

        echo json_encode($response);
    } else {
        // Handle the query error if needed
        $response = [
            'error' => 'Error in fetching type name'
        ];

        echo json_encode($response);
    }
} else {
    // Handle the case where major_id is not set in the POST data
    $response = [
        'error' => 'Type ID is not set in the POST data'
    ];

    echo json_encode($response);
}

// Close the database connection
mysqli_close($conn);
?>