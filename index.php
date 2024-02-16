<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Jobs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-XBJcev6w/iDqdzEy+GQ5BXS3+1GJmnWF8CMn8Pxi7b6Fwt2MD9pCUFdOu0DdIlzdFlNxyXqm0jNMIj+Nu2fv/g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <?php 
//include "./navbar.php";

include "./db_config/connection.php";
session_start();

if(isset($_SESSION['login_id'])){
    $src = $_SESSION['image'];



    
}




?>



    <style>

/* Profile image in a circle */
.profile-image {
    width: 30px; /* Adjust the size as needed */
    height: 30px; /* Adjust the size as needed */
    margin: 0 auto;
}

.profile-image img {
    width: 50%;
    height: 50%;
    object-fit: cover;
    border-radius: 50%;
}
.card:hover {
        transform: scale(1.05); /* Scale up the card on hover */
    }
    .card:hover {
        transform: scale(1.05); /* Scale up the card on hover */
    }
.rating {
    margin-top: 10px;
    font-size: 24px; /* Adjust the font size as needed */
}

.rating .fa {
    color: #ffc107; /* Adjust the color of the stars */
}


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


<!-- Add the popup dialog HTML markup -->
<?php if ($_SESSION['dialog'] === false): ?>
    <div id="popupDialog" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Yous Feedback is valuable</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form id="feedbackForm" action="submit_feedback.php" method= "post">
                        <div class="mb-3">
                            <label for="feedbackInput" class="form-label">Feedback</label>
                            <textarea class="form-control" id="feedbackInput" name="feedback" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="ratingInput" class="form-label">Rating</label>
                            <div>
                                <input type="radio" id="rating1" name="rating" value=1>
                                <label for="rating1">1</label>
                                <input type="radio" id="rating2" name="rating" value=2>
                                <label for="rating2">2</label>
                                <input type="radio" id="rating3" name="rating" value=3>
                                <label for="rating3">3</label>
                                <input type="radio" id="rating4" name="rating" value=4>
                                <label for="rating4">4</label>
                                <input type="radio" id="rating5" name="rating" value=5>
                                <label for="rating5">5</label>
                            </div>
                        </div>
                    
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-success">Submit</button>
                </form>   </div>
            </div>
        </div>
    </div>
<?php endif; ?>

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
    </div>
  </div>
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

    </div>
<div class="row">
        <?php
        // Retrieve records from the database
        $sql = "SELECT name, img_url, feedback, rating FROM review WHERE is_published = 1 limit 3";
        $result = $conn->query($sql);

        // Check if records exist
        if ($result->num_rows > 0) {
            // Iterate over the records and generate HTML for card views
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col-4 mb-4">
                    <div class="card">
                   
                       
                    <div class="d-flex justify-content-center align-items-center" style="height: 200px;margin-top:10px">
        <img src="<?php echo $row['img_url']; ?>" class="img-fluid rounded-circle" style="max-width: 100%; max-height: 100%;" alt="User Image">
    </div>                   <div class="card-body">   <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <p class="card-text"><?php echo $row['feedback']; ?></p>
                            <div class="rating">
                                <?php
                                // Generate star ratings based on the 'rating' value
                                $rating = intval($row['rating']);
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $rating) {
                                      echo  '★';
                                     
                                    } else {
                                      echo '☆';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p>No testimonials available.</p>";
        }
        ?>
    </div>
   
    <div class="text-center light-mode">
    <a href="view_reviews.php" class="btn btn-success">View All Reviews</a>
</div>
    </div>

    </div>
    


    
<footer class="text-center text-lg-start text-muted light-mode p-3">
  
  <section class="">
    <div class="container-fluid text-center text-md-start ">
    
      <div class="row ">
      
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
         
          <h6 class="text-uppercase fw-bold mb-4 ">
          Tech Jobs
          </h6>
          <p class="light-mode">
          Tech job platforms provide users with access to a diverse array of opportunities in the ever-expanding tech industry, streamlining the job search process and fostering career growth.   </p>
        </div>
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          
          <h6 class="text-uppercase fw-bold mb-4 light-mode">
            Products
          </h6>
          <p>
            <a href="index.php" class="light-mode">HomePage</a>
          </p>
          <p>
            <a href="jobs.php" class="light-mode">Jobs</a>
          </p>
          <p>
            <a href="about.php" class="light-mode">About Us</a>
          </p>
          <p>
            <a href="contactus.php" class="light-mode">Contact Us</a>
          </p>
        </div>
       

       
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
         
          <h6 class="text-uppercase fw-bold mb-4 light-mode">Contact</h6>
          <p class="light-mode"> Lebanon, LB</p>
          <p class="light-mode">
            <i class="fas fa-envelope me-3"></i>
            techjobs@gmail.com
          </p>
          <p class="light-mode"><i class="fas fa-phone me-3"></i> +961 71 887230</p>
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

    <?php if ($_SESSION['dialog'] === false): ?>
        $('#popupDialog').modal('show');
    <?php endif; ?>

    
    $('#popupDialog').on('hidden.bs.modal', function () {
    <?php $_SESSION['dialog'] = true; ?>
});



    
});


function getUrlParameter(name) {
            name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
            var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
            var results = regex.exec(location.search);
            return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
        };

        // Check if feedback_success parameter is set to true
        var feedbackSuccess = getUrlParameter('feedback_success');
        if (feedbackSuccess === 'true') {
            // Display the alert message
            alert('Thank you for your valuable feedback!');
        }
</script>
</body>
</html>




