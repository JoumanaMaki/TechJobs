<?php
 include '../db_config/connection.php';

$sql = "SELECT id, name FROM city";
$result = $conn->query($sql);

if ($result) {
    $cities = array();

  
    while ($row = $result->fetch_assoc()) {
        $cities[] = array(
            'id' => $row['id'],
            'name' => $row['name']
        );
    }


    header('Content-Type: application/json');
    echo json_encode(['cities' => $cities]);
} else {
    // Handle error
    echo json_encode(['error' => 'Error executing query: ' . $conn->error]);
}

// Close the database connection
$conn->close();



?>