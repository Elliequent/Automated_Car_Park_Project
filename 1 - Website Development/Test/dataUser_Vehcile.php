<?php

require '../System/Config/config.php';

require "../System/Classes/User_Vehicles.php";

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

    $user_vehicle_test = mysqli_query($con, "SELECT * FROM User_Vehicles WHERE User_ID = '00002'");
    $user_vehicle_test_array = mysqli_fetch_array($user_vehicle_test);

    $User_ID = $user_vehicle_test_array['User_ID'];

    $user_vehicle_obj = new User_Vehicles($con, $User_ID);

    echo("User ID: ");
    echo($user_vehicle_obj->getUser_ID());
    echo("<br>");
    echo("Registeration Plate(s): ");
    echo($user_vehicle_obj->getRegisteration_Plate()); 
    echo("<br>");

?>

<br><br>

<a href="../index.php">BACK</a>

</body>