<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Signup Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        body.light-mode {
            background-color: #D4EAF4;
            color: #0C7474;
        }
        
        body.dark-mode {
            background-color: #0C7474;
            color: #D4EAF4;
        }

        .dark-mode-toggle {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        .dark-mode-icon {
            font-size: 24px;
        }

        label.light-mode{
            color: #0C7474;
            font-weight:bold
        }

        button.light-mode{
            margin-top: 30px;
            background-color: #0C7474;
           color: #D4EAF4;
        }

        button.dark-mode{
            margin-top: 30px;
            background-color: #D4EAF4;
            color: #0C7474;
        }


        label.dark-mode{
            color: #D4EAF4;
            font-weight:bold
        }
       
        img{
            margin-top: 80px;
        margin-left:100px;
            width:400px
        }
        h2{
        margin-bottom:50px;
        }
    </style>
</head>
<body class="light-mode">
<div id="alertsContainer"></div>

<div class="container mt-3">
    <div class="row ">
        <div class="col-md-5 text-center">
                <div class="card-header text-center">
                    <h2>Sign Up</h2>
                </div>
                <div class="card-body">
                  
                    <form id="signupForm" method="post" action="apis/signup.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="light-mode" for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label class="light-mode" for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label class="light-mode" for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label class="light-mode" for="dob">Date of Birth:</label>
                            <input type="date" class="form-control" id="dob" name="dob" required>
                        </div>
                        <div class="form-group">
                            <label class="light-mode" for="image">Image URL:</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                        <div class="form-group">
                            <label class="light-mode" for="city_id">City:</label>
                            <select class="form-control" id="city_id" name="city_id" required>
                              
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="light-mode" for="major_id">Major:</label>
                            <select class="form-control" id="major_id" name="major_id" required>
                            </select>
                        </div>
                        <div class="form-group" id="otherMajorInputWrapper" style="display:none;">
                        <label class="light-mode" for="custom_major">Enter a custom major:</label>
                        <input type="text" class="form-control" id="custom_major" name="custom_major">
                    </div>
                        <button type="submit"  class="btn light-mode">Sign Up</button>
                    </form>
        
            </div>
        </div>

        <div class="col-md-2 m-5">
            <img  id="profileImage" src="images/techjob_dK.png">
        </div>
    </div>
</div>


<div id="darkModeToggle" class="dark-mode-toggle">
    <span class="dark-mode-icon">&#9788;</span>
</div>

<script>
  function showErrorAlert(message) {
    // Create and show an alert with Bootstrap classes
    var alertHtml = '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
    alertHtml += '<strong>Error:</strong> ' + message;
    alertHtml += '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
    alertHtml += '</div>';

    // Append the alert to a container (e.g., a div with id="alertsContainer")
    $('#alertsContainer').html(alertHtml);
}

    $(document).ready(function () {

        
        $('#major_id').change(function () {
        var selectedMajor = $(this).val();
        // Show/hide the custom_major input based on the selected option
            if (selectedMajor === 'other') {
                $('#otherMajorInputWrapper').show();
            } else {
                $('#otherMajorInputWrapper').hide();
            }
         });

            if ($('#major_id').val() === 'other') {
                $('#otherMajorInputWrapper').show();
            } else {
                $('#otherMajorInputWrapper').hide();
            }


        $('#darkModeToggle').on('click', function () {
            $('body').toggleClass('light-mode dark-mode');
            $('label').toggleClass('light-mode dark-mode');
            $('button').toggleClass('light-mode dark-mode');
            var imageElement = $('#profileImage');
            var currentSrc = imageElement.attr('src');
            var newSrc = currentSrc.includes('techjob_dK.png') ? 'images/tech_job_lg.png' : 'images/techjob_dK.png';
            imageElement.attr('src', newSrc);
        });

     
      
        $.ajax({
            type: 'GET',
            url: 'apis/get_cities.php', 
            success: function (data) {
                $('#city_id').empty();

            $.each(data.cities, function(index, city) {
                $('#city_id').append('<option value="' + city.id + '">' + city.name + '</option>');
            });
            },
            error: function () {
                alert('Error fetching Cities. Please try again.');
            }
        });

           
        $.ajax({
            type: 'GET',
            url: 'apis/get_majors.php', 
            success: function (data) {
                $('#major_id').empty();

                $.each(data.majors, function(index, major) {
                $('#major_id').append('<option value="' + major.id + '">' + major.name + '</option>');
            });    
          
            },
            error: function () {
                alert('Error fetching Majors. Please try again.');
            }
        });

    //     $('#signupForm').submit(function (e) {
    //     e.preventDefault();

    //     var formData = new FormData(this);

    //     $.ajax({
    //         type: 'POST',
    //         url: 'apis/signup.php',
    //         data: formData,
    //         contentType: false,
    //         processData: false,
    //         dataType: 'json',
    //         success: function (response) {
    //             console.log(response);
    //             if (response.status === 'success') {
    //                 alert('Signup successful!');
    //             } else {
    //                 showErrorAlert(response.message);
    //             }
    //         },
    //         error: function () {
    //             alert('Signup failed. Please try again.');
    //         }
    //     });
    // });

})
  


  
</script>

</body>
</html>
