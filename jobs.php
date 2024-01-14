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
    <div class="container-fluid text-center">
        <h1 style="font-family: 'Playfair Display', serif; font-weight: bold;">All Jobs</h1>
    
        <form class="row mb-3 mt-5" method="get" action="">
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
                echo "<div class='card col-4 m-5' style='width: 18rem; cursor: pointer;' onclick='location.href=\"details.php?id={$row['id']}\"'>";
                echo "<img class='card-img-top' src='{$row['image_url']}' height='300px' alt='Card image cap'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>{$row['name']}</h5>";
                echo "<p class='card-text'>{$row['description']}</p>";
                echo "<a href='#' class='btn btn-primary'>Go somewhere</a>";
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
                $('form').submit();
            });
        });
    
        function resetFilters() {
            $('#majorFilter, #cityFilter, #typeFilter').val('');
            $('form').submit();
        }
    </script>
</body>
</html>
