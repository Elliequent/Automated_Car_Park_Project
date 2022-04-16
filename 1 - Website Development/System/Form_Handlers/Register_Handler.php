<?php

require 'System/Classes/User.php';

//Declaring variables to prevent errors
$username = "";
$fname = ""; 
$lname = "";
$em = "";
$password1 = "";
$password2 = "";
$phone_number = "";
$address = "";
$error_array = array();

if(isset($_POST['register_button']))
{

	$servername = "178.79.190.121:3306";
    $username = "admin";
    $password = "OMEGA44DAYS00#";
    $con = mysqli_connect($servername, $username, $password, "IP3_PP"); 

	// Username
	$username = strip_tags($_POST['reg_username']);
	$username = str_replace(' ', '', $username);
	$username = ucfirst(strtolower($username));
	$_SESSION['reg_username'] = $username;

	// First name
	$fname = strip_tags($_POST['reg_fname']);
	$fname = str_replace(' ', '', $fname);
	$fname = ucfirst(strtolower($fname));
	$_SESSION['reg_fname'] = $fname;

	// Last name
	$lname = strip_tags($_POST['reg_lname']);       
	$lname = str_replace(' ', '', $lname);          
	$lname = ucfirst(strtolower($lname));           
	$_SESSION['reg_lname'] = $lname;               

	// Email
	$em = strip_tags($_POST['reg_email']);          
	$em = str_replace(' ', '', $em);                
	$em = ucfirst(strtolower($em)); 
	$_SESSION['reg_email'] = $em; 

	// Phone Number
	$phone_number = strip_tags($_POST['reg_phone']);          
	$phone_number = str_replace(' ', '', $phone_number);                
	$phone_number = ucfirst(strtolower($phone_number)); 
	$_SESSION['reg_phone'] = $phone_number; 

	// Address
	$address = strip_tags($_POST['reg_address']);            
	$_SESSION['reg_address'] = $address; 

	// Password
	$password1 = strip_tags($_POST['reg_password']); 
	$password2 = strip_tags($_POST['reg_password2']);

	// Check if email is in valid format 
	if(filter_var($em, FILTER_VALIDATE_EMAIL)) 
	{

		// Stores email in vaild format
		$em = filter_var($em, FILTER_VALIDATE_EMAIL);
		//Check if email already exists 
		$e_check = mysqli_query($con, "SELECT Email FROM User WHERE Email='$em'");
		//Count the number of rows returned
		$num_rows = mysqli_num_rows($e_check);

		// If email already in use
		if($num_rows > 0) 
		{

			array_push($error_array, "This email address is already registered<br>");

		}

	}
	else 
	{

		array_push($error_array, "Invalid email format<br>");

	}


	if(strlen($fname) > 25 || strlen($fname) < 2) 
	{	
		// Checks if first name is between 2 and 25 characters long
		array_push($error_array, "Your first name must be between 2 and 25 characters<br>");

	}

	if(strlen($lname) > 25 || strlen($lname) < 2) 
	{	
		// Checks if last name is between 2 and 25 characters long
		array_push($error_array,  "Your last name must be between 2 and 25 characters<br>");

	}

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

		$user_test = mysqli_query($con, "SELECT MAX(User_ID) FROM User");
		$user_test_array = mysqli_fetch_array($user_test);

		$User_ID = $user_test_array[0];

		$user_obj = new User($con, $User_ID);

		if($user_obj->newUser($con, $username, $password1, $fname, $lname, $em, $phone_number, $address))
		{
	
			// Successful account creation message - error messages displayed if errors in error array
			array_push($error_array, "<span style='color: #14C800;'>Account Created</span><br>");

			//Clear session variables - When session ends
			unset($_SESSION['reg_fname']);
			unset($_SESSION['reg_lname']);
			unset($_SESSION['reg_email']);
			unset($_SESSION['reg_phone']);
			unset($_SESSION['reg_username']);
			unset($_SESSION['reg_address']);
	
		}
		else
		{
	
			echo("Something went wrong <br>");
			print(mysqli_error($con));
	
		}

	}	// End of empty($error_array) IF STATEMENT

}	    // End of isset($_POST['register_button']) IF STATEMENT

?>