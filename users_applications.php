<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Jobs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <?php 
//include "./navbar.php";

include "./db_config/connection.php";
session_start();

if(isset($_SESSION['login_id'])){
    $src = $_SESSION['image'];
}


?>
    <style>

      .dark-mode-toggle {
                cursor: pointer;
            }
      nav.light-mode{
         background-color: #D4EAF4;
      }
      nav.dark-mode{
         background-color: #0C7474;
      }

      a.light-mode{
          color: #0C7474;
          font-weight:bold
      }

      
      a.dark-mode{
          color: #D4EAF4;
          font-weight:bold
      }
      .navbar-nav {
          margin: 0 auto;  /* Center the navbar */
          display: flex;
          align-items: center;
      }
      a.btn.light-mode{
          background-color: #0C7474;
          color: #D4EAF4;
      }
    
      a.btn.dark-mode  {
          background-color: #D4EAF4;
          color: #0C7474;
      }
      a.dropdown-item.dark-mode{
      background-color: #0C7474;
          color: #D4EAF4;
      }

      a.dropdown-item.light-mode{
        background-color: #D4EAF4;
        color: #0C7474;
      }

  div.light-mode{
      background-color: #D4EAF4;  
  }
  .row.light{
      background-color: #0C7474;  
  }
  .row.dark{
      background-color: #D4EAF4;  
  }

  h1.light-mode, h3.light-mode, p.light-mode, h4.light-mode, h2.light-mode{
      color: #0C7474
  }

  div.dark-mode{
      background-color: #0C7474;  
  }
  h1.dark-mode, h3.dark-mode, p.dark-mode, h4.dark-mode, h2.dark-mode{
      color: #D4EAF4
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
<?php else : ?>

</ul>
</div>

<?php endif; ?>


    <?php if (!empty($src)) : ?>
        <div class="dropdown " >
        <div class="row light-mode">
        <div class="col-6 light-mode">    <a  href="#" role="button" id="profileDropdown" >
            <img src="<?php echo $src; ?>" alt="Avatar Logo" style="width:40px;" class="rounded-pill">
        </a></div>
        <div class="col-6 light-mode"  >    <a href="logout.php" role="button" id="profileDropdown">
            <img src="images/logout.png" alt="Avatar Logo" style="width:40px;margin-left:10px" >
             </a>
    </div></div>
    </div>    <?php else : ?>
     
            <a class="btn btn-light light-mode" href="./sign_up.php">Login / Sign Up</a>
         
    <?php endif; ?>
  
  </div>
  <div id="darkModeToggle" class="dark-mode-toggle">    
    <span class="dark-mode-icon">&#9788;</span>
</div>
</nav>


<?php

    $user_id=$_SESSION['login_id'];
    $sql = "SELECT a.*, a.job_id as job_id, j.name AS job_title, j.company_name AS job_company_name, j.image_url AS image_url
    FROM applicant a
    JOIN job j ON a.job_id = j.id
    WHERE a.user_id = $user_id";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
$applications = $result->fetch_all(MYSQLI_ASSOC);
} else {
$applications = []; 
}

$conn->close();
?>

<div class="container-fluid">
    <div class="row mt-3 p-4">
        <?php
        if (!empty($applications)) {
            foreach ($applications as $application) {
                // Check if the keys exist before accessing them
                $title = isset($application['job_title']) ? $application['job_title'] : 'N/A';
                $company_name = isset($application['job_company_name']) ? $application['job_company_name'] : 'N/A';
                $image_url = isset($application['image_url']) ? $application['image_url'] : 'N/A';
                $job_id = isset($application['job_id']) ? $application['job_id'] : 'N/A';

                if ($application['is_answered'] == 1 && $application['is_accepted']== 1) {
                    $status = 'Accepted';
                    $statusClass = 'text-success';
                } elseif ($application['is_answered'] == 1 && $application['is_accepted']== 0) {
                    $status = 'Rejected';
                    $statusClass = 'text-danger';
                } else {
                    $status = 'Pending';
                    $statusClass = 'text-warning';
                }
        ?>
                <!-- Your card view HTML -->
                <div class="col-md-4 mb-4 text-center">
                    <div class="card">
                        <div class="card-body">
                           <a href="details.php?id=<?php echo $job_id ?>" > <img src="./<?php echo $image_url ?>" height="300px"/></a>
                            <h5 class="card-title"><?php echo $title; ?></h5>
                            <p class="card-text">Company: <?php echo $company_name; ?></p>
                            <p class="card-text">Status: <span class="<?php echo $statusClass; ?>"><?php echo $status; ?></span></p>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<img src='./images/no_Results.jpg' width=100px height=400px>";
        }
        ?>
    </div>
</div>

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
        var carouselItems = $('.carousel-item');
        carouselItems.each(function(index, item){
            var currentSrc = $(item).find('img').attr('src');
            
            // Update each image individually based on the mode
            switch(index) {
                case 0:
                    $(item).find('img').attr('src', currentSrc.includes('slide2.png') ? 'images/slide1.png' : 'images/slide2.png');
                    break;
                case 1:
                    $(item).find('img').attr('src', currentSrc.includes('3.png') ? 'images/4.png' : 'images/3.png');
                    break;
                case 2:
                    $(item).find('img').attr('src', currentSrc.includes('6.png') ? 'images/5.png' : 'images/6.png');
                    break;
            }
        });
  
      
    });
});
</script>
</body>
</html>




