<?php

require '../System/Config/config.php';

require "../System/Classes/Vehicle.php";

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

    $vehicle_test = mysqli_query($con, "SELECT * FROM Vehicle WHERE Registeration_Plate = 'MUSKY'");
    $vehicle_test_array = mysqli_fetch_array($vehicle_test);

    $licence_plate = $vehicle_test_array['Registeration_Plate'];

    $vehicle_obj = new Vehicle($con, $licence_plate);

    if($vehicle_obj->newVehicle($con, 'AB11 54BA', 'FORD', 'FOCUS', 'No', 'No'))
    {

        echo("VEHICLE ADDED");
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