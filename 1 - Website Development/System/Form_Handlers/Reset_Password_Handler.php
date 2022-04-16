<?php

require 'System/Classes/User.php';

$em = "";
$password1 = "";
$password2 = "";
$error_array = array();

if(isset($_POST['reset_password'])) 
{

    $servername = "178.79.190.121:3306";
    $username = "admin";
    $password = "OMEGA44DAYS00#";
    $con = mysqli_connect($servername, $username, $password, "IP3_PP"); 

    // Email
	$em = strip_tags($_POST['reset_email']);          
	$em = str_replace(' ', '', $em);                
	$em = ucfirst(strtolower($em)); 

    // Password
	$password1 = strip_tags($_POST['reset_password1']); 
	$password2 = strip_tags($_POST['reset_password2']);

    if(strlen($password1) > 30 || strlen($password1) < 5) 
	{	
		// Checks if password is between 5 and 30 characters long
		array_push($error_array, "Your password must be betwen 5 and 30 characters<br>");

	}

    if($password1 != $password2) 
	{

		array_push($error_array,  "Your passwords do not match<br>");

	}
	else 
	{

		if(preg_match('/[^A-Za-z0-9]/', $password1)) 
		{	
			// Checks passwords only contain English lettering and numbers
			array_push($error_array, "Your password can only contain english characters or numbers<br>");

		}
	}

    if(empty($error_array)) 
    {                  

        $check_database_query = mysqli_query($con, "SELECT * FROM User WHERE Email='$em'");
        $check_login_query = mysqli_num_rows($check_database_query); 
              
        if($check_login_query == 1) 
        {  

            $row = mysqli_fetch_array($check_database_query); 
            $User_ID = $row['User_ID'];

		    $user_obj = new User($con, $User_ID);

            $row = mysqli_fetch_array($check_database_query); 

            if($user_obj->updateUser($con, "Password", $password1, $User_ID))
		    {

                array_push($error_array, "SUCCESS");
                header("refresh: 5; url = Login.php");

            }

        }
        else 
        {
    
            array_push($error_array, "ERROR");
    
        }   // If not account is found an error message is presented

    }   // End of IF ($check_login_query == 1) 

}       // End of isset($_POST['login_button']) IF STATEMENT

?>