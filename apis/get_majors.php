<?php
 include '../db_config/connection.php';

$sql = "SELECT id, name FROM major where is_published = 1";
$result = $conn->query($sql);

if ($result) {
    $majors = array();

  
    while ($row = $result->fetch_assoc()) {
        $majors[] = array(
            'id' => $row['id'],
            'name' => $row['name']
        );
    }

    $majors[] = array(
        'id' => 'other',
        'name' => 'Other'
    );
    header('Content-Type: application/json');
    echo json_encode(['majors' => $majors]);
} else {
    // Handle error
    echo json_encode(['error' => 'Error executing query: ' . $conn->error]);
}

// Close the database connection
$conn->close();



?>