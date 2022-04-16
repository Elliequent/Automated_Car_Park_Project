<?php

$error_array = array();

if(isset($_POST['forgot_password'])) 
{

    $servername = "178.79.190.121:3306";
    $username = "admin";
    $password = "OMEGA44DAYS00#";
    $con = mysqli_connect($servername, $username, $password, "IP3_PP"); 

    $email = filter_var($_POST['for_email'], FILTER_SANITIZE_EMAIL);

    $check_database_query = mysqli_query($con, "SELECT * FROM User WHERE Email='$email'");
    $check_login_query = mysqli_num_rows($check_database_query);

    if($check_login_query == 1) 
    {                  

        // Email and token system here in final version - unable to create due to Xampp system does not send emails.
        // Intermediate solution - redirect to page that email and token system would land users.

        array_push($error_array, "SUCCESS");
        header("location: Reset_Password.php");
        exit();

    }   // End of IF ($check_login_query == 1) 
    else 
    {

        array_push($error_array, "ERROR");

    }   // If not account is found an error message is presented

}       // End of isset($_POST['login_button']) IF STATEMENT

?>