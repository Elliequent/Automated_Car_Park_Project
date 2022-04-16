<?php

require 'System/Config/config.php';
require 'System/Form_Handlers/Login_Handler.php';

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
  <title>Login Page</title>
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
      <div class="card">
        <div class="card-header">
          <h3>Sign In</h3>
          <div class="d-flex justify-content-end social_icon">
            <span><i class="fab fa-facebook-square"></i></span>
            <span><i class="fab fa-google-plus-square"></i></span>
            <span><i class="fab fa-twitter-square"></i></span>
          </div>
        </div>
        <div class="card-body">
          <form action="Login.php" method="POST">
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>

              <input type="text" name="log_email" class="form-control" placeholder="username" value="<?php 
              if(isset($_SESSION['log_email'])) {		// Stores email entry in session aata
                echo $_SESSION['log_email'];
              } 
              ?>">
              
            </div>
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>

              <input type="password" name="log_password" class="form-control" placeholder="password">
              
            </div>
            <div class="row align-items-center remember">

              <input type="checkbox" name="remember_me" value="remember">Remember Me

            </div>
            <div class="form-group">
              <input type="submit" name="login_button" value="Login" class="btn float-right login_btn">
            </div>
          </form>

          <?php

					  if(in_array("ERROR", $error_array)) echo 
            
            "

            <br>
            <br>
            <hr style = 'border: 2px solid white;'>
            <p style = 'color:white; text-align:center;'> The Email or Password you have provided does not match our records </p>
            <hr style = 'border: 2px solid white;'>
            
            ";
					
          ?>

        </div>
        <div class="card-footer">
          <div class="d-flex justify-content-center links">
            Don't have an account?<a href="Register.php">Sign Up</a>
          </div>
          <div class="d-flex justify-content-center">
            <a href="Forgot_password.php">Forgot your password?</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>