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


  h1.light-mode, h3.light-mode, p.light-mode{
      color: #0C7474
  }

  div.dark-mode{
      background-color: #0C7474;  
  }
  h1.dark-mode, h3.dark-mode, p.dark-mode{
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
          <a class="nav-link light-mode" href="./about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link light-mode" href="./contactus.php">Contact us</a>
        </li>  
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle light-mode" href="#" role="button" data-bs-toggle="dropdown">Dropdown</a>
          <ul class="dropdown-menu light-mode">
            <li><a class="dropdown-item light-mode" href="#">Link</a></li>
            <li><a class="dropdown-item light-mode" href="#">Another link</a></li>
            <li><a class="dropdown-item light-mode" href="#">A third link</a></li>
          </ul>
        </li>
      </ul>
    </div>


    <?php if (!empty($src)) : ?>
                <a class="navbar-brand" href="#">
                     <img src="<?php echo $src; ?>" alt="Avatar Logo" style="width:40px;" class="rounded-pill"> 
                  </a>   
    <?php else : ?>
     
            <a class="btn btn-light light-mode" href="./sign_up.php">Login / Sign Up</a>
         
    <?php endif; ?>
  
  </div>
  <div id="darkModeToggle" class="dark-mode-toggle">    
    <span class="dark-mode-icon">&#9788;</span>
</div>
</nav>


<!-- Add this code inside the body section of your HTML -->
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/slide2.png" class="d-block w-100"  height="400px" alt="Slide 1">
    </div>
    <div class="carousel-item">
      <img src="images/3.png" class="d-block w-100"  height="400px" alt="Slide 2">
    </div>
    <div class="carousel-item">
      <img src="images/6.png" class="d-block w-100" height="400px" alt="Slide 3">
    </div>
    <!-- Add more carousel items as needed -->
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<script>
$(document).ready(function(){
    $('#darkModeToggle').on('click', function(){
        $('div').toggleClass('light-mode dark-mode');
        $('h1, h3, p').toggleClass('light-mode dark-mode');
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




