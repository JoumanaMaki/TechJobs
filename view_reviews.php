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

    if(isset($_GET['sent'])){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Application submitted successfully!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    if(isset($_SESSION['login_id'])){
        $src = $_SESSION['image'];
    }
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
    </div> 
    <?php else : ?>
     
            <a class="btn btn-light light-mode" href="./sign_up.php">Login / Sign Up</a>
         
    <?php endif; ?>
  
  </div>
  <div id="darkModeToggle" class="dark-mode-toggle">    
    <span class="dark-mode-icon">&#9788;</span>
</div>
</nav>
    <div class="container-fluid text-center">
        <h1 style="font-family: 'Playfair Display', serif; font-weight: bold;">All Reviews</h1>
    
    <div class="row">
        <?php
        $sql = "SELECT * FROM review WHERE is_published = 1";
       
        $result = $conn->query($sql);
       
        $sql = "SELECT name, img_url, feedback, rating FROM review WHERE is_published = 1 ";
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
    </div>
    


<footer class="text-center text-lg-start text-muted light-mode">
  
  <section class="">
    <div class="container-fluid text-center text-md-start mt-5">
    
      <div class="row mt-3">
      
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

       
    </script>
</body>
</html>
