<?php

require '../System/Config/config.php';

require "../System/Classes/Parking_Space.php";

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <!-- Title and Favicon -->
    <title>Partical Parking - Automated Parking</title>
    
    <!-- Flavicon
    <link rel="icon" href="Assets/Images/Favicon/favicon.ico" type="image/x-icon">
    -->


    <!-- meta -->
    <meta charset="UTF-8">
    <meta name="description" content="Practical Parking">
    <meta name="keywords" content="Parking">
    <meta name="author" content="Ian Fraser">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="Assets/JavaScript/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/34d9021f0e.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="Assets/CSS/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="Assets/CSS/stylesheet.css">

</head>

<body>

<?php

    $parking_space_test = mysqli_query($con, "SELECT * FROM Parking_Spaces WHERE Parking_Space_ID = '3'");
    $parking_space_test_array = mysqli_fetch_array($parking_space_test);

    $parking_space_ID = $parking_space_test_array['Parking_Structure_ID'];

    $parking_space_obj = new Parking_Space($con, $parking_space_ID);

    echo("Parking Space ID: ");
    echo($parking_space_obj->getParking_Space_ID());
    echo("<br>");
    echo("Parking Structure ID: ");
    echo($parking_space_obj->getParking_Structure_ID()); 
    echo("<br>");
    echo("Floor Number: ");
    echo($parking_space_obj->getFloor());
    echo("<br>");
    echo("Space Number: ");
    echo($parking_space_obj->getSpace_Number());
    echo("<br>");
    echo("Is Disabled Space: ");
    echo($parking_space_obj->getis_disabled());
    echo("<br>");
    echo("Currently Parked: ");
    echo($parking_space_obj->getRegisteration_Plate());
    echo("<br>");

?>

<br><br>

<a href="../index.php">BACK</a>

</body>