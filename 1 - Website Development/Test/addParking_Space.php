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

    $Parking_Space_test = mysqli_query($con, "SELECT MAX(Parking_Space_ID) FROM Parking_Spaces");
    $Parking_Space_test_array = mysqli_fetch_array($Parking_Space_test);

    $Parking_Space_ID = $Parking_Space_test_array[0];

    $Parking_Space_obj = new Parking_Space($con, $Parking_Space_ID);

    if($Parking_Space_obj->newParking_Spaces($con, 2, 1, 1, 'No', 'AB11 54BA'))
    {

        echo("PARKING SPACE ADDED");
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