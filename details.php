<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Jobs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

    <?php 
    include "./db_config/connection.php";
    session_start();

    if(isset($_SESSION['login_id'])){
        $src = $_SESSION['image'];
    }


    $id=$_GET['id'];
  
    
    $sql = "SELECT job.*, city.name AS city_name, type.name AS type_name , major.name AS major_name
    FROM job
    JOIN city ON job.city_id = city.id
    JOIN type ON job.type_id = type.id
    JOIN major ON job.major_id = major.id
    WHERE job.id = $id";
    
    $result = $conn->query($sql);


    ?>
    
    <style>
        .card:hover {
            transform: scale(1.1);
            background-color: #D4EAF4;
        }
        .dark-mode-toggle {
            cursor: pointer;
        }
        nav.light-mode {
            background-color: #D4EAF4;
        }
        nav.dark-mode {
            background-color: #0C7474;
        }
        a.light-mode {
            color: #0C7474;
            font-weight: bold;
        }
        a.dark-mode {
            color: #D4EAF4;
            font-weight: bold;
        }
        .navbar-nav {
            margin: 0 auto;
            display: flex;
            align-items: center;
        }
        a.btn.light-mode {
            background-color: #0C7474;
            color: #D4EAF4;
        }
        a.btn.dark-mode {
            background-color: #D4EAF4;
            color: #0C7474;
        }
        a.dropdown-item.dark-mode {
            background-color: #0C7474;
            color: #D4EAF4;
        }
        a.dropdown-item.light-mode {
            background-color: #D4EAF4;
            color: #0C7474;
        }
        div.light-mode {
            background-color: #D4EAF4;
        }
        .row.light {
            background-color: #0C7474;
        }
        .row.dark {
            background-color: #D4EAF4;
        }
        h1.light-mode, h3.light-mode, p.light-mode, h4.light-mode, h2.light-mode {
            color: #0C7474;
        }
        div.dark-mode {
            background-color: #0C7474;
        }
        h1.dark-mode, h3.dark-mode, p.dark-mode, h4.dark-mode, h2.dark-mode {
            color: #D4EAF4;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm light-mode p-3">
        <div class="container-fluid">
            <a class="navbar-brand light-mode" href="#"><img src="./images/techjob_dK.png" id="logo" width="50px" height="40px" class="light-mode"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link light-mode" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link light-mode" href="./jobs.php">Jobs</a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link light-mode" href="./about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link light-mode" href="./contactus.php">Contact us</a>
                    </li>  
                    <?php if (isset($_SESSION['login_id'])) : ?>
    <li class="nav-item">
        <a class="nav-link light-mode" href="./users_applications.php">My Applications</a>
    </li>
</ul>
</div>
<?php endif; ?>

      </ul>
    </div>

    <?php if (!empty($src)) : ?>
        <div class="dropdown" >
        <div class="row">
        <div class="col-4">    <a  href="#" role="button" id="profileDropdown" >
            <img src="<?php echo $src; ?>" alt="Avatar Logo" style="width:40px;" class="rounded-pill">
        </a></div>
        <div class="col-6"  >    <a href="logout.php" role="button" id="profileDropdown">
            <img src="images/mission.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill">
        </a>
    </div></div>
    </div> 
    <?php else : ?>
     
            <a class="btn btn-light light-mode" href="./sign_up.php">Login / Sign Up</a>
         
    <?php endif; ?>
  
  </div>
        <div id="darkModeToggle" class="dark-mode-toggle">    
            <span class="dark-mode-icon">&#9788;</span>
        </div>
    </nav>
 
    

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


<?php
};
$conn->close();
?>
    <script>
        $(document).ready(function(){
            $('#darkModeToggle').on('click', function(){
                $('div').toggleClass('light-mode dark-mode');
                $('.row').toggleClass('light dark');
                $('div.exception').toggleClass('light dark');
                $('h1, h3, p, h4, h2').toggleClass('light-mode dark-mode');
                $('nav.navbar').toggleClass('light-mode dark-mode');
                $('ul.dropdown-menu').toggleClass('light-mode dark-mode');
                $('a.nav-link, a.navbar-brand, a.btn, a.dropdown-item').toggleClass('light-mode dark-mode');
                var Image = $('#logo');
                var current = Image.attr('src');
                var newsrc = current.includes('techjob_dK.png') ? 'images/tech_job_lg.png' : 'images/techjob_dK.png';
                Image.attr('src', newsrc);
            });
    
         
        });
    
        function resetFilters() {
            $('#majorFilter, #cityFilter, #typeFilter').val('');
            $('form').submit();
        }
    </script>
</body>
</html>
