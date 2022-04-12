<?php

require '../System/Config/config.php';

require "../System/Classes/Parking_Structure.php";

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

    $parking_structure_test = mysqli_query($con, "SELECT MAX(Parking_Structure_ID) FROM Parking_Structure");
    $parking_structure_test_array = mysqli_fetch_array($parking_structure_test);

    $parking_structure_ID = $parking_structure_test_array[0];

    $parking_strucuture_obj = new Parking_Structure($con, $parking_structure_ID);

    echo("Parking Structure ID: ");
    echo($parking_strucuture_obj->getParking_Structure_ID());
    echo("<br>");
    echo("Address: ");
    echo($parking_strucuture_obj->getAddress()); 
    echo("<br>");
    echo("Number of Parking Spaces: ");
    echo($parking_strucuture_obj->getNumber_of_parking_spaces());
    echo("<br>");
    echo("Cost per hour: $");
    echo($parking_strucuture_obj->getCost_per_hour());
    echo("<br>");

?>

<br><br>

<a href="../index.php">BACK</a>

</body>