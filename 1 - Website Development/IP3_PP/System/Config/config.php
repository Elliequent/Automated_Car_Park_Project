<?php  

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
										// General Setting Section \\
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

require_once 'Seed/seed.php';

// Starts output buffering - improves php efficiency
ob_start();                                                     

// Store session date
session_start();                                                

// Set timezone to Europe - London GMT
$timezone = date_default_timezone_set("Europe/London");         

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
										// Database connection Section \\
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$servername = "178.79.190.121:3306";
$username = "admin";
$password = "OMEGA44DAYS00#";

// IP Address, username, password and database table
$con = mysqli_connect($servername, $username, $password); 

// If connection fails - error - else create Database if missing
if (!$con) 
{

	// TEMP - Redirect to system down page
	die("Connection failed: " . mysqli_connect_error());

}
else
{

	// Creates System database "IP3_PP"
	seedDatabase_part1($con);

}

// Sets main MYSQL database connection to main database "IP3_PP"
$con = mysqli_connect($servername, $username, $password, "IP3_PP");  	

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
										// Database Seeding Section \\
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Check Database table Book population - If empty - populate with seed book
$database_user_population_check = mysqli_query($con, "SELECT * FROM User");

if ($database_user_population_check == false)
{

	// Adds the rest of the seeded table data
	seedDatabase_part2($con);

	// Adds the rest of the seeded table data
	seedDatabase_part3($con);

}	// End of IF (mysqli_num_rows($database_book_population_check) == 0)

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
										// Pathway creation Section \\
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

define('APP_PATH', realpath(dirname(getcwd())));

?>