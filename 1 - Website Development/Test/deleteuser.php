<?php

require 'System/Config/config.php';

require "System/Classes/User.php";

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

    $user_obj = "";

    if(new User($con, '00005'))
    {

        $user_obj = new User($con, '00005');

    }
    else
    {

        echo("USER DOES NOT EXIST - PLEASE PRESS ADD NEW USER FIRST");
        header("refresh: 5; url = index.php");
        exit();

    }

    $highest_user_ID = mysqli_query($con, "SELECT User_ID FROM User WHERE Email = 'ADAMADANS@GMAIL.COM'");

    $row = mysqli_fetch_array($highest_user_ID);

    $highest_user_id_int = intval($row['0']);

    if($user_obj->deleteUser($con, $highest_user_id_int))
    {

        echo("USER DELETED");
        header("refresh: 5; url = index.php");
        exit();

    }
    else
    {

        echo("Something went wrong <br>");
        print(mysqli_error($con));

    }

?>

</body>