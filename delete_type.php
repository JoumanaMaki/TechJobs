<?php

include "./db_config/connection.php";


if(isset($_GET['ID'])){
    $id = $_GET['ID'];


    $query = "DELETE FROM type WHERE id = '$id'";

    $result= mysqli_query($conn, $query);


    
if ($result) {
    header("Location: types.php");
    exit();
} else {
   header("Location:types.php?error=true");
}
} else {
echo "Invalid request. Please provide a valid ID.";
}
mysqli_close($conn);
?>