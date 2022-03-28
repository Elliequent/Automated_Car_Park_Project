<?php

require 'System/Config/config.php';

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

    $vehicle_test = mysqli_query($con, "SELECT * FROM Vehicle WHERE Registeration_Plate='MUSKY'");
    $vehicle_test_array = mysqli_fetch_array($vehicle_test);

    $find_user_test = mysqli_query($con, "SELECT * FROM User_Vehicles WHERE Registeration_Plate='MUSKY'");
    $find_user_array = mysqli_fetch_array($find_user_test);

    $user_id = $find_user_array['User_ID'];

    $User_test = mysqli_query($con, "SELECT * FROM User WHERE User_ID='$user_id'");
    $User_test_array = mysqli_fetch_array($User_test);

    $travel_test = mysqli_query($con, "SELECT * FROM Arrival_Departure WHERE User_ID='$user_id'");
    $travel_array = mysqli_fetch_array($travel_test);

    $parking = $travel_array['Parking_Structure_ID'];

    $parking_test = mysqli_query($con, "SELECT * FROM Parking_Structure WHERE Parking_Structure_ID='$parking'");
    $parking_array = mysqli_fetch_array($parking_test);

    $parking_space_test = mysqli_query($con, "SELECT * FROM Parking_Spaces WHERE Parking_Structure_ID='$parking'");
    $parking_space_array = mysqli_fetch_array($parking_space_test);

    echo("<pre>");
    print_r($vehicle_test_array);
    print_r($find_user_array);
    print_r($User_test_array);
    print_r($travel_array);
    print_r($parking_array);
    print_r($parking_space_array);
    die();

?>

</body>