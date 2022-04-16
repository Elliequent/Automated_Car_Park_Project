<?php

require 'System/Config/config.php';
require 'System/Form_Handlers/Register_Handler.php';

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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

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
          <h3>Register</h3>
          <!-- <div class="d-flex justify-content-end social_icon">
            <span><i class="fab fa-facebook-square"></i></span>
            <span><i class="fab fa-google-plus-square"></i></span>
            <span><i class="fab fa-twitter-square"></i></span>
          </div> -->
        </div>
        <div class="card-body">
          <form action="Register.php" method="POST">
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>

              <input type="text" name="reg_username" class="form-control" placeholder="username" value="<?php 
              if(isset($_SESSION['reg_username'])) {
                echo $_SESSION['reg_username'];
              } 
              ?>" required>

            </div>
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>

              <input type="text" name="reg_fname" class="form-control" placeholder="first name" value="<?php 
              if(isset($_SESSION['reg_fname'])) {
                echo $_SESSION['reg_fname'];
              } 
              ?>" required>
    
            </div>

              <?php if(in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) echo "<p style = 'color:white;'>Your first name must be between 2 and 25 characters</p>"; ?>

            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>

              <input type="text" name="reg_lname" class="form-control" placeholder="last name" value="<?php 
              if(isset($_SESSION['reg_lname'])) {
                echo $_SESSION['reg_lname'];
              } 
              ?>" required>

            </div>

					    <?php if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) echo "<p style = 'color:white;'>Your last name must be between 2 and 25 characters</p>"; ?>

            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>

              <input type="text" name="reg_email" class="form-control" placeholder="email" value="<?php 
              if(isset($_SESSION['reg_email'])) {
                echo $_SESSION['reg_email'];
              } 
              ?>" required>

            </div>

              <?php if(in_array("This email address is already registered<br>", $error_array)) echo "<p style = 'color:white;'>This email address is already registered</p>"; 
              else if(in_array("Invalid email format<br>", $error_array)) echo "<p style = 'color:white;'>Invalid email format</p>";
              ?>

            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-mobile"></i></span>
              </div>

              <input type="tel" name="reg_phone" class="form-control" placeholder="Phone Number" value="<?php 
              if(isset($_SESSION['reg_phone'])) {
                echo $_SESSION['reg_phone'];
              } 
              ?>" required>
              
            </div>

            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
              </div>

              <input type="text" name="reg_address" class="form-control" placeholder="Address" value="<?php 
              if(isset($_SESSION['reg_address'])) {
                echo $_SESSION['reg_address'];
              } 
              ?>" required>

            </div>

            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
              </div>

              <input type="password" name="reg_password" class="form-control" placeholder="password">

            </div>
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>

              <input type="password" name="reg_password2" class="form-control" placeholder="Re-enter password">

            </div>

            <?php if(in_array("Your passwords do not match<br>", $error_array)) echo "<p style = 'color:white;'>Your passwords do not match</p>"; 
            else if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo "<p style = 'color:white;'>Your password can only contain english characters or numbers</p>";
            else if(in_array("Your password must be betwen 5 and 30 characters<br>", $error_array)) echo "<p style = 'color:white;'>Your password must be betwen 5 and 30 characters</p>"; ?>

            <div class="row align-items-center remember">
            </div>
            <div class="form-group">
              <input type="submit" value="Register" name="register_button" class="btn float-right login_btn">
            </div>
          </form>

          <?php if(in_array("<span style='color: #14C800;'>Account Created</span><br>", $error_array)) echo "<br><br><span style='color: #14C800; text-align:center;'>Account Created</span><br><br>"; ?>

        </div>
        <div class="card-footer">
        </div>
        <div class="d-flex justify-content-center" style = 'padding-bottom: 20px;'>
          <a href="Login.php">Back to Login</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>