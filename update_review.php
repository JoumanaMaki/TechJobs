<?php
include "./db_config/connection.php"; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id']) && isset($_POST['publish'])) {
        $id =$_POST['id'];
        $publish = $_POST['publish'];

        
        $sql = "UPDATE review SET is_published = '$publish' WHERE id = '$id'";
        if (mysqli_query($conn, $sql)) {
            echo "Review updated successfully";
        } else {
            echo "Error updating review: " . mysqli_error($conn);
        }
    } else {
        echo "ID or publish status not provided";
    }
} else {
    echo "Invalid request method";
}
?>
