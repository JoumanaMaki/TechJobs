<?php


include "./db_config/connection.php";


if (isset($_POST['city_id'])) {
    $city_id = $_POST['city_id'];

    $cityQuery = "SELECT name FROM city WHERE id = '$city_id'";
    $cityResult = mysqli_query($conn, $cityQuery);

    if ($cityResult) {
        $cityRow = mysqli_fetch_assoc($cityResult);
        $city = $cityRow['name'];

        $response = [
            'city_name' => $city
        ];

        echo json_encode($response);
    } else {
        // Handle the query error if needed
        $response = [
            'error' => 'Error in fetching city name'
        ];

        echo json_encode($response);
    }
} else {
    // Handle the case where major_id is not set in the POST data
    $response = [
        'error' => 'City ID is not set in the POST data'
    ];

    echo json_encode($response);
}

// Close the database connection
mysqli_close($conn);
?>