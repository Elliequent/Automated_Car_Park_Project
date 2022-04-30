<?php

function deletedatabase()
{

	$servername = "178.79.190.121:3306";
    $username = "admin";
    $password = "OMEGA44DAYS00#";

    // IP Address, username, password and database table
    $con = mysqli_connect($servername, $username, $password); 

    $sql = "DROP DATABASE IP3_PP";

    if (!mysqli_query($con, $sql)) 
    {

        // TEMP - Redirect to system down page
        echo "Error deleting database: " . mysqli_error($con);

    }   // End of IF (mysqli_query($con, $sql))
    else
    {

        echo "Database deleted - redirecting and repopulating database";
        header("refresh: 5; url = Database_Populate.php");
        exit();

    }

}   // End of FUNCTION seedDatabase_part1()

deletedatabase();

?>