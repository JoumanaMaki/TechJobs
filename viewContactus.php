<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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


        p.light-mode{
            color: #0C7474;
            font-weight:bold
        }

        p.dark-mode{

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

        p.dark-mode{

         color: #D4EAF4;
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
            height: 100vh; 

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
        <nav id="sidebar" class="col-md-3 col-lg-2 light-mode">
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
                    <a class="nav-link dropdown-toggle light-mode" href="#" role="button" data-bs-toggle="dropdown">Major</a>
                <ul class="dropdown-menu light-mode">
                    <li><a class="dropdown-item light-mode" href="add_major.php">Add Major</a></li>
                    <li><a class="dropdown-item light-mode" href="view_majors.php">View Majors</a></li>
                    <!-- Add more links as needed -->
                </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link light-mode" href="locations.php" role="button" >Location</a>
                    </li>
                    <li class="nav-item dropdown">
                <a class="nav-link light-mode" href="types.php" role="button" >Type</a>
    </li>


    </li>
                    <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle light-mode" href="#" role="button" data-bs-toggle="dropdown">Contact Us</a>
                <ul class="dropdown-menu light-mode">
                    <li><a class="dropdown-item light-mode" href="viewContactus.php">View Contact Us</a></li>
                
                    <!-- Add more links as needed -->
                </ul>
    </li>
            </div>

                    <div id="darkModeToggle" class="dark-mode-toggle" style="display:flex; justify-content:center">
            <span class="dark-mode-icon">&#9788;</span>
        </div>
        </nav>

        <!-- Main content -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 light-mode">
        <div class="container mt-5 text-center">
                <h2 class="light-mode m-5">Contact Us Table</h2>
                <table class="table table-responsive table-hover ">
                    <thead>
                        <tr>
                            
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT * FROM contact_us";
                            $result = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                
                                echo "<tr>";
                             
                                echo "<td>{$row['name']}</td>";
                                echo "<td><a href='mailto:{$row['email']}'>{$row['email']}</a></td>";
                                echo "<td>{$row['subject']}</td>";
                                echo "<td>{$row['message']}</td>";
                                echo "<td>
                                <a class='btn btn-danger m-3' href='delete_contactus.php?ID=". $row['id']."'>Delete</a>

                                      </td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>




<script>

$(document).ready(function(){
    $('#darkModeToggle').on('click', function(){
        $('nav, main, table').toggleClass('light-mode dark-mode');
        $('ul.dropdown-menu').toggleClass('light-mode dark-mode');
        $('a.nav-link, a.navbar-brand, a.btn, a.dropdown-item, p, h2').toggleClass('light-mode dark-mode');
        var Image = $('#logo');
        var current = Image.attr('src');
        var newsrc = current.includes('techjob_dK.png') ? 'images/tech_job_lg.png' : 'images/techjob_dK.png';
        Image.attr('src', newsrc);
    });
});
</script>
</body>
</html>