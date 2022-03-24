<?php

// Starts output buffering - improves php efficiency
ob_start();                                                     

// Store session date
session_start();                                                

// Set timezone to Europe - London GMT
$timezone = date_default_timezone_set("Europe/London");    

$servername = "localhost:3306";
$username = "user";
$password = "user";
$db_name = "mydb";

// IP Address, username, password and database table
$con = mysqli_connect($servername, $username, $password, $db_name);  	

// If connection fails - error - else create Database if missing
if (!$con) 
{

	// TEMP - Redirect to system down page
	die("Connection failed: " . mysqli_connect_error());

}else
{

	// Creates System database "Bookshelf"
	echo("Database connected");

}


?>
