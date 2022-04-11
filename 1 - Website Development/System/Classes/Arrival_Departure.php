<?php

class Arrival_Departure 
{

    // Class Attributes
    private $arrival_departure;
    private $con;

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                        // Constructor \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function __construct($con, $arrival_departure) 
    {

        // This needs to be changed to Arrival_Departure_ID when new DB is up
       $this->con = $con;
       $arrival_departure_details_query = mysqli_query($con, "SELECT * FROM Arrival_Departure WHERE User_ID = '$arrival_departure'");
       $this->arrival_departure = mysqli_fetch_array($arrival_departure_details_query);

    } 

   ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                        // Getters and Setters \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function getArrival_Departure_ID()
    {

        return @$this->arrival_departure['Arrival_Departure_ID'];

    }

    public function getUser_ID()
    {

        return @$this->arrival_departure['User_ID'];

    }

    public function getArrival_Time()
    {

        return @$this->Departure_Time['Arrival_Time'];

    }

    public function getDeparture_Time()
    {

        return @$this->Departure_Time['Departure_Time'];

    }

    public function getParking_Structure_ID()
    {

        return @$this->Departure_Time['Parking_Structure_ID'];

    }

    public function setArrival_Time($Arrival_Time)
    {

        mysqli_query($this->con, "UPDATE Arrival_Departure SET Arrival_Time = '$Address' WHERE User_ID='$arrival_departure'");

    } 

    public function setDeparture_Time($Departure_Time)
    {

        mysqli_query($this->con, "UPDATE Arrival_Departure SET Departure_Time = '$Departure_Time' WHERE User_ID='$arrival_departure'");

    } 

    // NOTE - Arrival_Departure_ID, User_ID and Parking_Structure_IDis determined by system and cannot be set

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                        // Functions \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    public function newArrival($con, $User_ID, $Parking_Structure_ID, $Arrival_Time)
    {

        $date_time_now = date("Y-m-d H:i:s");

        // Creates arrival record - records arrival and departure as the same date
        if (mysqli_query($con, "INSERT INTO Arrival_Departure VALUES ('$User_ID', '$Parking_Structure_ID', '$date_time_now', '$date_time_now')"))
        {

            return TRUE;

        }
        else
        {

            return FALSE;

        }

    }   // End of FUNCTION newArrival_Departure()

    public function updateArrival_Departure($con, $field, $change, $Arrival_Departure_ID)
    {

        // Changes the information in the arrival and departure record - mostly used for correcting errors and testing
        if (mysqli_query($con, "UPDATE Arrival_Departure SET $field = '$change' WHERE Arrival_Departure_ID='$Arrival_Departure_ID'"))

        {

            return TRUE;

        }
        else
        {

            return FALSE;

        }

    }   // End of FUNCTION updateArrival_Departure()

    public function updateDeparture($con, $Registeration_Plate)
    {

        // Finding the User_ID for the registeration plate
        $registeration_plate_search = mysqli_query($con, "SELECT User_ID FROM User_Vehicles WHERE Registeration_Plate = '$Registeration_Plate'");

        $row1 = mysqli_fetch_array($registeration_plate_search);

        $user_id = $row1[0];

        // Finding the most recent arrival_departure_ID of user
        $highest_Arrival_Departure_ID = mysqli_query($con, "SELECT MAX(Arrival_Departure_ID) FROM Departure_Time WHERE User_ID ='$user_id'");

        $row2 = mysqli_fetch_array($highest_Arrival_Departure_ID);

        $Arrival_Departure_ID = $row2[0];

        // Recording current time for departure
        $date_time_now = date("Y-m-d H:i:s");

        // Records the arrival of user into database - event listener (Handled by Python Script - here for testing)
        if (mysqli_query($con, "UPDATE Arrival_Departure SET Departure_Time = '$date_time_now' WHERE Arrival_Departure_ID='$Arrival_Departure_ID'"))

        {

            return TRUE;

        }
        else
        {

            return FALSE;

        }

    }   // End of FUNCTION updateArrival_Departure()

    public function deleteArrival_Departure($con, $Arrival_Departure_ID)
    {

        // Deletes record of arrival and departure - here for testing
        if (mysqli_query($con, "DELETE FROM Arrival_Departure WHERE Arrival_Departure_ID='$Arrival_Departure_ID'"))

        {

            return TRUE;

        }
        else
        {

            return FALSE;

        }

    }   // End of FUNCTION deleteArrival_Departure()

}   // End of Class User

?>
