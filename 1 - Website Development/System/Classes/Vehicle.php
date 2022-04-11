<?php

class Vehicle 
{

    // Class Attributes
    private $vehicle;
    private $con;

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                        // Constructor \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function __construct($con, $vehicle) 
    {

       $this->con = $con;
       $vehicle_details_query = mysqli_query($con, "SELECT * FROM Vehicle WHERE Registeration_Plate = '$vehicle'");
       $this->vehicle = mysqli_fetch_array($vehicle_details_query);

    } 

   ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                        // Getters and Setters \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function getRegisteration_Plate()
    {

        return @$this->vehicle['Registeration_Plate'];

    }

    public function getMake()
    {

        return @$this->vehicle['Make'];

    }

    public function getModel()
    {

        return @$this->vehicle['Model'];

    }

    public function getIs_Electric()
    {

        return @$this->vehicle['Is_Electric']; 

    }

    public function getIs_Currently_Parked()
    {

        return @$this->vehicle['Is_Currently_Parked'];

    }

    public function getParking_Space_ID()
    {

        return @$this->vehicle['Parking_Space_ID'];

    }

    // NOTE - Registeration_Plate is provided by user and not generated

    public function setMake($Make)
    {

        mysqli_query($this->con, "UPDATE Vehicle SET Make = '$Make' WHERE Registeration_Plate='$vehicle'");

    } 

    public function setModel($Model)
    {

        mysqli_query($this->con, "UPDATE Vehicle SET Model = '$Model' WHERE Registeration_Plate='$vehicle'");

    } 

    public function setIs_Electric($Is_Electric)
    {

        mysqli_query($this->con, "UPDATE Vehicle SET Is_Electric = '$Is_Electric' WHERE Registeration_Plate='$vehicle'");

    } 

    public function setIs_Currently_Parked($Is_Currently_Parked)
    {

        mysqli_query($this->con, "UPDATE Vehicle SET Is_Currently_Parked = '$Is_Currently_Parked' WHERE Registeration_Plate='$vehicle'");

    } 

    // Parking_Space_ID - is generated by the parking space the car is currently parked in

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                        // Functions \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function newVehicle($con, $Registeration_Plate, $Make, $Model, $Is_Electric, $Is_Currently_Parked, $Parking_Space_ID)
    {

        // Creates new vehicle object
        if (mysqli_query($con, "INSERT INTO Vehicle VALUES ('$Registeration_Plate', '$Make', '$Model', '$Is_Electric', '$Is_Currently_Parked', '$Parking_Space_ID')"))
        {

            return TRUE;

        }
        else
        {

            return FALSE;

        }

    }   // End of FUNCTION newVehicle()

    public function updateVehicle($con, $field, $change, $Registeration_Plate)
    {

        // Updates vehicle object
        if (mysqli_query($con, "UPDATE Vehicle SET $field = '$change' WHERE Registeration_Plate='$Registeration_Plate'"))

        {

            return TRUE;

        }
        else
        {

            return FALSE;

        }

    }   // End of FUNCTION updateVehicle()

    public function deleteVehicle($con, $Registeration_Plate)
    {

        // Removes vehicle object from database
        if (mysqli_query($con, "DELETE FROM Vehicle WHERE Registeration_Plate='$Registeration_Plate'"))

        {

            return TRUE;

        }
        else
        {

            return FALSE;

        }

    }   // End of FUNCTION deleteVehicle()

}   // End of Class User

?>
