<?php

function calculate_dashboard_monthly($parking_structure)
{

    // CON
    $servername = "178.79.190.121:3306";
    $username = "admin";
    $password = "OMEGA44DAYS00#";
    $con = mysqli_connect($servername, $username, $password, "IP3_PP"); 

    $arrival_departure_data = mysqli_query($con, "SELECT SUM(bill) AS Sales_Total, MONTH(Arrival_Time) AS Sale_Month FROM Event GROUP BY Sale_Month ORDER BY Sale_Month ASC LIMIT 3");

    $arrival_departure_array_system = [];

    while($row = mysqli_fetch_array($arrival_departure_data))
    {

        # Covert date into month name
        $dateObj   = DateTime::createFromFormat('!m', $row['Sale_Month']);

        # Adds month and sales total to array
        array_push($arrival_departure_array_system, [$dateObj->format('F'), $row['Sales_Total']]);

    }   // END of WHILE ($row = mysqli_fetch_array($arrival_departure_data))
    
    return $arrival_departure_array_system;

}   // END of FUNCTION calculate_dashboard_monthly()

function calculate_dashboard_visitors($parking_structure)
{

    // CON
    $servername = "178.79.190.121:3306";
    $username = "admin";
    $password = "OMEGA44DAYS00#";
    $con = mysqli_connect($servername, $username, $password, "IP3_PP"); 

    $visitor_data = mysqli_query($con, "SELECT * FROM Parking_Spaces");

    while($row = mysqli_fetch_array($visitor_data))
    {

        if ($row['Registeration_Plate'] != NULL || $row['Registeration_Plate'] != "")
        {

            // Extracting user licence plate
            $Registeration_Plate = $row['Registeration_Plate'];

            // Parking space
            $parking_space = $row['Parking_Space_ID'];

            // Identifying user from database
            $user_data = mysqli_query($con, "SELECT * FROM User_Vehicles WHERE Registeration_Plate = '$Registeration_Plate'");
            $row = mysqli_fetch_array($user_data);

            // User ID
            $user_ID = $row['User_ID'];

            // Creating user object from user ID
            $user_obj = new User($con, $user_ID);

            // Getting users name
            $name = $user_obj->firstname_and_lastname();

            echo "<a href='pages-profile.php?id=" . $user_ID . "> <p style = ''>" . $name . " - Space: " . $parking_space . "</p> </a>";

        }

    }   // END of WHILE ($row = mysqli_fetch_array($visitor_data))

    die();

}   // END of FUNCTION calculate_dashboard_visitors()


?>