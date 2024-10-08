<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Jobs</title>

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
            margin-left: 220px; 
            padding-top: 60px; 
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
        
        <nav id="sidebar" class="col-md-3 col-lg-2 light-mode">
            <div class="sidebar-sticky text-center">
            <a class="navbar-brand light-mode m-2" href="dashboard_index.php"><img src="./images/techjob_dK.png" id="logo" width="80px" height="80px" style="margin-top:30px" class="light-mode"></a>

            <p class="light-mode fw-bold mt-3" >Welcome,<br>
               <?php echo $_SESSION['name']?></p>
                <ul class="nav flex-column">
                    <li class="nav-item">
                    <a class="nav-link dropdown-toggle light-mode" href="#" role="button" data-bs-toggle="dropdown">Jobs</a>
                <ul class="dropdown-menu light-mode">
                    <li><a class="dropdown-item light-mode" href="add_job.php">Add Job</a></li>
                    <li><a class="dropdown-item light-mode" href="view_jobs.php">View Jobs</a></li>
                </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link light-mode" href="majors.php" role="button" >Major</a>
              
                    </li>
                    <li class="nav-item">
                    <a class="nav-link light-mode" href="locations.php" role="button" >Location</a>
                
                    </li>


                    
                    <li class="nav-item">
                    <a class="nav-link light-mode" href="reviews.php" role="button" >Reviews</a>
                
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
       <center> <h2 class="light-mode">Jobs</h2></center>
       <div class="row mb-3 justify-content-end">
    <div class="col-md-2">
        <input type="text" class="form-control" id="liveSearch" placeholder="Search jobs...">
    </div>
</div>

<div class="row mb-3 justify-content-start">
    <div class="col-md-3">
        <label for="majorFilter" class="form-label light-mode">Major Filter</label>
        <select class="form-select" id="majorFilter">
            <option value="">All Majors</option>
            <?php
                $majorQuery = "SELECT * FROM major";
                $majorResult = mysqli_query($conn, $majorQuery);
                while ($majorRow = mysqli_fetch_assoc($majorResult)) {
                    echo "<option value='{$majorRow['id']}'>{$majorRow['name']}</option>";
                }
            ?>
        </select>
    </div>
    <div class="col-md-3">
        <label for="locationFilter" class="form-label light-mode">Location Filter</label>
        <select class="form-select" id="locationFilter">
            <option value="">All Locations</option>
            <?php
                // Fetch locations from the database and populate the dropdown
                $locationQuery = "SELECT * FROM city";
                $locationResult = mysqli_query($conn, $locationQuery);
                while ($locationRow = mysqli_fetch_assoc($locationResult)) {
                    echo "<option value='{$locationRow['id']}'>{$locationRow['name']}</option>";
                }
            ?>
        </select>
    </div>
    <div class="col-md-2">
        <label for="typeFilter" class="form-label light-mode">Type Filter</label>
        <select class="form-select" id="typeFilter">
            <option value="">All Types</option>
            <?php
                $typeQuery = "SELECT * FROM type";
                $typeResult = mysqli_query($conn, $typeQuery);
                while ($typeRow = mysqli_fetch_assoc($typeResult)) {
                    echo "<option value='{$typeRow['id']}'>{$typeRow['name']}</option>";
                }
            ?>
        </select>
    </div>

    <div class="col-md-2 mt-5">
    <label class="form-check-label light-mode">
        <input type="radio" name="publishFilter" value="1" class="form-check-input" id="publishedOnly"> Both
    </label>

    <label class="form-check-label light-mode">
        <input type="radio" name="publishFilter" value="0" class="form-check-input" id="both">Published Only
    </label>
</div>
            <div class="col-md-2 mt-3">
           
         
            <button class="btn btn-secondary" onclick="resetFilters()">Reset Filters</button>
          
       </div>  

