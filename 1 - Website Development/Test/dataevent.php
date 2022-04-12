<?php

require '../System/Config/config.php';

require "../System/Classes/Event.php";

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

    $event_test = mysqli_query($con, "SELECT MAX(event_ID) FROM Event");
    $event_test_array = mysqli_fetch_array($event_test);

    $event_ID = $event_test_array[0];

    $event_obj = new Event($con, $event_ID);

    echo("Event ID: ");
    echo($event_obj->getEvent_ID());
    echo("<br>");
    echo("Licence Plate: ");
    echo($event_obj->getRegisteration_Plate()); 
    echo("<br>");
    echo("User ID: ");
    echo($event_obj->getUser_ID());
    echo("<br>");
    echo("Date and time of Arrival: ");
    echo($event_obj->getArrival_Time());
    echo("<br>");
    echo("Date and time of departure: ");
    echo($event_obj->getDeparture_Time());
    echo("<br>");
    echo("Parking Structure: ");
    echo($event_obj->getParking_Structure_ID());
    echo("<br>");
    echo("Parking Space: ");
    echo($event_obj->getParking_Space_ID());
    echo("<br>");
    echo("Bill: ");
    echo($event_obj->getbill());
    echo("<br>");

?>

<br><br>

<a href="../index.php">BACK</a>

</body>