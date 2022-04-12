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

    $Parking_Structure_test = mysqli_query($con, "SELECT MAX(Parking_Structure_ID) FROM Parking_Structure");
    $Parking_Structure_test_array = mysqli_fetch_array($Parking_Structure_test);

    $Parking_Structure_ID = $Parking_Structure_test_array[0];

    $Parking_Structure_obj = new Parking_Structure($con, $Parking_Structure_ID);

    if($Parking_Structure_obj->newParking_Structure($con, '123 ADAM STREET', 10, 5.00))
    {

        echo("PARKING STRUCTURE ADDED");
        header("refresh: 5; url = ../index.php");
        exit();

    }
    else
    {

        echo("Something went wrong <br>");
        print(mysqli_error($con));

    }

?>

</body>