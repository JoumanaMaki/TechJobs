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
}else{
    header('Location:login.php');
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
       <center> <h2 class="light-mode">Jobs</h2></center>

       <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Company</th>
                            <th>Location</th>
                            <th>Type</th>
                            <th>Major</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                       $query = "SELECT * FROM job";

                       // Perform the query
                       $result = mysqli_query($conn, $query);
                     
                       // Loop through the retrieved job data and display it in the table
                       while ($row = mysqli_fetch_assoc($result)) {
                        $city_id=$row['city_id'];
                        $query1 = "SELECT * FROM city where id='$city_id'";
                        $result1 = mysqli_query($conn, $query1);
                        $row1 = mysqli_fetch_assoc($result1);


                        $type_id=$row['type_id'];
                        $query2 = "SELECT * FROM type where id='$type_id'";
                        $result2 = mysqli_query($conn, $query2);
                        $row2 = mysqli_fetch_assoc($result2);

                        $major_id=$row['major_id'];
                        $query3 = "SELECT * FROM major where id='$major_id'";
                        $result3 = mysqli_query($conn, $query3);
                        $row3 = mysqli_fetch_assoc($result3);
                           echo "<tr>";
                           echo "<td><img src='{$row['image_url']}' width=100px height= 100px></td>";
                           echo "<td><a href=job_details.php?ID={$row['id']}>{$row['name']}</a></td>";
                           echo "<td>{$row['company_name']}</td>";
                           echo "<td>{$row1['name']}</td>";
                           echo "<td>{$row2['name']}</td>";
                           echo "<td>{$row3['name']}</td>";
                           echo "<td><a class='btn btn-primary m-1' href='#' onclick='editJob({$row['id']}, \"{$row['name']}\", \"{$row['company_name']}\", \"{$row['requirements']}\", \"{$row['objectives']}\", {$row['major_id']}, {$row['city_id']}, \"{$row['image_url']}\", {$row['author_id']}, {$row['is_published']}, \"{$row['email']}\", \"{$row['phone']}\",\"{$row['type_id']}\", \"{$row['description']}\", {$row['salary']})'>Edit</a> <a class='btn btn-danger' href='delete_job.php?ID={$row['id']}' >Delete</button></td>";
                           echo "</tr>";
                       }
                       ?>
                    
                    </tbody>
                </table>
    </div>
        </main>
    </div>
</div>




<!-- editTypeModal -->
<div id="editJobModal" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="add_type.php" method="post">
                    <!-- Hidden field for type ID -->
                    <input type="hidden" class="form-control" id="editTypeId" name="editTypeId" required>
                    
                    <!-- Job Title -->
                    <div class="mb-3">
                        <label for="editJobTitle" class="form-label light-mode">Job Title</label>
                        <input type="text" class="form-control" id="editJobTitle" name="editJobTitle" placeholder="Enter Job Title" required>
                    </div>
                    
                    <!-- Company Name -->
                    <div class="mb-3">
                        <label for="editCompanyName" class="form-label light-mode">Company Name</label>
                        <input type="text" class="form-control" id="editCompanyName" name="editCompanyName" placeholder="Enter Company Name" required>
                    </div>
                    
                    <!-- Company Email -->
                    <div class="mb-3">
                        <label for="editCompanyEmail" class="form-label light-mode">Company Email</label>
                        <input type="email" class="form-control" id="editCompanyEmail" name="editCompanyEmail" placeholder="Enter Company Email" required>
                    </div>
                    
                    <!-- Company Phone Number -->
                    <div class="mb-3">
                        <label for="editCompanyPhone" class="form-label light-mode">Company Phone Number</label>
                        <input type="text" class="form-control" id="editCompanyPhone" name="editCompanyPhone" placeholder="Enter Company Phone Number" required>
                    </div>
                    
                    <!-- Salary -->
                    <div class="mb-3">
                        <label for="editSalary" class="form-label light-mode">Salary</label>
                        <input type="number" class="form-control" id="editSalary" step="0.00000001" name="editSalary" placeholder="Enter Salary" required>
                    </div>
                    
                    <!-- Requirements -->
                    <div class="mb-3">
                        <label for="editRequirements" class="form-label light-mode">Requirements</label>
                        <input type="text" class="form-control" id="editRequirements" name="editRequirements" placeholder="Enter Requirements" required>
                    </div>
                    
                    <!-- Objectives -->
                    <div class="mb-3">
                        <label for="editObjectives" class="form-label light-mode">Objectives</label>
                        <input type="text" class="form-control" id="editObjectives" name="editObjectives" placeholder="Enter Objectives" required>
                    </div>

                    <!-- City -->
                    <div class="mb-3">
                        <label for="editCity" class="form-label light-mode">City</label>
                        <select class="form-select" id="editCity" name="editCity" required>
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

                    <!-- Major -->
                    <div class="mb-3">
                        <label for="editMajor" class="form-label light-mode">Major</label>
                        <select class="form-select" id="editMajor" name="editMajor" required>
                            <?php
                            $query = "SELECT * FROM major where is_published = 1";
                            $result = mysqli_query($conn, $query);
                            while($row= mysqli_fetch_assoc($result)){
                                echo "<option value='{$row['id']}'>{$row['name']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Job Type -->
                    <div class="mb-3">
                        <?php
                        $typeQuery = "SELECT * FROM type";
                        $typeResult = mysqli_query($conn, $typeQuery);

                        $radioGroupName = 'editJobType';
                        echo "<p class='light-mode'>Job Type</p>";
                        while ($typeRow = mysqli_fetch_assoc($typeResult)) {
                            echo "<input class='m-2' type='radio' name='{$radioGroupName}' id='editType{$typeRow['id']}' value='{$typeRow['id']}' required>";
                            echo "<label class='light-mode' for='editType{$typeRow['id']}'>{$typeRow['name']}</label>";
                        }
                        ?>
                    </div>

                    <div class="mb-3">
                        <label for="editDescription" class="form-label light-mode">Description</label>
                        <input type="text" class="form-control" id="editDescription" name="editDescription" placeholder="Enter Description" required>
                    </div>

                 
                    <div class="mb-3">
                        <label for="editImage" class="form-label light-mode">Image</label>
                        <img src="#" id="editimageurl" width="200px" height="200px">
                        <input type="file" class="form-control" id="editImage" name="editImage" required>
                    </div>
                    <div class="mb-3">
                <input type="checkbox" class="form-check-input" id="is_published" name="is_published" >
             <label for="is_published" class="form-label light-mode">Is _Published</label>
                </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="saveEditJob()">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script>


function editJob(id, name, company_name, requirements, objectives, major_id, city_id, image_url, author_id, is_published, email, phone, type_id, description, salary) {

    $('#editTypeId').val(id);
    $('#editJobTitle').val(name);
    $('#editCompanyName').val(company_name);
    $('#editCompanyEmail').val(email);
    $('#editCompanyPhone').val(phone);
    $('#editSalary').val(salary);
    $('#editRequirements').val(requirements);
    $('#editObjectives').val(objectives);
    $('#editCity').val(city_id);
    $('#editMajor').val(major_id);
    $('#editDescription').val(description);
    $('#is_published').prop('checked', is_published == 1);
    $('#editimageurl').attr('src', image_url);
    var jobType = type_id; // Replace this with the actual variable representing job type
    $('input[name="editJobType"]').filter('[value="' + jobType + '"]').prop('checked', true);
        $('#editJobModal').modal('show');
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

function saveEditJob() {
    var id = $('#editTypeId').val();
    var name = $('#editJobTitle').val();
    var company_name = $('#editCompanyName').val();
    var email = $('#editCompanyEmail').val();
    var phone = $('#editCompanyPhone').val();
    var salary = $('#editSalary').val();
    var requirements = $('#editRequirements').val();
    var objectives = $('#editObjectives').val();
    var city_id = $('#editCity').val();
    var major_id = $('#editMajor').val();
    var description = $('#editDescription').val();
    var is_published = $('#is_published').prop('checked') ? 1 : 0;

    // Check if a new photo has been selected
    var newImageSelected = $('#editImage').prop('files').length > 0;

    // If a new photo is selected, take the new URL; otherwise, use the old URL
    var image_url = newImageSelected ? $('#editImage').attr('src') : $('#editimageurl').attr('src');

    var type_id = $('input[name="editJobType"]:checked').val();

    $.ajax({
        type: 'POST',
        url: 'edit_job.php',
        data: {
            id: id,
            name: name,
            company_name: company_name,
            email: email,
            phone: phone,
            salary: salary,
            requirements: requirements,
            objectives: objectives,
            city_id: city_id,
            major_id: major_id,
            description: description,
            is_published: is_published,
            image_url: image_url,
            type_id: type_id
        },
        success: function (response) {
            // Update the edited row in the table
            var editedRow = $("td:contains('" + id + "')").closest('tr');
            editedRow.find('td:eq(1)').text(name);
            // You can update other cells as needed

            // Close the modal
            $('#editJobModal').modal('hide');
        },
        error: function (error) {
            // Handle the error if needed
            console.error(error);
        }
    });
}


</script>
</body>
</html>