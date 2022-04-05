<?php

require '../System/Config/config.php';

require "../System/Classes/User.php";

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

    $user_test = mysqli_query($con, "SELECT * FROM User WHERE User_ID = '00003'");
    $user_test_array = mysqli_fetch_array($user_test);

    $User_ID = $user_test_array['User_ID'];

    $user_obj = new User($con, $User_ID);

    if($user_obj->newUser($con, '000005', 'ADAM_001', 'PASSWORD', 'ADAM', 'ADAMS', 'ADAMADANS@GMAIL.COM', '0777777777', 'ADAM STREET'))
    {

        echo("USER ADDED");
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