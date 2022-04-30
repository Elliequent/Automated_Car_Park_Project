<?php

// Ian Fraser - 27/03/2022 - V.1.0

// seed.php - If database does not exist within data creates database and populates it with admin information

// Trigger - config.php - mysqli_connect_errno() returns error - redirect here and creates the program database
// NB - Only actives if the system does not detect the main database - will override database if not detected
// Unsucessful - If system fails to build database - redirect to site down service

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
										// Database Seed Part 1 - Creating main database \\
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function seedDatabase_part1($con)
{

    $sql = "CREATE DATABASE IF NOT EXISTS IP3_PP";

    if (!mysqli_query($con, $sql)) 
    {

        // TEMP - Redirect to system down page
        echo "Error creating database: " . mysqli_error($con);

    }   // End of IF (mysqli_query($con, $sql)) 

}   // End of FUNCTION seedDatabase_part1()

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
										// Database Seed Part 2 - Seeding database with main tables \\
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function seedDatabase_part2($con)
{

    // Creates Database table - User
    $create_user_database = "CREATE TABLE User (
        User_ID INT NOT NULL AUTO_INCREMENT,
        Username VARCHAR(50) NOT NULL,
        Password VARCHAR(50) NOT NULL,
        Firstname VARCHAR(50) NOT NULL,
        Lastname VARCHAR(50) NOT NULL,
        Email VARCHAR(50) NOT NULL,
        Phone_Number VARCHAR(50) NULL,
        Address VARCHAR(255) NOT NULL,
        Is_Banned VARCHAR(3) NOT NULL,
        PRIMARY KEY (User_ID)
    )";

    if(mysqli_query($con, $create_user_database))
    {

        echo "User Database: PASS";
        echo "<br>";

    }
    else
    {

        echo "FAIL";
        echo "<br>";
        print(mysqli_error($con));
        die();

    }

    // Creates Database table - event
    $create_event_database = "CREATE TABLE Event (
        event_ID INT NOT NULL AUTO_INCREMENT,
        Registeration_Plate VARCHAR(20) NOT NULL,
        User_ID INT NOT NULL,
        Arrival_Time DateTime,
        Departure_Time DateTime,
        Parking_Structure_ID INT,
        Parking_Space_ID INT NOT NULL,
        bill DECIMAL(6,2),
        PRIMARY KEY (event_ID)
    )";

    if(mysqli_query($con, $create_event_database))
    {

        echo "Event Database: PASS";
        echo "<br>";

    }
    else
    {

        echo "FAIL";
        echo "<br>";
        print(mysqli_error($con));
        die();

    }

    // Creates Database table - Parking Structure
    $create_Parking_Structure_database = "CREATE TABLE Parking_Structure (
        Parking_Structure_ID INT NOT NULL AUTO_INCREMENT,
        Address VARCHAR(255) NOT NULL,
        Number_of_parking_spaces int(20) NOT NULL,
        Cost_per_hour DECIMAL(4,2) NOT NULL,
        PRIMARY KEY (Parking_Structure_ID)
    )";

    if(mysqli_query($con, $create_Parking_Structure_database))
    {

        echo "Parking Structure Database: PASS";
        echo "<br>";

    }
    else
    {

        echo "FAIL";
        echo "<br>";
        print(mysqli_error($con));
        die();

    }

    // Creates Database table - vehicle
    $create_vehicle_database = "CREATE TABLE Vehicle (
        Registeration_Plate VARCHAR(20) NOT NULL,
        Make VARCHAR(100) NOT NULL,
        Model VARCHAR(100) NOT NULL,
        Is_Electric VARCHAR(3) NULL,
        Is_Currently_Parked VARCHAR(3) NULL,
        PRIMARY KEY (Registeration_Plate)
    )";

    if(mysqli_query($con, $create_vehicle_database))
    {

        echo "Vehicle Database: PASS";
        echo "<br>";

    }
    else
    {

        echo "FAIL";
        echo "<br>";
        print(mysqli_error($con));
        die();

    }

    // Creates Database table - Parking Spaces
    $create_Parking_Spaces_database = "CREATE TABLE Parking_Spaces (
        Parking_Space_ID INT NOT NULL AUTO_INCREMENT,
        Parking_Structure_ID INT NOT NULL,
        Floor int(20) NOT NULL,
        is_disabled VARCHAR(3) NULL,
        Registeration_Plate VARCHAR(20),
        PRIMARY KEY (Parking_Space_ID),
        FOREIGN KEY (Registeration_Plate) REFERENCES Vehicle(Registeration_Plate),
        FOREIGN KEY (Parking_Structure_ID) REFERENCES Parking_Structure(Parking_Structure_ID)
    )";

    if(mysqli_query($con, $create_Parking_Spaces_database))
    {

        echo "Parking Spaces Database: PASS";
        echo "<br>";

    }
    else
    {

        echo "FAIL";
        echo "<br>";
        print(mysqli_error($con));
        die();

    }

    // Creates Database table - user vehicles
    $create_user_vehicles_database = "CREATE TABLE User_Vehicles (
        User_ID INT NOT NULL,
        Registeration_Plate VARCHAR(20) NOT NULL,
        FOREIGN KEY (User_ID) REFERENCES User(User_ID)
    )";

    if(mysqli_query($con, $create_user_vehicles_database))
    {

        echo "User Vehicles Database: PASS";
        echo "<br>";

    }
    else
    {

        echo "FAIL";
        echo "<br>";
        print(mysqli_error($con));
        die();

    }

    // Creates Database table - arrival & departure
    $create_arrival_departure_database = "CREATE TABLE Arrival_Departure (
        Arrival_Departure_ID INT NOT NULL AUTO_INCREMENT,
        Arrival_Time DateTime NOT NULL,
        Departure_Time DateTime NOT NULL,
        User_ID INT NOT NULL,
        Parking_Structure_ID INT NOT NULL,
        PRIMARY KEY (Arrival_Departure_ID),
        FOREIGN KEY (User_ID) REFERENCES User(User_ID),
        FOREIGN KEY (Parking_Structure_ID) REFERENCES Parking_Structure(Parking_Structure_ID)
    )";

    if(mysqli_query($con, $create_arrival_departure_database))
    {

        echo "Arrival & Departure Database: PASS";
        echo "<br>";

    }
    else
    {

        echo "FAIL";
        echo "<br>";
        print(mysqli_error($con));
        die();

    }

}   // End of FUNCTION seedDatabase_part2()

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
										// Database Seed Part 3 - Main seed \\
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function seedDatabase_part3($con)
{

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                // Users Database Seed \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // Populating database table Users
    $User_empty_test = mysqli_query($con, "SELECT * FROM User");

    // If database table User is empty
    if (mysqli_num_rows($User_empty_test) == 0)
    {

        // Adds seed user - Test
        $seed_user1 = "INSERT INTO User VALUES(0, 'Test', 'Test', 'Test', 'Test', 'Test@Test.com', '0777777777', '123 Test Town', 'No')";
        if(mysqli_query($con, $seed_user1))
        {

            echo "User 1 : PASS";
            echo "<br>";
    
        }
        else
        {
    
            echo "User 1 : FAIL";
            echo "<br>";
            print(mysqli_error($con));
            die();
    
        }

        // Adds seed user - Elon
        $seed_user2 = "INSERT INTO User VALUES(0, 'Musky', 'TeslaIsGreat', 'Elon', 'Musk', 'Elon@Testa.com', '0777777777', 'None of your damn business', 'No')";
        if(mysqli_query($con, $seed_user2))
        {

            echo "User 2: PASS";
            echo "<br>";
    
        }
        else
        {
    
            echo "User 2: FAIL";
            echo "<br>";
            print(mysqli_error($con));
            die();
    
        }

        // Adds seed user - Admin
        $seed_user3 = "INSERT INTO User VALUES(0, 'Admin', 'Admin', 'Admin', 'User', 'Admin@Test.com', '0777777777', '123 Admin Town', 'Yes')";
        if(mysqli_query($con, $seed_user3))
        {

            echo "User 3: PASS";
            echo "<br>";
    
        }
        else
        {
    
            echo "User 3: FAIL";
            echo "<br>";
            print(mysqli_error($con));
            die();
    
        }

    }   // End of IF (mysqli_num_rows($User_empty_test) == 0)

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            // Parking Strucuture Database Seed \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // Populating database table Parking_Structure
    $Parking_Structure_empty_test = mysqli_query($con, "SELECT * FROM Parking_Structure");

    // If database table Parking_Structure is empty
    if (mysqli_num_rows($Parking_Structure_empty_test) == 0)
    {

        // Adds seed parking_structure
        $seed_parking_structure = "INSERT INTO Parking_Structure VALUES(0, '456 Test Town', '5', '2.00')";
        if(mysqli_query($con, $seed_parking_structure))
        {

            echo "Parking structure: PASS";
            echo "<br>";
    
        }
        else
        {
    
            echo "FAIL";
            echo "<br>";
            print(mysqli_error($con));
            die();
    
        }

    }   // End of IF (mysqli_num_rows($Parking_Structure_empty_test) == 0)

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                // Vehicle Database Seed \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

     // Populating database table Vehicle
     $Vehicle_empty_test = mysqli_query($con, "SELECT * FROM Vehicle");

     // If database table Vehicle is empty
     if (mysqli_num_rows($Vehicle_empty_test) == 0)
     {
 
         // Adds seed vehicle
         $seed_Vehicle1 = "INSERT INTO Vehicle VALUES('MUSKY', 'Tesla', 'Model S', 'Yes', 'Yes')";
         if(mysqli_query($con, $seed_Vehicle1))
         {

            echo "Vehicle 1: PASS";
            echo "<br>";
    
        }
        else
        {
    
            echo "FAIL";
            echo "<br>";
            print(mysqli_error($con));
            die();
    
        }

         // Adds seed vehicle
         $seed_Vehicle2 = "INSERT INTO Vehicle VALUES('CRAIG', 'PORSCHE ', '911', 'No', 'No')";
         if(mysqli_query($con, $seed_Vehicle2))
         {

            echo "Vehicle 2: PASS";
            echo "<br>";
    
        }
        else
        {
    
            echo "FAIL";
            echo "<br>";
            print(mysqli_error($con));
            die();
    
        }

        // Adds seed vehicle
         $seed_Vehicle2 = "INSERT INTO Vehicle VALUES('VIPER', 'DODGE ', 'VIPER', 'No', 'Yes')";
         if(mysqli_query($con, $seed_Vehicle2))
         {

            echo "Vehicle 2: PASS";
            echo "<br>";
    
        }
        else
        {
    
            echo "FAIL";
            echo "<br>";
            print(mysqli_error($con));
            die();
    
        }

     }   // End of IF (mysqli_num_rows($Vehicle_empty_test) == 0)

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            // Parking Spaces Database Seed \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

     // Populating database table Parking_Spaces
     $Parking_Spaces_empty_test = mysqli_query($con, "SELECT * FROM Parking_Spaces");

     // If database table Parking_Spaces is empty
     if (mysqli_num_rows($Parking_Spaces_empty_test) == 0)
     {
 
         // Adds seed Parking_Spaces1
         $seed_Parking_Spaces1 = "INSERT INTO Parking_Spaces VALUES(0, '1', '1', 'No', NULL)";
         if(mysqli_query($con, $seed_Parking_Spaces1))
         {

            echo "Parking space 1: PASS";
            echo "<br>";
    
        }
        else
        {
    
            echo "FAIL";
            echo "<br>";
            print(mysqli_error($con));
            die();
    
        }

         // Adds seed Parking_Spaces2
         $seed_Parking_Spaces2 = "INSERT INTO Parking_Spaces VALUES(0, '1', '1', 'No', NULL)";
         if(mysqli_query($con, $seed_Parking_Spaces2))
         {

            echo "Parking space 2: PASS";
            echo "<br>";
    
        }
        else
        {
    
            echo "FAIL";
            echo "<br>";
            print(mysqli_error($con));
            die();
    
        }

         // Adds seed Parking_Spaces3
         $seed_Parking_Spaces3 = "INSERT INTO Parking_Spaces VALUES(0, '1', '1', 'No', 'MUSKY')";
         if(mysqli_query($con, $seed_Parking_Spaces3))
         {

            echo "Parking space 3: PASS";
            echo "<br>";
    
        }
        else
        {
    
            echo "FAIL";
            echo "<br>";
            print(mysqli_error($con));
            die();
    
        }

         // Adds seed Parking_Spaces4
         $seed_Parking_Spaces4 = "INSERT INTO Parking_Spaces VALUES(0, '1', '1', 'No', NULL)";
         if(mysqli_query($con, $seed_Parking_Spaces4))
         {

            echo "Parking space 4: PASS";
            echo "<br>";
    
        }
        else
        {
    
            echo "FAIL";
            echo "<br>";
            print(mysqli_error($con));
            die();
    
        }

         // Adds seed Parking_Spaces5
         $seed_Parking_Spaces5 = "INSERT INTO Parking_Spaces VALUES(0, '1', '1', 'Yes', NULL)";
         if(mysqli_query($con, $seed_Parking_Spaces5))
         {

            echo "Parking space 5: PASS";
            echo "<br>";
    
        }
        else
        {
    
            echo "FAIL";
            echo "<br>";
            print(mysqli_error($con));
            die();
    
        }

            // Adds seed Parking_Spaces6
            $seed_Parking_Spaces6 = "INSERT INTO Parking_Spaces VALUES(0, '1', '1', 'Yes', NULL)";
            if(mysqli_query($con, $seed_Parking_Spaces6))
            {
   
               echo "Parking space 6: PASS";
               echo "<br>";
       
           }
           else
           {
       
               echo "FAIL";
               echo "<br>";
               print(mysqli_error($con));
               die();
       
           }

            // Adds seed Parking_Spaces7
            $seed_Parking_Spaces7 = "INSERT INTO Parking_Spaces VALUES(0, '1', '1', 'No', NULL)";
            if(mysqli_query($con, $seed_Parking_Spaces7))
            {
   
               echo "Parking space 7: PASS";
               echo "<br>";
       
           }
           else
           {
       
               echo "FAIL";
               echo "<br>";
               print(mysqli_error($con));
               die();
       
           }

            // Adds seed Parking_Spaces8
            $seed_Parking_Spaces8 = "INSERT INTO Parking_Spaces VALUES(0, '1', '1', 'No', NULL)";
            if(mysqli_query($con, $seed_Parking_Spaces8))
            {
   
               echo "Parking space 8: PASS";
               echo "<br>";
       
           }
           else
           {
       
               echo "FAIL";
               echo "<br>";
               print(mysqli_error($con));
               die();
       
           }

            // Adds seed Parking_Spaces9
            $seed_Parking_Spaces9 = "INSERT INTO Parking_Spaces VALUES(0, '1', '1', 'No', NULL)";
            if(mysqli_query($con, $seed_Parking_Spaces9))
            {
   
               echo "Parking space 9: PASS";
               echo "<br>";
       
           }
           else
           {
       
               echo "FAIL";
               echo "<br>";
               print(mysqli_error($con));
               die();
       
           }

             // Adds seed Parking_Spaces10
            $seed_Parking_Spaces10 = "INSERT INTO Parking_Spaces VALUES(0, '1', '1', 'Yes', 'VIPER')";
            if(mysqli_query($con, $seed_Parking_Spaces10))
            {
   
               echo "Parking space 10: PASS";
               echo "<br>";
       
           }
           else
           {
       
               echo "FAIL";
               echo "<br>";
               print(mysqli_error($con));
               die();
       
           }
 
     }   // End of IF (mysqli_num_rows($Parking_Spaces_empty_test) == 0)

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            // User Vehicles Database Seed \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

     // Populating database table User_Vehicles
     $User_Vehicles_empty_test = mysqli_query($con, "SELECT * FROM User_Vehicles");

     // If database table User_Vehicles is empty
     if (mysqli_num_rows($User_Vehicles_empty_test) == 0)
     {
 
         // Adds seed User_Vehicles
         $seed_User_Vehicles1 = "INSERT INTO User_Vehicles VALUES(2, 'MUSKY')";
         if(mysqli_query($con, $seed_User_Vehicles1))
         {

            echo "User Vehicle 1: PASS";
            echo "<br>";
    
        }
        else
        {
    
            echo "FAIL";
            echo "<br>";
            print(mysqli_error($con));
            die();
    
        }

        // Adds seed User_Vehicles
        $seed_User_Vehicles2 = "INSERT INTO User_Vehicles VALUES(3, 'CRAIG')";
        if(mysqli_query($con, $seed_User_Vehicles2))
        {

           echo "User Vehicle 2: PASS";
           echo "<br>";
   
       }
       else
       {
   
           echo "FAIL";
           echo "<br>";
           print(mysqli_error($con));
           die();
   
       }

        // Adds seed User_Vehicles
        $seed_User_Vehicles3 = "INSERT INTO User_Vehicles VALUES(1, 'VIPER')";
        if(mysqli_query($con, $seed_User_Vehicles3))
        {

           echo "User Vehicle 3: PASS";
           echo "<br>";
   
       }
       else
       {
   
           echo "FAIL";
           echo "<br>";
           print(mysqli_error($con));
           die();
   
       }

     }   // End of IF (mysqli_num_rows($User_Vehicles_empty_test) == 0)

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                        // Arrival & Departure Database Seed \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

     // Populating database table Arrival_Departure
    $Arrival_Departure_empty_test = mysqli_query($con, "SELECT * FROM Arrival_Departure");

    // If database table Arrival_Departure is empty
    if (mysqli_num_rows($Arrival_Departure_empty_test) == 0)
    {

        // Adds seed Arrival_Departure1
        $seed_Arrival_Departure1 = "INSERT INTO Arrival_Departure VALUES(0, '2022-03-06 12:00:00', '2022-03-06 16:00:00', '1', '1')";
        if(mysqli_query($con, $seed_Arrival_Departure1))
        {

            echo "Arrival Departure 1: PASS";
            echo "<br>";
    
        }
        else
        {
    
            echo "FAIL";
            echo "<br>";
            print(mysqli_error($con));
            die();
    
        }

        // Adds seed Arrival_Departure2
        $seed_Arrival_Departure2 = "INSERT INTO Arrival_Departure VALUES(0, '2022-01-01 12:00:00', '2022-01-01 18:00:00', '1', '1')";
        if(mysqli_query($con, $seed_Arrival_Departure2))
        {

            echo "Arrival Departure 2: PASS";
            echo "<br>";
    
        }
        else
        {
    
            echo "FAIL";
            echo "<br>";
            print(mysqli_error($con));
            die();
    
        }

        // Adds seed Arrival_Departure3
        $seed_Arrival_Departure3 = "INSERT INTO Arrival_Departure VALUES(0, '2022-02-02 12:00:00', '2022-02-02 15:00:00', '1', '1')";
        if(mysqli_query($con, $seed_Arrival_Departure3))
        {

            echo "Arrival Departure 3: PASS";
            echo "<br>";
    
        }
        else
        {
    
            echo "FAIL";
            echo "<br>";
            print(mysqli_error($con));
            die();
    
        }

    }   // End of IF (mysqli_num_rows($Arrival_Departure_empty_test) == 0)

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                     // Event Database Seed \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // Populating database table Events
    $Event_empty_test = mysqli_query($con, "SELECT * FROM Event");

    // If database table Event is empty
    if (mysqli_num_rows($Event_empty_test) == 0)
    {

        // Adds seed Event1
        $seed_Event1 = "INSERT INTO Event VALUES(0, 'MUSKY', '2', '2022-03-06 12:00:00', '2022-03-06 16:00:00', '1', '1', '20.00')";
        if(mysqli_query($con, $seed_Event1))
        {

            echo "Event 1: PASS";
            echo "<br>";
    
        }
        else
        {
    
            echo "FAIL";
            echo "<br>";
            print(mysqli_error($con));
            die();
    
        }

        // Adds seed Event2
        $seed_Event2 = "INSERT INTO Event VALUES(0, 'MUSKY', '2', '2022-03-10 12:00:00', '2022-03-10 16:00:00', '1', '1', '10.00')";
        if(mysqli_query($con, $seed_Event2))
        {

            echo "Event 2: PASS";
            echo "<br>";
    
        }
        else
        {
    
            echo "FAIL";
            echo "<br>";
            print(mysqli_error($con));
            die();
    
        }

        // Adds seed Event3
        $seed_Event3 = "INSERT INTO Event VALUES(0, 'MUSKY', '2', '2022-03-15 12:00:00', '2022-03-15 16:00:00', '1', '1', '30.00')";
        if(mysqli_query($con, $seed_Event3))
        {

            echo "Event 3: PASS";
            echo "<br>";
    
        }
        else
        {
    
            echo "FAIL";
            echo "<br>";
            print(mysqli_error($con));
            die();
    
        }

        // Adds seed Event4
        $seed_Event4 = "INSERT INTO Event VALUES(0, 'MUSKY', '2', '2022-02-15 12:00:00', '2022-02-15 16:00:00', '1', '1', '30.00')";
        if(mysqli_query($con, $seed_Event4))
        {

            echo "Event 4: PASS";
            echo "<br>";
    
        }
        else
        {
    
            echo "FAIL";
            echo "<br>";
            print(mysqli_error($con));
            die();
    
        }

        // Adds seed Event5
        $seed_Event5 = "INSERT INTO Event VALUES(0, 'MUSKY', '2', '2022-02-10 12:00:00', '2022-02-10 16:00:00', '1', '1', '10.00')";
        if(mysqli_query($con, $seed_Event5))
        {

            echo "Event 5: PASS";
            echo "<br>";
    
        }
        else
        {
    
            echo "FAIL";
            echo "<br>";
            print(mysqli_error($con));
            die();
    
        }

        // Adds seed Event6
        $seed_Event6 = "INSERT INTO Event VALUES(0, 'MUSKY', '2', '2022-02-05 12:00:00', '2022-02-05 16:00:00', '1', '1', '10.00')";
        if(mysqli_query($con, $seed_Event6))
        {

            echo "Event 6: PASS";
            echo "<br>";
    
        }
        else
        {
    
            echo "FAIL";
            echo "<br>";
            print(mysqli_error($con));
            die();
    
        }

        // Adds seed Event7
        $seed_Event7 = "INSERT INTO Event VALUES(0, 'MUSKY', '2', '2022-04-05 12:00:00', '2022-04-05 16:00:00', '1', '1', '50.00')";
        if(mysqli_query($con, $seed_Event7))
        {

            echo "Event 7: PASS";
            echo "<br>";
    
        }
        else
        {
    
            echo "FAIL";
            echo "<br>";
            print(mysqli_error($con));
            die();
    
        }

        // Adds seed Event8
        $seed_Event8 = "INSERT INTO Event VALUES(0, 'MUSKY', '2', '2022-04-15 12:00:00', '2022-04-15 16:00:00', '1', '1', '40.00')";
        if(mysqli_query($con, $seed_Event8))
        {

            echo "Event 8: PASS";
            echo "<br>";
    
        }
        else
        {
    
            echo "FAIL";
            echo "<br>";
            print(mysqli_error($con));
            die();
    
        }

        // Adds seed Event9
        $seed_Event9 = "INSERT INTO Event VALUES(0, 'MUSKY', '2', '2022-04-10 12:00:00', '2022-04-10 16:00:00', '1', '1', '20.00')";
        if(mysqli_query($con, $seed_Event9))
        {

            echo "Event 9: PASS";
            echo "<br>";
    
        }
        else
        {
    
            echo "FAIL";
            echo "<br>";
            print(mysqli_error($con));
            die();
    
        }

        // Adds seed Event10

        $todays_date = date("Y/m/d H:i:s");

        $seed_Event10 = "INSERT INTO Event VALUES(0, 'MUSKY', '2', '$todays_date', '$todays_date', '1', '1', '10.00')";
        if(mysqli_query($con, $seed_Event10))
        {

            echo "Event 10: PASS";
            echo "<br>";
    
        }
        else
        {
    
            echo "FAIL";
            echo "<br>";
            print(mysqli_error($con));
            die();
    
        }

    }   // End of IF (mysqli_num_rows($Arrival_Departure_empty_test) == 0)

}   // End of FUNCTION seedDatabase_part3()

?>
