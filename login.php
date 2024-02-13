<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LogIn Page</title>
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
            margin-top: 100px;
            margin-left:100px;
            width:400px
        }
        h2{
        margin-top:200px;
        margin-bottom:50px;
        }
    </style>
</head>
<body class="light-mode">
<div id="alertsContainer"></div>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-5 text-center">
                <div class="card-header text-center">
                    <h2>Log In</h2>
                </div>
                <div class="card-body">
                  
                    <form id="logInForm" method="post" action="apis/login.php" enctype="multipart/form-data">
                       
                        <div class="form-group">
                            <label class="light-mode" for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label class="light-mode" for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                      
                        <button type="submit"  class="btn light-mode">Log In</button>
                    </form>
                    <p class="mt-3 fw-bold" style="margin-left:230px">Create account? <a href="sign_up.php" class="light-mode">Sign Up here</a></p>
                    <p class="mt-3 fw-bold" style="margin-left:230px">Account not verified? <a href="send_verification.php" id="activateLink" class="light-mode">Activate</a></p>

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

        $('#darkModeToggle').on('click', function () {
            $('body').toggleClass('light-mode dark-mode');
            $('label').toggleClass('light-mode dark-mode');
            $('button').toggleClass('light-mode dark-mode');
            var imageElement = $('#profileImage');
            var currentSrc = imageElement.attr('src');
            var newSrc = currentSrc.includes('techjob_dK.png') ? 'images/tech_job_lg.png' : 'images/techjob_dK.png';
            imageElement.attr('src', newSrc);
        });

        $('#activateLink').on('click', function (e) {
        e.preventDefault();
        var email = $('#email').val(); // Retrieve the value from the input field
       
        $.ajax({
            type: 'POST',
            url: 'send_verification.php', 
            dataType: 'json',
            data: {
                email: email           },
            success: function (response) {
                if (response.status === 'success') {
                    alert('Verification email sent successfully!');
                } else {
                    showErrorAlert(response.message);
                }
            },
            error: function () {
                alert('Failed to send verification email. Please try again.');
            }
        });
    });

  

$('#logInForm').submit(function (e) {
    e.preventDefault();

$.ajax({
    type:'POST',
    url:'apis/login.php',
    data: $(this).serialize(),
    dataType:'json',
    success:function(response){
        if (response.status === 'success') {
                    alert('LogIn successful!');
                    if(response.role == "User"){
                    window.location.href = 'index.php?login=true';}
                    else{
                        window.location.href = 'dashboard_index.php?login=true';}
                    }
                 else {
                    showErrorAlert(response.message);
                }
    },
    error: function(){
        alert('LogIn failed. Please try again.');

    }
})
  
})

})
</script>

</body>
</html>
