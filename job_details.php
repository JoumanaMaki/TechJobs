<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <?php 
//include "./navbar.php";

include "./db_config/connection.php";
session_start();


if(isset($_SESSION['login_id'])){
    $src = $_SESSION['image'];
}else{
    header('Location:login.php');
}


$id=$_GET['ID'];
  
    
$sql = "SELECT job.*, city.name AS city_name, type.name AS type_name , major.name AS major_name
FROM job
JOIN city ON job.city_id = city.id
JOIN type ON job.type_id = type.id
JOIN major ON job.major_id = major.id
WHERE job.id = $id";

$result = $conn->query($sql);

?>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

    

        #user-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        a.dropdown-item.dark-mode{
        background-color: #0C7474;
            color: #D4EAF4;
        }

        a.dropdown-item.light-mode{
          background-color: #D4EAF4;
          color: #0C7474;
        }
        nav.light-mode{
           background-color: #D4EAF4;
           height: 100vh; 
        }
        nav.dark-mode{
           background-color: #0C7474;
           height: 100vh; 
        }

        a.light-mode,
        a.light-mode:hover{
            color: #0C7474;
            font-weight:bold
        }

        
        a.dark-mode,
        a.dark-mode:hover{
            color: #D4EAF4;
            font-weight:bold
        }


        p.light-mode{
            color: #0C7474;
            font-weight:bold
        }

        p.dark-mode{

         color: #D4EAF4;
            font-weight:bold
        }


        ul.dropdown-menu.light-mode{
            color: #0C7474;
            background-color:#D4EAF4;
            font-weight:bold
        }
        ul.dropdown-menu.dark-mode{
            color: #D4EAF4;
            background-color:#0C7474;
            font-weight:bold
        }

        p.dark-mode{

         color: #D4EAF4;
            font-weight:bold
        }

        main.light-mode, main.dark-mode {
            margin-left: 220px; 
           padding-top: 60px;
            transition: margin-left 0.3s;
        }
        .sidebar-sticky {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 30px;
        }
        nav.light-mode, nav.dark-mode {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 220px; 
            transition: width 0.3s;
            overflow-y: auto;
        }
       
       
    </style>
</head>
<body>
    
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-3 col-lg-2 light-mode">
            <div class="sidebar-sticky text-center">
            <a class="navbar-brand light-mode m-5" href="#"><img src="./images/techjob_dK.png" id="logo" width="80px" height="60px" style="margin-top:30px" class="light-mode"></a>

            <p class="light-mode fw-bold mt-3" >Welcome,<br>
               <?php echo $_SESSION['name']?></p>
                <ul class="nav flex-column">
                    <li class="nav-item">
                    <a class="nav-link dropdown-toggle light-mode" href="#" role="button" data-bs-toggle="dropdown">Jobs</a>
                <ul class="dropdown-menu light-mode">
                    <li><a class="dropdown-item light-mode" href="add_job.php">Add Job</a></li>
                    <li><a class="dropdown-item light-mode" href="view_jobs.php">View Jobs</a></li>
                    <!-- Add more links as needed -->
                </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link light-mode" href="majors.php" role="button" >Major</a>
                    <!-- Add more links as needed -->
              
                    </li>
                    <li class="nav-item">
                    <a class="nav-link light-mode" href="locations.php" role="button" >Location</a>
                
                    </li>
                    <li class="nav-item dropdown">
                <a class="nav-link light-mode" href="types.php" role="button">Type</a>
              
    </li>


    </li>
                    <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle light-mode" href="#" role="button" data-bs-toggle="dropdown">Contact Us</a>
                <ul class="dropdown-menu light-mode">
                    <li><a class="dropdown-item light-mode" href="viewContactus.php">View Contact Us</a></li>
                
                    <!-- Add more links as needed -->
                </ul>
    </li>
            </div>

                    <div id="darkModeToggle" class="dark-mode-toggle" style="display:flex; justify-content:center">
            <span class="dark-mode-icon">&#9788;</span>
        </div>
        </nav>

        <!-- Main content -->
        <main role="main" class="col-md-9 light-mode" style="margin-left:20%">

        <?php
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
<div class="container-fluid light-mode">
    <div class="row">
        <div class="col-md-6 mt-5 text-center">
            <img src="<?php echo $row['image_url']; ?>" height="500px" width="70%" alt="Job Image">
        </div>
        <div class="col-md-6 mt-5">
          <center>  <h2 class="mt-4"><?php echo $row['name']; ?></h2></center>
            <p class="m-4"><strong>Company Name:</strong> <?php echo $row['company_name']; ?></p>
            <p class="m-4"><strong>City:</strong> <?php echo $row['city_name']; ?></p>
            <p class="m-4"><strong>Location:</strong> <?php echo $row['type_name']; ?></p>
            <p class="m-4"><strong>Major:</strong> <?php echo $row['major_name']; ?></p>
            <p class="m-4"><strong>Description:</strong> <?php echo $row['description']; ?></p>
            <p class="m-4"><strong>Salary:</strong> <?php echo $row['salary']; ?></p>

            <p class="m-4"><strong>Requirements:</strong>  <br> &emsp;&emsp;<?php echo $row['requirements']; ?></p>
            <p class="m-4"><strong>Objectives:</strong> <br>&emsp;&emsp; <?php echo $row['objectives']; ?></p>

            <!-- Add other job details as needed -->
        </div>
    </div>

    <div class="row mt-3 p-5 light-mode text-center">
        <h4 style="color:#0C7474">Contact Details</h4>
   <div class="col-6"> <p class="mt-4"><strong>Email:</strong> <a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></p>
