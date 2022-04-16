<?php

$error_array = array();

if(isset($_POST['login_button'])) 
{

    $servername = "178.79.190.121:3306";
    $username = "admin";
    $password = "OMEGA44DAYS00#";
    $con = mysqli_connect($servername, $username, $password, "IP3_PP"); 


    $email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL);     // Store email variable if in the correct format

    $_SESSION['log_email'] = $email;                                    // Stores email entered in textbox during session

    $password = $_POST['log_password'];                                 // Stores password in MD5 encryption

    $check_database_query = mysqli_query($con, "SELECT * FROM User WHERE Email='$email' AND Password='$password'");
    $check_login_query = mysqli_num_rows($check_database_query);         // Checks database for user data entered
                                                                        // This should retun a 1 or a 0
    if($check_login_query == 1) 
    {                  
        // If a user exits (1) then the account is loaded 

        // Gathers user data into variable                              // into the current session as a username                
        $row = mysqli_fetch_array($check_database_query);    
        // Isolating username from user array           
        $username = $row['Username'];

        if ($_POST['remember_me'] == 'remember' || isset($_POST['remember_me'])) 
        {

            setcookie("login", $username, time() + (86400 * 30), "/"); // 86400 = 1 day

        }

        $_SESSION['username'] = $username;                              // Session now stores username - Needed for profiles etc
        header("location: index.php");                                  // Redirects user to Index page - once logged in
        exit();

    } 
    else 
    {

        array_push($error_array, "ERROR");

    }   // If not account is found an error message is presented

}       // End of isset($_POST['login_button']) IF STATEMENT

if(isset($_COOKIE['login'])) 
{

    $servername = "178.79.190.121:3306";
    $username = "admin";
    $password = "OMEGA44DAYS00#";
    $con = mysqli_connect($servername, $username, $password, "IP3_PP"); 

    $username = $_COOKIE['login'];

    $check_database_query = mysqli_query($con, "SELECT * FROM User WHERE Username='$username'");
    $check_login_query = mysqli_num_rows($check_database_query);         // Checks database for user data entered
                                                                        // This should retun a 1 or a 0
    if($check_login_query == 1) 
    {                  
        // If a user exits (1) then the account is loaded 

        // Gathers user data into variable                              // into the current session as a username                
        $row = mysqli_fetch_array($check_database_query);    

        $_SESSION['username'] = $username;                              // Session now stores username - Needed for profiles etc
        header("location: index.php");                                  // Redirects user to Index page - once logged in
        exit();

    } 
    else 
    {

        array_push($error_array, "ERROR");

    }   // If not account is found an error message is presented

}       // End of isset($_POST['login_button']) IF STATEMENT


?>