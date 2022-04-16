<?php

require 'System/Config/config.php';
require 'System/Form_Handlers/Forgot_Password_Handler.php';

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password Page</title>
  <!--Made with love by Mutiullah Samim -->
  
 <!--Bootsrap 4 CDN-->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   
   <!--Fontawesome CDN-->
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

 <!--Custom styles-->
 <link rel="stylesheet" type="text/css" href="styles.css">
  <title>Home</title>
  <link rel="icon" href="../Images/Logo.png">
  <link rel="stylesheet" href="Assets/CSS/stylesheet.css">
  <link rel="stylesheet" href="Assets/CSS/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>

</head>

<body class="login_body">
  <div class="container">
    <div class="d-flex justify-content-center h-100">
      <div class="forget-card">
        <div class="card-header">
          <h3>please enter your email</h3>
          <div class="d-flex justify-content-end social_icon">
          </div>
        </div>
        <div class="card-body">
          <form action="Forgot_Password.php" method="POST">
              <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>

              <input type="text" name="for_email" class="form-control" placeholder="Email">
              
            </div>

            <?php

					    if(in_array("SUCCESS", $error_array)) echo "<br> <p style = 'color: green; text-align: center;'> Email sent - Please follow instructions to reset password </p> <br>";
              else if(in_array("ERROR", $error_array)) echo "<br> <p style = 'color: white; text-align: center;'> Email address not found </p> <br>";

            ?>

            <div class="form-group">
              <input type="submit" name="forgot_password" value="Submit" class="btn float-right login_btn">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>