</div>
       <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Company</th>
                            <th>Location</th>
                            <th>Type</th>
                            <th>Major</th>
                            <th>Is_Published</th>
                            <th>Nb of Applicants</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                       $query = "SELECT * FROM job";

                       $result = mysqli_query($conn, $query);               
                       while ($row = mysqli_fetch_assoc($result)) {
                       if($row['is_published'] == 1){
                        $is_published='Yes';
                       }else{
                        $is_published='No';
                       }

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
                        $id= $row['id'];
                        $query4 = "SELECT COUNT(*) as nb_applicants FROM applicant where job_id='$id'";
                        $result4 = mysqli_query($conn, $query4);
                        $row4 = mysqli_fetch_assoc($result4);
                        
                        echo "<tr id='locationRow_$id' data-major_id='{$row3['id']}' data-location_id='{$city_id}' data-type_id='{$type_id}' data-is_published='{$row['is_published']}'>";
                        echo "<td><img src='{$row['image_url']}' width=100px height= 100px></td>";
                           echo "<td><a href=job_details.php?ID={$row['id']}>{$row['name']}</a></td>";
                           echo "<td>{$row['company_name']}</td>";
                           echo "<td>{$row1['name']}</td>";
                           echo "<td>{$row2['name']}</td>";
                           echo "<td>{$row3['name']}</td>";
                           echo "<td>{$is_published}</td>";
                           echo"<td>{$row4['nb_applicants']}</td>";
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
                <input type="checkbox" class="form-check-input" id="editis_published" name="editis_published" >
             <label for="editis_published" class="form-label light-mode">Is _Published</label>
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

function filterTable() {
    var majorFilter = $('#majorFilter').val();
    var locationFilter = $('#locationFilter').val();
    var typeFilter = $('#typeFilter').val();
    var publishFilter = $('input[name="publishFilter"]:checked').val();
    console.log({
    "major": majorFilter,
    "location": locationFilter,
    "type": typeFilter,
    "publish": publishFilter
});
   
    $('table tbody tr').each(function() {
        var majorId = $(this).data('major_id');
        var locationId = $(this).data('location_id');
        var typeId = $(this).data('type_id');
        var isPublished = $(this).data('is_published');

        var majorMatch = majorFilter === '' || majorId == majorFilter;
        var locationMatch = locationFilter === '' || locationId == locationFilter;
        var typeMatch = typeFilter === '' || typeId == typeFilter;
        var publishMatch = publishFilter === undefined || publishFilter == '1' || isPublished == '1';

        if (majorMatch && locationMatch && typeMatch && publishMatch) {
            $(this).show();
        } else {
            $(this).hide();
        }

        console.log({
            "majorId": majorId,
            "locationId": locationId,
            "typeId": typeId,
            "isPublished": publishMatch
        });
    });
}




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
    $('#editis_published').prop('checked', is_published == 1);
    $('#editimageurl').attr('src', image_url);
    var jobType = type_id; 
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


    $('#liveSearch').on('input', function () {
        var searchText = $(this).val().toLowerCase();
        $('table tbody tr').each(function () {
            var rowText = $(this).text().toLowerCase();
            if (rowText.includes(searchText)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });


$('input[name="publishFilter"]').on('change', function () {
    filterTable();
});
$('#majorFilter').on('change', function() {
    filterTable();
});

$('#locationFilter').on('change', function() {
    filterTable();
});

$('#typeFilter').on('change', function() {
    filterTable();
});



});
function resetFilters() {
    $('#liveSearch').val('');
    $('#majorFilter').val('');
    $('#locationFilter').val('');
    $('#typeFilter').val('');
    $('#is_published').prop('checked', false);
    $('table tbody tr').show();
}



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
    var is_published = $('#editis_published').is(':checked') ? 1 : 0;

    var type_id = $('input[name="editJobType"]:checked').val();

    var newImageFile = $('#editImage')[0].files[0];

    if (newImageFile) {
        var formData = new FormData();
        formData.append('image', newImageFile);

        $.ajax({
            type: 'POST',
            url: 'upload_image.php',  
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                var image_url = response;

                updateJobDetails(id, name, company_name, email, phone, salary, requirements, objectives,
                    city_id, major_id, description, is_published, image_url, type_id);
            },
            error: function (error) {
                console.error("Error uploading new image:", error);
            }
        });
    } else {
        var image_url = $('#editimageurl').attr('src');

        updateJobDetails(id, name, company_name, email, phone, salary, requirements, objectives,
            city_id, major_id, description, is_published, image_url, type_id);
    }
}


function updateJobDetails(id, name, company_name, email, phone, salary, requirements, objectives,
    city_id, major_id, description, is_published, image_url, type_id) {
        console.log("Data to be sent in AJAX request:", {
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
        });
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
            const data = JSON.parse(response);

            var editedRow = $("#locationRow_" + id);
       
            editedRow.find('td:eq(1)').text(name);
            editedRow.find('td:eq(2)').text(company_name);

            var imageSrc = (image_url !== "") ? image_url : "default_image.jpg"; 
            editedRow.find('td:eq(0)').html('<img src="' + imageSrc + '" alt="Image" width=100px height= 100px>');
            editedRow.find('td:eq(3)').text(data.city_name);
             editedRow.find('td:eq(4)').text(data.type_name);
           editedRow.find('td:eq(5)').text(data.major_name);


            if (is_published == 1) {
                editedRow.find('td:eq(6)').text('Yes');
            } else {
                editedRow.find('td:eq(6)').text('No');
            }
            $('#editJobModal').modal('hide');
        },
        error: function (error) {
            console.error(error);
        }
    });
}



</script>
</body>
</html>