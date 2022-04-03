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
        User_ID VARCHAR(5) NOT NULL,
        Username VARCHAR(50) NOT NULL,
        Password VARCHAR(50) NOT NULL,
        Firstname VARCHAR(50) NOT NULL,
        Lastname VARCHAR(50) NOT NULL,
        Email VARCHAR(50) NOT NULL,
        Phone_Number VARCHAR(50) NULL,
        Address VARCHAR(255) NOT NULL,
        PRIMARY KEY (User_ID)
    )";

    mysqli_query($con, $create_user_database);

    // Creates Database table - Parking Structure
    $create_Parking_Structure_database = "CREATE TABLE Parking_Structure (
        Parking_Structure_ID VARCHAR(5) NOT NULL,
        Address VARCHAR(255) NOT NULL,
        Number_of_parking_spaces int(20) NOT NULL,
        Cost_per_hour DECIMAL(4,2) NOT NULL,
        PRIMARY KEY (Parking_Structure_ID)
    )";

    mysqli_query($con, $create_Parking_Structure_database);

    // Creates Database table - Parking Spaces
    $create_Parking_Spaces_database = "CREATE TABLE Parking_Spaces (
        Parking_Space_ID VARCHAR(5) NOT NULL,
        Parking_Structure_ID VARCHAR(5) NOT NULL,
        Floor int(20) NOT NULL,
        Space_Number int(100) NOT NULL,
        is_disabled VARCHAR(3) NULL,
        PRIMARY KEY (Parking_Space_ID),
        FOREIGN KEY (Parking_Structure_ID) REFERENCES Parking_Structure(Parking_Structure_ID)
    )";

    mysqli_query($con, $create_Parking_Spaces_database);

    // Creates Database table - vehicle
    $create_vehicle_database = "CREATE TABLE Vehicle (
        Registeration_Plate VARCHAR(20) NOT NULL,
        Make VARCHAR(100) NOT NULL,
        Model VARCHAR(100) NOT NULL,
        Is_Electric VARCHAR(3) NULL,
        Is_Currently_Parked VARCHAR(3) NULL,
        Parking_Space_ID VARCHAR(5) NULL,
        PRIMARY KEY (Registeration_Plate),
        FOREIGN KEY (Parking_Space_ID) REFERENCES Parking_Spaces(Parking_Space_ID)
    )";

    mysqli_query($con, $create_vehicle_database);

    // Creates Database table - user vehicles
    $create_user_vehicles_database = "CREATE TABLE User_Vehicles (
        User_ID VARCHAR(5) NOT NULL,
        Registeration_Plate VARCHAR(20) NOT NULL,
        FOREIGN KEY (User_ID) REFERENCES User(User_ID),
        FOREIGN KEY (Registeration_Plate) REFERENCES Vehicle(Registeration_Plate)
    )";

    mysqli_query($con, $create_user_vehicles_database);

    // Creates Database table - arrival & departure
    $create_arrival_departure_database = "CREATE TABLE Arrival_Departure (
        Arrival_Departure_ID VARCHAR(5) NOT NULL,
        Arrival_Time Date NOT NULL,
        Departure_Time Date NOT NULL,
        User_ID VARCHAR(5) NOT NULL,
        Parking_Structure_ID VARCHAR(5) NOT NULL,
        FOREIGN KEY (User_ID) REFERENCES User(User_ID),
        FOREIGN KEY (Parking_Structure_ID) REFERENCES Parking_Structure(Parking_Structure_ID)
    )";

    mysqli_query($con, $create_arrival_departure_database);

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
        $seed_user1 = "INSERT INTO User VALUES('00001', 'Test', 'Test', 'Test', 'Test', 'Test@Test.com', '0777777777', '123 Test Town')";
        mysqli_query($con, $seed_user1);

        // Adds seed user - Elon
        $seed_user2 = "INSERT INTO User VALUES('00002', 'Musky', 'TeslaIsGreat', 'Elon', 'Musk', 'Elon@Testa.com', '0777777777', 'None of your damn business')";
        mysqli_query($con, $seed_user2);

        // Adds seed user - Admin
        $seed_user3 = "INSERT INTO User VALUES('00003', 'Admin', 'Admin', 'Admin', 'User', 'Admin@Test.com', '0777777777', '123 Admin Town')";
        mysqli_query($con, $seed_user3);

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
        $seed_parking_structure = "INSERT INTO Parking_Structure VALUES('00001', '456 Test Town', '5', '2.00')";
        mysqli_query($con, $seed_parking_structure);

    }   // End of IF (mysqli_num_rows($Parking_Structure_empty_test) == 0)

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            // Parking Spaces Database Seed \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

     // Populating database table Parking_Spaces
     $Parking_Spaces_empty_test = mysqli_query($con, "SELECT * FROM Parking_Spaces");

     // If database table Parking_Spaces is empty
     if (mysqli_num_rows($Parking_Spaces_empty_test) == 0)
     {
 
         // Adds seed Parking_Spaces1
         $seed_Parking_Spaces1 = "INSERT INTO Parking_Spaces VALUES('00001', '00001', '1', '1', 'No')";
         mysqli_query($con, $seed_Parking_Spaces1);

         // Adds seed Parking_Spaces2
         $seed_Parking_Spaces2 = "INSERT INTO Parking_Spaces VALUES('00002', '00001', '1', '2', 'No')";
         mysqli_query($con, $seed_Parking_Spaces2);

         // Adds seed Parking_Spaces3
         $seed_Parking_Spaces3 = "INSERT INTO Parking_Spaces VALUES('00003', '00001', '1', '3', 'No')";
         mysqli_query($con, $seed_Parking_Spaces3);

         // Adds seed Parking_Spaces4
         $seed_Parking_Spaces4 = "INSERT INTO Parking_Spaces VALUES('00004', '00001', '1', '4', 'No')";
         mysqli_query($con, $seed_Parking_Spaces4);

         // Adds seed Parking_Spaces5
         $seed_Parking_Spaces5 = "INSERT INTO Parking_Spaces VALUES('00005', '00001', '1', '5', 'Yes')";
         mysqli_query($con, $seed_Parking_Spaces5);
 
     }   // End of IF (mysqli_num_rows($Parking_Spaces_empty_test) == 0)

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                // Vehicle Database Seed \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

     // Populating database table Vehicle
     $Vehicle_empty_test = mysqli_query($con, "SELECT * FROM Vehicle");

     // If database table Vehicle is empty
     if (mysqli_num_rows($Vehicle_empty_test) == 0)
     {
 
         // Adds seed Parking_Spaces
         $seed_Vehicle = "INSERT INTO Vehicle VALUES('MUSKY', 'Tesla', 'Model S', 'Yes', 'Yes', '00004')";
         mysqli_query($con, $seed_Vehicle);

     }   // End of IF (mysqli_num_rows($Vehicle_empty_test) == 0)

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            // User Vehicles Database Seed \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

     // Populating database table User_Vehicles
     $User_Vehicles_empty_test = mysqli_query($con, "SELECT * FROM User_Vehicles");

     // If database table User_Vehicles is empty
     if (mysqli_num_rows($User_Vehicles_empty_test) == 0)
     {
 
         // Adds seed Parking_Spaces
         $seed_User_Vehicles = "INSERT INTO User_Vehicles VALUES('00002', 'MUSKY')";
         mysqli_query($con, $seed_User_Vehicles);

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
        $seed_Arrival_Departure1 = "INSERT INTO Arrival_Departure VALUES('2022-03-06 12:00:00', '2022-03-06 16:00:00', '00002', '00001')";
        mysqli_query($con, $seed_Arrival_Departure1);

        // Adds seed Arrival_Departure2
        $seed_Arrival_Departure2 = "INSERT INTO Arrival_Departure VALUES('2022-01-01 12:00:00', '2022-01-01 18:00:00', '00002', '00001')";
        mysqli_query($con, $seed_Arrival_Departure2);

        // Adds seed Arrival_Departure3
        $seed_Arrival_Departure3 = "INSERT INTO Arrival_Departure VALUES('2022-02-02 12:00:00', '2022-02-02 15:00:00', '00002', '00001')";
        mysqli_query($con, $seed_Arrival_Departure3);

    }   // End of IF (mysqli_num_rows($Arrival_Departure_empty_test) == 0)

}   // End of FUNCTION seedDatabase_part3()

?>
