<?php
include "../db_config/connection.php";

include "../PHPMailer/src/SMTP.php";
include "../PHPMailer/src/Exception.php";
include "../PHPMailer/src/PHPMailer.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


function sendResponse($status, $message)
{
    header('Content-Type: application/json');
    echo json_encode(['status' => $status, 'message' => $message]);
   
}


$pass1=$conn->real_escape_string($_POST['password']);
$username = $conn->real_escape_string($_POST['username']);
$email = $conn->real_escape_string($_POST['email']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$dob = $conn->real_escape_string($_POST['dob']);
$majorId = $conn->real_escape_string($_POST['major_id']);
$cityId = $conn->real_escape_string($_POST['city_id']);




// Handle image upload
$targetDir = "../uploads/users";
$targetFile = $targetDir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    sendResponse('error', 'Invalid email format');
    exit();
}

// // Check if email is unique
$emailCheckQuery = "SELECT id FROM user_login WHERE email = '$email'";
$emailCheckResult = $conn->query($emailCheckQuery);
if ($emailCheckResult->num_rows > 0) {
    sendResponse('error', 'Email is already in use');
    exit();
}

// Validate password
if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $pass1)) {

    sendResponse('error', 'Invalid password format. It must contain at least 8 characters with at least one uppercase letter, one lowercase letter, one number, and one special character (@$!%*?&)');
    exit();
}


if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
    $imagePath = $targetFile;

    if ($_POST['major_id'] == 'other') {
        // Get the custom_major input value
        $customMajor = $conn->real_escape_string($_POST['custom_major']);

        // Check if the custom_major already exists in the database
        $checkQuery = "SELECT id FROM major WHERE name = '$customMajor'";
        $checkResult = $conn->query($checkQuery);

        if ($checkResult->num_rows > 0) {
            // Major already exists, retrieve its ID
            $majorRow = $checkResult->fetch_assoc();
            $majorId = $majorRow['id'];
        } else {
            // Major doesn't exist, create it and retrieve the new ID
            $insertQuery = "INSERT INTO major (name, is_published) VALUES ('$customMajor', 1)";
            if ($conn->query($insertQuery) === TRUE) {
                $majorId = $conn->insert_id;
            } else {
                // Handle error when inserting new major
                sendResponse('error', 'Error inserting new major');
                exit();
            }
        }
    }

    // Insert into user_login table
    $loginQuery = "INSERT INTO user_login (email, password) VALUES ('$email', '$password')";
    if ($conn->query($loginQuery) === TRUE) {
        // Get the user_login ID
        $loginId = $conn->insert_id;

        // Insert into user_data table
        $dataQuery = "INSERT INTO user_data (user_login_id, username, dob, img_url, major_id, city_id) VALUES ('$loginId', '$username', '$dob', '$imagePath', '$majorId', '$cityId')";
        if ($conn->query($dataQuery) === TRUE) {
            header('Content-Type: application/json');
            echo json_encode(['status' => "success", 'message' => "sign up successful"]);
            sendVerificationEmail($email, $loginId);
           header('Location:../login.php');
             exit();
        } else {
           
            sendResponse('error', 'Error inserting new record');
            exit();
        }
    } else {
        sendResponse('error', 'Error inserting new record');
        exit();    
    $errorDetails = mysqli_error($conn);
    if (!empty($errorDetails)) {
        sendResponse('error', $errorDetails);
        exit();    }
    }
} else {
    echo "Sorry, there was an error uploading your file.";
}

// Close the database connection
$conn->close();

function sendVerificationEmail($toEmail, $userId)
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0; // Enable verbose debug output for testing (set to 2 for more detailed output)
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Set your SMTP host
        $mail->SMTPAuth = true;
        $mail->Username = 'joumana.maki@gmail.com'; // Set your SMTP username
        $mail->Password = 'aymg aavg slwa skrm'; // Set your SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, 'ssl' also accepted
        $mail->Port = 587; // TCP port to connect to

        //Recipients
        $mail->setFrom('joumana.maki@gmail.com', 'Joumana Makki'); // Set your email and name
        $mail->addAddress($toEmail); // Add recipient email

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Email Verification';
        $mail->Body = 'Click the following link to verify your email: <a href="http://localhost/techjobs/apis/verify.php?user=' . $userId . '">Verify Email</a>';

        $mail->send();
    } catch (Exception $e) {
        echo 'Error sending email: ' . $mail->ErrorInfo;
    }
}

//('Location:../login.php');
?>

