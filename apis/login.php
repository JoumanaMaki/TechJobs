<?php

include "../db_config/connection.php";

session_start();



$response = array();  // Create an array to store the response data

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM user_login where email='$email'";

$result=$conn ->query($query);

if($result->num_rows > 0){
    $user = $result->fetch_assoc();
    $HashedPass = $user['password'];

    if(password_verify($password, $HashedPass)){
        if($user['is_verified'] ==1){
           $response = ['status'=>'success', 'message'=>'LogIn successfully'];
          $_SESSION['login_id'] = $user['id'];
          $_SESSION['image']=$user['img_url'];
          header('Content-type: application/json');
          echo json_encode($response);
          
        
          exit();
          header('Location:../index.php?login=true');
        }else{
            $response = ['status' => 'error', 'message' => 'Account not verified. Please check your email for verification instructions.'];
       
            header('Content-type: application/json');
            echo json_encode($response);
            exit(); }
    }else{
        $response = ['status' => 'error', 'message' => 'Invalid email or password'];
        header('Content-type: application/json');
        echo json_encode($response);
        exit();
    }
}else{
    $response = ['status' => 'error', 'message' => 'Invalid email or password'];
    header('Content-type: application/json');
    echo json_encode($response);
    exit();
}
    }}


// header('Content-type: application/json');
// echo json_encode($response);
// exit();
?>