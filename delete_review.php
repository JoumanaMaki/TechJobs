<?php

include "./db_config/connection.php";


if(isset($_GET['id'])){
    $id = $_GET['id'];


    $query = "DELETE FROM review WHERE id = '$id'";

    $result= mysqli_query($conn, $query);


    
if ($result) {
    header("Location: reviews.php");
    exit();
} else {
   header("Location:reviews.php?error=true");
}
} else {
echo "Invalid request. Please provide a valid ID.";
}
mysqli_close($conn);
?>