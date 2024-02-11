<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <title>About Us</title>
   

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
    footer.light-mode{
        background-color: #D4EAF4;  
    }

    footer.dark-mode{
        background-color: #0C7474;  
    }

    h1.light-mode, h3.light-mode, p.light-mode, h6.light-mode{
        color: #0C7474
    }

    div.dark-mode{
        background-color: #0C7474;  
    }
    h1.dark-mode, h3.dark-mode, p.dark-mode, h6.dark-mode{
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
<div class="container-fluid text-white text-center light-mode" >
    <center>
    <img id="image" src="images/techjob_dK.png" height="300px">
</center>
  <h1 class="light-mode" style="margin-top:20px">Tech Jobs</h1>

  <div class="row mt-5">
    <div class="col-sm-6">
    <img src="images/mission.png" wisth=50px height=50px>  <h3 class="light-mode">Mission</h3>
      <p class="light-mode">The mission of our platform is to empower individuals in the tech field by providing them with the tools and resources they need to efficiently apply for multiple jobs. We aim to streamline the job application process, making it easier for candidates to discover new opportunities, showcase their skills and experience, and connect with potential employers. Our goal is to help users find their ideal tech jobs faster, while also assisting companies in finding the best talent for their teams. Ultimately, we strive to facilitate meaningful connections between talented professionals and innovative companies, driving growth and success in the tech industry.</p>
    </div>
    <div class="col-sm-6">
    <img src="images/vision.png" wisth=50px height=50px>  <h3 class="light-mode">Vision</h3>
      <p class="light-mode">Our vision is to revolutionize the way individuals navigate their careers in the tech industry. We envision a future where job seekers have access to a centralized platform that not only simplifies the job application process but also provides personalized career guidance and support. Through advanced algorithms and AI-driven recommendations, we aim to match candidates with opportunities that align with their skills, interests, and career aspirations. Additionally, we aspire to foster a vibrant community where users can network, share insights, and collaborate to advance their careers. Our vision is to empower every individual to achieve their full potential and thrive in an evolving industry.</p>
    </div>
    
  </div>



<footer class="text-center text-lg-start text-muted light-mode">
  
  <section class="">
    <div class="container text-center text-md-start mt-5">
    
      <div class="row mt-3">
      
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
         
          <h6 class="text-uppercase fw-bold mb-4 light-mode">
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

</div>


<script>
$(document).ready(function(){
    $('#darkModeToggle').on('click', function(){
        $('div, footer').toggleClass('light-mode dark-mode');
        $('h1, h3, p, h6').toggleClass('light-mode dark-mode');
        $('nav.navbar').toggleClass('light-mode dark-mode');
        $('ul.dropdown-menu').toggleClass('light-mode dark-mode');
        $('a,a.nav-link, a.navbar-brand, a.btn, a.dropdown-item').toggleClass('light-mode dark-mode');
        var Image = $('#logo');
        var current = Image.attr('src');
        var newsrc = current.includes('techjob_dK.png') ? 'images/tech_job_lg.png' : 'images/techjob_dK.png';
        Image.attr('src', newsrc);

        var imageElement = $('#image');
            var currentSrc = imageElement.attr('src');
            var newSrc = currentSrc.includes('techjob_dK.png') ? 'images/tech_job_lg.png' : 'images/techjob_dK.png';
            imageElement.attr('src', newSrc);
    });
});
</script>



</body>
</html>