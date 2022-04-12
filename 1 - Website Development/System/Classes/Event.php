<?php

class Event 
{

    // Class Attributes
    private $event;
    private $con;

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                        // Constructor \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function __construct($con, $event) 
    {

       $this->con = $con;
       $event_details_query = mysqli_query($con, "SELECT * FROM Event WHERE event_ID = '$event'");
       $this->event = mysqli_fetch_array($event_details_query);

    } 

   ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                        // Getters and Setters \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function getEvent_ID()
    {

        return @$this->event['event_ID'];

    }

    public function getRegisteration_Plate()
    {

        return @$this->event['Registeration_Plate'];

    }

    public function getUser_ID()
    {

        return @$this->event['User_ID'];

    }

    public function getArrival_Time()
    {

        return @$this->event['Arrival_Time'];

    }

    public function getDeparture_Time()
    {

        return @$this->event['Departure_Time'];

    }

    public function getParking_Structure_ID()
    {

        return @$this->event['Parking_Structure_ID'];

    }

    public function getParking_Space_ID()
    {

        return @$this->event['Parking_Space_ID'];

    }

    public function getbill()
    {

        return @$this->event['bill'];

    }

    // NOTE - Event_ID is determined by system and cannot be set

    public function setUsername($Registeration_Plate)
    {

        mysqli_query($this->con, "UPDATE Event SET Registeration_Plate = '$Registeration_Plate' WHERE event_ID='$event'");

    } 

    public function setArrival_Time($Arrival_Time)
    {

        mysqli_query($this->con, "UPDATE Event SET Arrival_Time = '$Arrival_Time' WHERE event_ID='$event'"); 

    } 

    public function setDeparture_Time($Departure_Time)
    {

        mysqli_query($this->con, "UPDATE Event SET Departure_Time = '$Departure_Time' WHERE event_ID='$event'"); 

    } 

    public function setParking_Structure_ID($Parking_Structure_ID)
    {

        mysqli_query($this->con, "UPDATE Event SET Parking_Structure_ID = '$Parking_Structure_ID' WHERE event_ID='$event'"); 

    } 

    public function setParking_Space_ID($Parking_Space_ID)
    {

        mysqli_query($this->con, "UPDATE Event SET Parking_Space_ID = '$Parking_Space_ID' WHERE event_ID='$event'"); 

    } 

    public function setbill($bill)
    {

        mysqli_query($this->con, "UPDATE Event SET bill = '$bill' WHERE event_ID='$event'"); 

    } 


    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                        // Functions \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function newEvent($con, $Registeration_Plate, $Arrival_Time)
    {

        // Creates new event object
        if (mysqli_query($con, "INSERT INTO Event VALUES (0, '$Registeration_Plate', '$Arrival_Time')"))
        {

            return TRUE;

        }
        else
        {

            return FALSE;

        }

    }   // End of FUNCTION newEvent()

    public function updateEvent($con, $field, $change, $event_ID)
    {

        // Updates event object
        if (mysqli_query($con, "UPDATE Event SET $field = '$change' WHERE event_ID='$event_ID'"))

        {

            return TRUE;

        }
        else
        {

            return FALSE;

        }

    }   // End of FUNCTION updateEvent()

    public function deleteEvent($con, $event_ID)
    {

        // Removes event object from database
        if (mysqli_query($con, "DELETE FROM User WHERE event_ID='$event_ID'"))

        {

            return TRUE;

        }
        else
        {

            return FALSE;

        }

    }   // End of FUNCTION deleteEvent()

}   // End of Class User

?>
