<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Jobs</title>

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
        a.light-mode:hover, h2.light-mode{
            color: #0C7474;
            font-weight:bold
        }

        
        a.dark-mode,
        a.dark-mode:hover, h2.dark-mode{
            color: #D4EAF4;
            font-weight:bold
        }


        p.light-mode, label.light-mode, h4.light-mode{
            color: #0C7474;
            font-weight:bold
        }

        p.dark-mode,label.dark-mode,h4.dark-mode{

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
        main.light-mode,  table.light-mode{
            background-color:#e9f4f9;

        }

           
        main.dark-mode,  table.dark-mode{
            background-color:#0e8b8b;

        }

        main.light-mode, main.dark-mode {
            margin-left: 220px; /* Set to the width of your sidebar */
            padding-top: 60px; /* Adjust based on your navbar height */
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
            width: 220px; /* Set the desired width of your sidebar */
           
            transition: width 0.3s;
            overflow-y: auto;
        }
       
    </style>
</head>
<body>
    
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-3 col-lg-2 light-mode">
            <div class="sidebar-sticky text-center">
            <a class="navbar-brand light-mode m-5" href="#"><img src="./images/techjob_dK.png" id="logo" width="80px" height="60px" style="margin-top:30px" class="light-mode"></a>

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
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 light-mode">
        <div class="container mt-5">
       <center> <h2 class="light-mode">Job Management</h2></center>

       <?php

if (isset($_GET['error'])) {
    if ($_GET['error'] == 'duplicate') {
        echo '<h4 style="color:red; font-weight:bold">Name already exists</h4>';
    }
}
?>

        <div class="mb-5">
            <form action="add_job_action.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label light-mode">Job Title</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Job Title" required>
                </div>
                <div class="mb-3">
                    <label for="company" class="form-label light-mode">Company Name</label>
                    <input type="text" class="form-control"  id="company" name="company" placeholder="Enter Company Name" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label light-mode">Company Email</label>
                    <input type="email" class="form-control"  id="email" name="email" placeholder="Enter Company Email" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label light-mode">Company Phone Number</label>
                    <input type="text" class="form-control"  id="phone" name="phone" placeholder="Enter Company Phone Number" required>
                </div>

                <div class="mb-3">
                    <label for="salary" class="form-label light-mode">Salary</label>
                    <input type="number" class="form-control"  id="salary" step="0.00000001" name="salary" placeholder="Enter salary" required>
                </div>
                <div class="mb-3">
                    <label for="requirements" class="form-label light-mode">Requirements</label>
                    <input type="text" class="form-control"  id="requirements" name="requirements" placeholder="Enter Requirements" required>
                </div>
                <div class="mb-3">
                    <label for="objectives" class="form-label light-mode">Objectives</label>
                    <input type="text" class="form-control"  id="objectives" name="objectives" placeholder="Enter Objectives" required>
                </div>

                <div class="mb-3">
                            <label for="city" class="form-label light-mode">City</label>
                            <select class="form-select" id="city" name="city" required>
                                <?php
                                // Fetch cities from the database and populate the dropdown
                                $cityQuery = "SELECT * FROM city";
                                $cityResult = mysqli_query($conn, $cityQuery);
                                while ($cityRow = mysqli_fetch_assoc($cityResult)) {
                                    echo "<option value='{$cityRow['id']}'>{$cityRow['name']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="major" class="form-label light-mode">Major</label>
                            <select class="form-select" id="major" name="major" required>
                                <?php
                              $query = "SELECT * FROM major where is_published = 1";
                              $result = mysqli_query($conn, $query);
                              while($row= mysqli_fetch_assoc($result)){
                                echo "<option value='{$row['id']}'>{$row['name']}</option>";
                              }


                                ?>
                                </select>
                            </div>

                            <div class="mb-3">
    
    <?php
    // Fetch job types from the database and create radio buttons
    $typeQuery = "SELECT * FROM type";
    $typeResult = mysqli_query($conn, $typeQuery);

    // Use a variable to generate a unique name for the radio button group
    $radioGroupName = 'jobType';
    echo "<p class='light-mode'>Job Type</p>";
    while ($typeRow = mysqli_fetch_assoc($typeResult)) {
        echo "<input class='m-2' type='radio' name='{$radioGroupName}' id='type{$typeRow['id']}' value='{$typeRow['id']}' required>";
        echo "<label class='light-mode' for='type{$typeRow['id']}'>{$typeRow['name']}</label>";
    }
    ?>
</div>

                <div class="mb-3">
                    <label for="description" class="form-label light-mode">Description</label>
                    <input type="text" class="form-control"  id="description" name="description" placeholder="Enter Description" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label light-mode">Image</label>
                    <input type="file" class="form-control"  id="image" name="image" required>
                </div>
                <button type="submit" class="btn btn-success">Add Job</button>
            </form>
        </div>
    </div>
        </main>
    </div>
</div>




<script>



$(document).ready(function(){
    $('#darkModeToggle').on('click', function(){
        $('nav, main').toggleClass('light-mode dark-mode');
        $('ul.dropdown-menu').toggleClass('light-mode dark-mode');
        $('a.nav-link, a.navbar-brand, a.btn, a.dropdown-item, p, h2,label,h4').toggleClass('light-mode dark-mode');
        var Image = $('#logo');
        var current = Image.attr('src');
        var newsrc = current.includes('techjob_dK.png') ? 'images/tech_job_lg.png' : 'images/techjob_dK.png';
        Image.attr('src', newsrc);
    });

});

</script>
</body>
</html>