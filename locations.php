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
        <div class="container mt-5">
       <center> <h2 class="light-mode">Location Management</h2></center>

       <?php

if (isset($_GET['error'])) {
    if ($_GET['error'] == 'duplicate') {
        echo '<h4 style="color:red; font-weight:bold">Name already exists</h4>';
    }
}
?>

        <div class="mb-5">
            <form action="add_location.php" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label light-mode">Location Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Type Name" required>
                </div>
                <div class="mb-3">
                    <label for="latitude" class="form-label light-mode">Latitude</label>
                    <input type="number" class="form-control" step="0.0000001" id="latitude" name="latitude" placeholder="Enter Latitude" required>
                </div>
                <div class="mb-3">
                    <label for="longitude" class="form-label light-mode">Longitude</label>
                    <input type="number" class="form-control"  step="0.0000001" id="longitude" name="longitude" placeholder="Enter Longitude" required>
                </div>
                <button type="submit" class="btn btn-success">Add Location</button>
            </form>
        </div>

        <!-- Table for Displaying Existing Types -->
        <div>
            <h4 class="light-mode">Existing Locations</h4>
            <table class="table table-hover light-mode">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Fetch and display existing types from the database
                        $query = "SELECT * FROM city";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                          
                            echo "<tr id='locationRow_$id'>";
                            echo "<td>{$id}</td>";
                            echo "<td>{$row['name']}</td>";
                            echo "<td>{$row['latitude']}</td>";
                            echo "<td>{$row['longitude']}</td>";

                            echo "<td>
                                    <a class='btn btn-danger m-1' href='delete_location.php?ID={$id}'>Delete</a>
                                    <a class='btn btn-primary m-1' href='#' onclick='editLocation($id, \"{$row['name']}\",\"{$row['latitude']}\",\"{$row['longitude']}\")'>Edit</a>
                                    </td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
        </main>
    </div>
</div>

<div id="editLocationModal" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="add_type.php" method="post">
                <div class="mb-3">
             
                    <input type = "hidden" class="form-control" id="editLocationId" name="id" placeholder="Enter Location Name" required>
              
                    <label for="name" class="form-label">Location Name</label>
                    <input type="text" class="form-control" id="editLocationName" name="name" placeholder="Enter Location Name" required>
                </div>

                <div class="mb-3">
             
       
             <label for="latitude" class="form-label">Latitude</label>
             <input type="number" class="form-control"step="0.0000001"  id="editlatitude" name="latitude" placeholder="Enter Latitude" required>
         </div>

         <div class="mb-3">
             
       
             <label for="longitude" class="form-label">Longitude</label>
             <input type="number" class="form-control" step="0.0000001" id="editlongitude" name="longitude" placeholder="Enter Longitude" required>
         </div>
            
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="saveEditLocation()">Save</button>
            </div>
        </div>
    </div>
</div>


<script>
 function editLocation(id, name,latitude, longitude) {
    $('#editLocationId').val(id);

       $('#editLocationName').val(name);
       $('#editlatitude').val(latitude);
       $('#editlongitude').val(longitude);
      
        $('#editLocationModal').modal('show');
    }
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

function saveEditLocation() {
        var id = $('#editLocationId').val();
        var name = $('#editLocationName').val();
        var latitude = $('#editlatitude').val();
        var longitude = $('#editlongitude').val();

        $.ajax({
            type: 'POST',
            url: 'edit_location.php', 
            data: {
                id: id,
                name: name,
                latitude: latitude,
                longitude: longitude
            },
            success: function(response) {
                var editedRow = $("#locationRow_" + id);
            editedRow.find('td:eq(1)').text(name);
            editedRow.find('td:eq(2)').text(latitude);    
            editedRow.find('td:eq(3)').text(longitude);  
                // Close the modal
                $('#editLocationModal').modal('hide');
            },
            error: function(error) {
                // Handle the error if needed
                console.error(error);
            }
        });
    }
</script>
</body>
</html>