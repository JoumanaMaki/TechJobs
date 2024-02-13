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
        <h1 style="font-family: 'Playfair Display', serif; font-weight: bold;">All Jobs</h1>
    
        <form id ="jobFilters" class="row mb-3 mt-5" method="get" action="">
            <div class="col-md-3">
                <label for="majorFilter" class="form-label light-mode fw-bold">Filter by Major:</label>
                <select class="form-select light-mode" id="majorFilter" name="major">
                    <option value="">All Majors</option>
                    <?php
                    $majorQuery = "SELECT * FROM major";
                    $majorResult = $conn->query($majorQuery);
    
                    while ($majorRow = $majorResult->fetch_assoc()) {
                        echo "<option value='{$majorRow['id']}'>{$majorRow['name']}</option>";
                    }
                    ?>
                </select>
            </div>
    
            <div class="col-md-3">
                <label for="cityFilter" class="form-label light-mode fw-bold">Filter by City:</label>
                <select class="form-select light-mode" id="cityFilter" name="city">
                    <option value="">All Cities</option>
                    <?php
                    $cityQuery = "SELECT * FROM city";
                    $cityResult = $conn->query($cityQuery);
    
                    while ($cityRow = $cityResult->fetch_assoc()) {
                        echo "<option value='{$cityRow['id']}'>{$cityRow['name']}</option>";
                    }
                    ?>
                </select>
            </div>
    
            <div class="col-md-3">
                <label for="typeFilter" class="form-label light-mode fw-bold">Filter by Type:</label>
                <select class="form-select light-mode" id="typeFilter" name="type">
                    <option value="">All Types</option>
                    <?php
                    $typeQuery = "SELECT * FROM type";
                    $typeResult = $conn->query($typeQuery);
    
                    while ($typeRow = $typeResult->fetch_assoc()) {
                        echo "<option value='{$typeRow['id']}'>{$typeRow['name']}</option>";
                    }
                    ?>
                </select>
            </div>
    
            <div class="col-md-3">
                <button type="button" class="btn btn-secondary light-mode" onclick="resetFilters()">Reset Filters</button>
            </div>
        </form>
    
        <?php
        $sql = "SELECT * FROM job WHERE is_published = 1";
        if (isset($_GET['major']) && !empty($_GET['major'])) {
            $major = $_GET['major'];
            $sql .= " AND major_id = '$major'";
        }
    
        if (isset($_GET['city']) && !empty($_GET['city'])) {
            $city = $_GET['city'];
            $sql .= " AND city_id = '$city'";
        }
    
        if (isset($_GET['type']) && !empty($_GET['type'])) {
            $type = $_GET['type'];
            $sql .= " AND type_id = '$type'";
        }
    
        $result = $conn->query($sql);
       
        if ($result->num_rows > 0) {
            echo '<div class="row row-cols-1 row-cols-md-3 mt-3">';
            while ($row = $result->fetch_assoc()) {
                echo "<div class='card col-4 m-5' style='width: 18rem; cursor: pointer;' >";
                echo "<img class='card-img-top' src='{$row['image_url']}' height='300px' alt='Card image cap' onclick='location.href=\"details.php?id={$row['id']}\"'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>{$row['name']}</h5>";
                echo "<p class='card-text'>{$row['description']}</p>";
                echo "<a href='#' class='btn btn-success' onclick='openApplyModal({$row['id']})'>Go somewhere</a>";
                echo "</div></div>";
            }
            echo '</div>';
        } else {
            echo "<img src='./images/no_Results.jpg' style='height:300px'>";
        }
        // Close the database connection
        $conn->close();
        ?>
    </div>
    

    <div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="applyModalLabel">Apply for Job</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="apply" action="apply.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="jobIdInput" name="jobId">
                    <div class="mb-3">
                        <label for="applicantName" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="applicantName" name="applicantName" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="cv" class="form-label">CV</label>
                        <input type="file" class="form-control" id="cv" name="cv" required>
                    </div>
                    <div class="mb-3">
                    <label for="message" class="form-label">Motivational Letter</label>
                    <textarea class="form-control" id="message" rows="4" name="motivation" required></textarea>
                </div>
                    <button type="submit" class="btn btn-primary">Submit Application</button>
                </form>
            </div>
        </div>
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

            $('#majorFilter, #cityFilter, #typeFilter').change(function () {
                if (!$(this).closest('form').is('#apply')) {
                    $(this).closest('#jobFilters').submit();
                }
            });
            });
    
            function openApplyModal(jobId) {
    <?php if (isset($_SESSION['login_id'])) : ?>
        // Check if the user has already applied for this job
        var userId = <?php echo $_SESSION['login_id']; ?>;
        var jobId = jobId;

        $.ajax({
            type: 'POST',
            url: 'check_application.php', // Replace with the actual URL
            data: { userId: userId, jobId: jobId },
            success: function (response) {
                if (response === 'applied') {
                    alert('You have already applied to this job.');
                } else {
                    // User hasn't applied, open the apply modal
                    $('#jobIdInput').val(jobId);
                    $('#applyModal').modal('show');
                }
            },
            error: function () {
                alert('Error checking application status.');
            }
        });
    <?php else : ?>
        var confirmMessage = "Please sign up or log in to apply for this job.";
        confirmMessage += "\nClick 'OK' to sign up, or 'Cancel' to log in.";

        if (confirm(confirmMessage)) {
            window.location.href = "sign_up.php";
        } else {
            window.location.href = "login.php";
        }
    <?php endif; ?>
}


        function resetFilters() {
            $('#majorFilter, #cityFilter, #typeFilter').val('');
            $('#jobFilters').submit();
        }
    </script>
</body>
</html>
