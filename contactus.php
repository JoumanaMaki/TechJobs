<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
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
        footer.light-mode{
            background-color: #D4EAF4;  
        }

        footer.dark-mode{
            background-color: #0C7474;  
        }

        h1.light-mode, h3.light-mode, p.light-mode, h6.light-mode, label.light-mode{
        color: #0C7474
        }

        h2.dark-mode, h4.dark-mode{
            color: #0C7474
        }

        h2.light-mode, h4.light-mode{
            color: #D4EAF4
        }

        div.dark-mode{
            background-color: #0C7474;  
        }
        h1.dark-mode, h3.dark-mode, p.dark-mode, h6.dark-mode, label.dark-mode{
            color: #D4EAF4
        }
        section.light-mode{
            background-color: #0C7474;  
        }
        section.dark-mode{
            background-color: #D4EAF4;  
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
</body>



<!--Section: Contact v.2-->
<section class="light-mode">

   
    <h2 class="h1-responsive font-weight-bold text-center p-3 light-mode">Contact us</h2>
    <!--Section description-->
    <h4 class="text-center w-responsive mx-auto mb-5 light-mode">Feel Free to send Us a message!</h4>

    <div class="row light-mode p-4">

        <!--Grid column-->
        <div class="col-md-9 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" action="./apis/contact_us.php" method="POST">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                        <label for="name" class="light-mode fw-bold">Your name</label>
                            <input type="text" id="name" name="name" class="form-control">
                          
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                        <label for="email" class="light-mode fw-bold">Your email</label>
                            <input type="text" id="email" name="email" class="form-control">
                           
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                        <label for="subject" class="light-mode fw-bold">Subject</label>
                            <input type="text" id="subject" name="subject" class="form-control">
                            
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                        <label for="message" class="light-mode fw-bold">Your message</label>
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                          
                        </div>

                    </div>
                </div>
                <!--Grid row-->
                <div class="text-center text-md-left">
                <!-- <a class="btn btn-light light-mode m-3" onclick="document.getElementById('contact-form').submit();">Send</a> -->
        <button class="btn btn-light light-mode m-3" type="submit">Send</button>
            </div>
            </form>

           
            <div class="status text-center" style="color:red"></div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 text-center mt-5">
            <ul class="list-unstyled mb-0">
                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                    <p class="light-mode fw-bold">Beirut, Lebanon</p>
                </li>

                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                    <p class="light-mode fw-bold">+961 71 987 123</p>
                </li>

                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                    <p class="light-mode fw-bold">techjob@job.com</p>
                </li>
            </ul>
        </div>
        <!--Grid column-->

    </div>

</section>
<!--Section: Contact v.2-->

<script>
$(document).ready(function(){
    $('#darkModeToggle').on('click', function(){
        $('div, footer, section, label').toggleClass('light-mode dark-mode');
        $('div').toggleClass('light dark');
        $('h1, h3, p, h6, h2, h4').toggleClass('light-mode dark-mode');
        $('nav.navbar').toggleClass('light-mode dark-mode');
        $('ul.dropdown-menu').toggleClass('light-mode dark-mode');
        $('a,a.nav-link, a.navbar-brand, a.btn, a.dropdown-item').toggleClass('light-mode dark-mode');
        var Image = $('#logo');
        var current = Image.attr('src');
        var newsrc = current.includes('techjob_dK.png') ? 'images/tech_job_lg.png' : 'images/techjob_dK.png';
        Image.attr('src', newsrc);

    });




    $('#contact-form').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: './apis/contact_us.php', 
                data: formData,
                success: function(response) {
                    $('.status').html(response.message);
                    $('#contact-form')[0].reset();
                },
                error: function(error) {
                   
                    $('.status').html('Error occurred: ' + error.statusText);
                }
            });
        });

    });

</script>
</html>