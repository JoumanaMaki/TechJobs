<?php

include "./db_config/connection.php";




if (isset($_GET['ID'])) {
    $id = $_GET['ID'];

$query = "DELETE FROM contact_us WHERE id = '$id'";
$result = mysqli_query($conn, $query);

if ($result) {
    // Record deleted successfully
    header("Location: viewContactus.php"); // Redirect to viewContactus.php after deletion
    exit();
} else {
    // Error in the deletion process
    echo "Error deleting record: " . mysqli_error($conn);
}
} else {
// ID parameter not set in the URL
echo "Invalid request. Please provide a valid ID.";
}

// Close the database connection
mysqli_close($conn);

?>