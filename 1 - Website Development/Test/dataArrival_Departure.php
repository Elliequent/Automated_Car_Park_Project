<?php

require '../System/Config/config.php';

require "../System/Classes/Arrival_Departure.php";

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

    $arrival_departure_test = mysqli_query($con, "SELECT * FROM Arrival_Departure WHERE User_ID = '00002'");
    $arrival_departure_test_array = mysqli_fetch_array($arrival_departure_test);

    $arrival_departure_ID = $arrival_departure_test_array['User_ID'];

    $arrival_departure_obj = new Arrival_Departure($con, $arrival_departure_ID);

    echo("Arrival Departure ID: ");
    echo($arrival_departure_obj->getArrival_Departure_ID());
    echo("<br>");
    echo("User ID: ");
    echo($arrival_departure_obj->getUser_ID()); 
    echo("<br>");
    echo("Arrival Time: ");
    echo($arrival_departure_obj->getArrival_Time());
    echo("<br>");
    echo("Departure Time: ");
    echo($arrival_departure_obj->getDeparture_Time());
    echo("<br>");
    echo("Parking Structure ID: ");
    echo($arrival_departure_obj->getParking_Structure_ID());
    echo("<br>");

?>

<br><br>

<a href="../index.php">BACK</a>

</body>