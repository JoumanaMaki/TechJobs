<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <?php 
//include "./navbar.php";

include "./db_config/connection.php";
session_start();

if(isset($_SESSION['login_id'])){
    $src = $_SESSION['image'];
}else{
    header('Location:login.php');
}

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
            <a class="navbar-brand light-mode m-2" href="#"><img src="./images/techjob_dK.png" id="logo" width="80px" height="80px" style="margin-top:30px" class="light-mode"></a>

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

                
    <li class="nav-item dropdown">
                <a class="nav-link light-mode" href="viewContactus.php" role="button" >Contact Us</a>
    </li>

                 <li class="nav-item dropdown">
                <a class="nav-link light-mode" href="logout.php" role="button">Logout</a>  
                 </li>
            </div>

                    <div id="darkModeToggle" class="dark-mode-toggle" style="display:flex; justify-content:center">
            <span class="dark-mode-icon">&#9788;</span>
        </div>
        </nav>

        <!-- Main content -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
     

<div class="container mt-5">
    <div class="row">
        <?php
    include "./db_config/connection.php";
        // Query to get number of jobs
        $result = $conn->query("SELECT COUNT(*) AS num_jobs FROM job");
        $row = $result->fetch_assoc();
        $numJobs = $row["num_jobs"];

        // Query to get number of applicants
        $result = $conn->query("SELECT COUNT(*) AS num_applicants FROM applicant");
        $row = $result->fetch_assoc();
        $numApplicants = $row["num_applicants"];

        // Query to get number of users
        $result = $conn->query("SELECT COUNT(*) AS num_users FROM user_login");
        $row = $result->fetch_assoc();
        $numUsers = $row["num_users"];

        // Query to get number of reviews
        $result = $conn->query("SELECT COUNT(*) AS num_reviews FROM contact_us");
        $row = $result->fetch_assoc();
        $numReviews = $row["num_reviews"];

        // Query to get latest 2 jobs
        $result = $conn->query("SELECT * FROM job ORDER BY id DESC LIMIT 2");
        $latestJobs = array();
        while ($row = $result->fetch_assoc()) {
            $latestJobs[] = $row;
        }

        // Close database connection
        $conn->close();
        ?>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Number of Jobs</h5>
                    <p class="card-text">Total: <?php echo $numJobs; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Number of Applicants</h5>
                    <p class="card-text">Total: <?php echo $numApplicants; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Number of Users</h5>
                    <p class="card-text">Total: <?php echo $numUsers; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Number of Reviews</h5>
                    <p class="card-text">Total: <?php echo $numReviews; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Latest Jobs
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <?php foreach($latestJobs as $job): ?>
                        <li class="list-group-item"><?php echo $job['title']; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


        </main>
    </div>
</div>




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
});
</script>
</body>
</html>