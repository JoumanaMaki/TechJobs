

<?php


include "./db_config/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the POST request
    $id = $_POST["id"];
    $name = $_POST["name"];
    $company_name = $_POST["company_name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $salary = $_POST["salary"];
    $requirements = $_POST["requirements"];
    $objectives = $_POST["objectives"];
    $city_id = $_POST["city_id"];
    $major_id = $_POST["major_id"];
    $description = $_POST["description"];
    $is_published = $_POST["is_published"];
    $image_url = $_POST["image_url"];
    $type_id = $_POST["type_id"];

    // Perform the necessary database update here
    // Example: Update the job details in the 'jobs' table
    $query = "UPDATE job SET
        name = '$name',
        company_name = '$company_name',
        email = '$email',
        phone = '$phone',
        salary = '$salary',
        requirements = '$requirements',
        objectives = '$objectives',
        city_id = '$city_id',
        major_id = '$major_id',
        description = '$description',
        is_published = '$is_published',
        image_url = '$image_url',
        type_id = '$type_id'
        WHERE id = '$id'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve data from the POST request
            $id = $_POST["id"];
        
            // Perform the necessary database query to retrieve job details with related city, major, and type names
            $query1 = "
                SELECT 
                    job.*, 
                    city.name AS city_name, 
                    major.name AS major_name, 
                    type.name AS type_name 
                FROM job
                JOIN city ON job.city_id = city.id
                JOIN major ON job.major_id = major.id
                JOIN type ON job.type_id = type.id
                WHERE job.id = '$id'
            ";
        
            $result1 = mysqli_query($conn, $query1);
        
            if ($result1) {
                // Fetch the result as an associative array
                $jobDetails = mysqli_fetch_assoc($result1);
        
                // Output the details as JSON
                echo json_encode($jobDetails);
            } else {
                // Query failed
                echo "Error retrieving job details: " . mysqli_error($conn);
            }
        } else {
            echo "Invalid request.";
        }
        
    } else {
        // Update failed
        echo "Error updating job details: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}

?>