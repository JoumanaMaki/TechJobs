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
      footer.light-mode{
        background-color: #D4EAF4;  
    }

    footer.dark-mode{
        background-color: #0C7474;  
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

<div class="container-fluid text-center exception light-mode p-3" >
  <h2 class="light-mode " >Tech Jobs</h2>
  <p class="light-mode fs-5 fw-bold">  
Discover your dream tech job effortlessly with our user-friendly web app! Browse curated job postings from our administrators and apply with just a few clicks. Elevate your career in the ever-evolving tech landscape – opportunities await!</p>
    </div>

<div class="container-fluid text-center dark-mode" >
<div class="row "> 
<img class="col-6" src="images/handshake_about.png"> 

<p class="col-6 dark-mode fw-bold" style="margin-top:100px;">In the fast-paced landscape of technological innovation, the demand for skilled professionals has never been greater. Founded in 2023, Tech Jobs emerges as a beacon in the digital realm, carving out a niche as a dynamic platform committed to fostering meaningful connections between employers and tech enthusiasts. Our mission is clear: to bridge the gap in the ever-evolving field of technology, where talent and opportunity converge.
  <br>
  <br>
   <a href="about.php" class="btn dark-mode">About Us </a>
   </p>
    </div>
   
    </div>




    <div class="container-fluid text-center light-mode p-3" >
<div class="row"> 
<h2 class="light-mode">Testimonials</h2>
<div>
   
    </div>


    </div>
    </div>


    
<footer class="text-center text-lg-start text-muted light-mode">
  
  <section class="">
    <div class="container-fluid text-center text-md-start mt-5">
    
      <div class="row mt-3">
      
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
         
          <h6 class="text-uppercase fw-bold mb-4 ">
          Company name
          </h6>
          <p class="light-mode">
            Here you can use rows and columns to organize your footer content. Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
          </p>
        </div>
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          
          <h6 class="text-uppercase fw-bold mb-4 light-mode">
            Products
          </h6>
          <p>
            <a href="#!" class="light-mode">Angular</a>
          </p>
          <p>
            <a href="#!" class="light-mode">React</a>
          </p>
          <p>
            <a href="#!" class="light-mode">Vue</a>
          </p>
          <p>
            <a href="#!" class="light-mode">Laravel</a>
          </p>
        </div>
       

       
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
         
          <h6 class="text-uppercase fw-bold mb-4 light-mode">Contact</h6>
          <p class="light-mode"> New York, NY 10012, US</p>
          <p class="light-mode">
            <i class="fas fa-envelope me-3"></i>
            info@example.com
          </p>
          <p class="light-mode"><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
        </div>
      </div>
    
    </div>
  </section>

  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2023 Copyright:
    <a class="text-reset fw-bold light-mode" href="index.php">techjob@job.com</a>
  </div>
 
</footer>

<script>
$(document).ready(function(){
    $('#darkModeToggle').on('click', function(){
        $('div, footer').toggleClass('light-mode dark-mode');
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




