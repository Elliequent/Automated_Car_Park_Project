<?php

require 'System/Config/config.php';

require 'System/Classes/User.php';
require 'System/Classes/Vehicle.php';
require 'System/Classes/User_Vehicles.php';
require 'System/Classes/Parking_Structure.php';
require 'System/Classes/Parking_Space.php';
require 'System/Classes/Arrival_Departure.php';

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

<h2> Testing - Data </h2>

<br><br>

<a href="Test/datauser.php">USER DATA</a>
<a href="Test/datavehicle.php">VEHICLE DATA</a>
<a href="Test/dataParking_Structure.php">PARKING STRUCTURE DATA</a>
<a href="Test/dataParking_Space.php">PARKING SPACE DATA</a>
<a href="Test/dataUser_Vehcile.php">USER_VEHICLE DATA</a>
<a href="Test/dataArrival_Departure.php">ARRIVAL_DEPARTURE DATA</a>

<br><br>

<h2> Testing - Add </h2>

<br><br>

<a href="Test/adduser.php">ADD A USER</a>
<a href="Test/addvehicle.php">ADD A VEHICLE</a>
<a href="Test/addParking_Structure.php">ADD A PARKING STRUCTURE</a>
<a href="Test/addParking_Space.php">ADD A PARKING SPACE</a>
<a href="Test/addParking_Space.php">ADD A PARKING SPACE</a>

<br><br>

<h2> Testing - Other </h2>

<br><br>

<a href="Test/addUser_Vehicle.php">LINK A USER TO A VEHICLE</a>
<a href="Test/arrive.php">ARRIVAL TEST</a>
<a href="Test/depart.php">DEPART TEST</a>

<br><br>

<h2> Testing - Update </h2>

<br><br>

<a href="Test/updateuser.php">UPDATE A USER</a> 
<a href="Test/updatevehicle.php">UPDATE A VEHICLE</a> 
<a href="Test/updateparking_structure.php">UPDATE A PARKING STRUCTURE</a> 
<a href="Test/updateparking_space.php">UPDATE A PARKING SPACE</a> 

<br><br>

<h2> Testing - DELETE </h2>

<br><br>

<a href="deleteuser.php">DELETE A USER</a> 
<a href="deletevehicle.php">DELETE A VEHICLE</a> 
<a href="deleteparking_strucuture.php">DELETE A PARKING STRUCTURE</a> 
<a href="deleteparking_space.php">DELETE A PARKING SPACE</a> 
<a href="deleteuser_vehicle.php">DELETE A USER_VEHICLE</a> 
<a href="deletearrival_departure.php">DELETE A ARRIVAL_DEPARTURE</a> 

<br><br>

<?php



?>

</body>