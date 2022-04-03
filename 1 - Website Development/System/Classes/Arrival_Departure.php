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

       $this->con = $con;
       $arrival_departure_details_query = mysqli_query($con, "SELECT * FROM Arrival_Departure WHERE Arrival_Departure_ID = '$arrival_departure'");
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

    public function newArrival_Departure($con, $Arrival_Departure_ID, $User_ID, $Parking_Structure_ID, $Arrival_Time, $Departure_Time)
    {

        $highest_Arrival_Departure_ID = mysqli_query($con, "SELECT MAX(Arrival_Departure_ID) FROM Departure_Time");

        $row = mysqli_fetch_array($highest_Arrival_Departure_ID);

        $highest_Arrival_Departure_ID_int = intval($row['0']) + 1;

        $highest_Arrival_Departure_ID_str = strval($highest_Arrival_Departure_ID_int);

        if (mysqli_query($con, "INSERT INTO Arrival_Departure VALUES ('$highest_Arrival_Departure_ID_str', '$User_ID', '$Parking_Structure_ID', '$Arrival_Time', '$Departure_Time')"))
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

        if (mysqli_query($con, "UPDATE Arrival_Departure SET $field = '$change' WHERE Arrival_Departure_ID='$Arrival_Departure_ID'"))

        {

            return TRUE;

        }
        else
        {

            return FALSE;

        }

    }   // End of FUNCTION updateArrival_Departure()

    // REQUIRED - create newArrival with current time no departure - and then update that update the departure with current time

    public function deleteArrival_Departure($con, $Arrival_Departure_ID)
    {

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