</div>
<div class="col-6"> <p class="mt-4"><strong>Phone:</strong> <?php echo $row['phone']; ?></p>
</div>
</div>
<div class="modal fade" id="motivationModal" tabindex="-1" aria-labelledby="motivationModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="motivationModalLabel">Motivation Content</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="motivationContent"></div>
    </div>
  </div>
</div>

<div class="row mt-5 text-center">
    <div class="col-md-12">
        <h3>Applicants for this Job</h3>
        <?php
      
      $applicantQuery = "SELECT applicant.*, user_data.username AS user_name
                           FROM applicant
                           JOIN user_login AS user ON applicant.user_id = user.id
                           JOIN user_data ON user.id = user_data.user_login_id
                           WHERE applicant.job_id = $id";
        $applicantResult = $conn->query($applicantQuery);

        if ($applicantResult->num_rows > 0) {
            echo '<table class="table table-hover mt-3">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>User ID</th>';
            echo '<th>User Name</th>';
            echo '<th>Email</th>';
            echo '<th>Phone</th>';
            echo '<th>CV</th>';
            echo '<th>Actions</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($applicantRow = $applicantResult->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $applicantRow['user_id'] . '</td>';
                echo '<td><button class="btn btn-link motivation-btn" data-motivation="' . $applicantRow['motivation'] . '">' . $applicantRow['user_name'] . '</button></td>';
                echo '<td>' . $applicantRow['email'] . '</td>';
                echo '<td>' . $applicantRow['phone'] . '</td>';
                echo '<td><a href="' . $applicantRow['cv'] . '" target="_blank">View CV</a></td>';
                echo '<td>';
                echo '<button class="btn btn-success accept-btn m-2" data-applicant-id="' . $applicantRow['user_id'] . '">Accept</button>';
                echo '<button class="btn btn-danger reject-btn" data-applicant-id="' . $applicantRow['user_id'] . '">Reject</button>';
                echo '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p>No applicants for this job yet.</p>';
        }
        ?>
    </div>
</div>
        </main>
    </div>
</div>


<?php
};
$conn->close();
?>

<script>

$(document).ready(function(){
    $('#darkModeToggle').on('click', function(){
        $('nav').toggleClass('light-mode dark-mode');
        $('ul.dropdown-menu').toggleClass('light-mode dark-mode');
        $('a.nav-link, a.navbar-brand, a.btn, a.dropdown-item, p').toggleClass('light-mode dark-mode');
        var Image = $('#logo');
        var current = Image.attr('src');
        var newsrc = current.includes('techjob_dK.png') ? 'images/tech_job_lg.png' : 'images/techjob_dK.png';
        Image.attr('src', newsrc);

    });
    $(document).on('click', '.motivation-btn', function(){
        console.log('Motivation button clicked');
        var motivationContent = $(this).data('motivation');
        $('#motivationContent').text(motivationContent);
        $('#motivationModal').modal('show');
    });


    $(document).on('click', '.accept-btn', function(){
        var applicantId = $(this).data('applicant-id');
        var applicantEmail = $(this).closest('tr').find('td:eq(2)').text();
        updateApplicantStatus(applicantId, 1); // 1 represents acceptance
        sendAcceptanceEmail(applicantEmail);
    });

    // Click event for reject button
    $(document).on('click', '.reject-btn', function(){
        var applicantId = $(this).data('applicant-id');
        updateApplicantStatus(applicantId, 0); // 0 represents rejection
        var applicantEmail = $(this).closest('tr').find('td:eq(2)').text();
       
        sendRejectionEmail(applicantEmail);
    });

    // Function to update applicant status in the database
    function updateApplicantStatus(applicantId, isAccepted) {
        
        $.ajax({
            method: 'POST',
            url: 'update_applicant_status.php',
            data: { id: applicantId, accepted: isAccepted },
            success: function(response) {
                console.log(response); 
            },
            error: function(error) {
                console.error(error);
            }
        });
    }



    function sendAcceptanceEmail(toEmail, userId) {
    $.ajax({
        method: 'POST',
        url: 'send_acceptance_email.php',
        data: { toEmail: toEmail},
        success: function(response) {
            console.log(response);
        },
        error: function(error) {
            console.error(error);
        }
    });
}

// Function to send rejection email
function sendRejectionEmail(toEmail) {
    $.ajax({
        method: 'POST',
        url: 'send_rejection_email.php',
        data: { toEmail: toEmail },
        success: function(response) {
            console.log(response);
        },
        error: function(error) {
            console.error(error);
        }
    });
}

});
</script>
</body>
</html>