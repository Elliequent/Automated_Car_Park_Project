<?php

if (isset($_POST['Ban_User']))
{

    // CON
    $servername = "178.79.190.121:3306";
    $username = "admin";
    $password = "OMEGA44DAYS00#";
    $con = mysqli_connect($servername, $username, $password, "IP3_PP"); 

    // Taking user ID from hidden form
    $user_id = $_POST['ID'];

    // Changing Is_Banned in DB
    mysqli_query($con, "UPDATE User SET Is_Banned = 'Yes' WHERE User_ID='$user_id'");

}   // End of IF (isset($_POST['Ban_User']))

if (isset($_POST['Unban_User']))
{

    // CON
    $servername = "178.79.190.121:3306";
    $username = "admin";
    $password = "OMEGA44DAYS00#";
    $con = mysqli_connect($servername, $username, $password, "IP3_PP"); 

    // Taking user ID from hidden form
    $user_id = $_POST['ID'];

    // Changing Is_Banned in DB
    mysqli_query($con, "UPDATE User SET Is_Banned = 'No' WHERE User_ID='$user_id'");

}   // End of IF (isset($_POST['Unban_User']))

?>