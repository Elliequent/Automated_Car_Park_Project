<?php

class Parking_Space 
{

    // Class Attributes
    private $parking_spaces;
    private $con;

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                        // Constructor \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function __construct($con, $parking_spaces) 
    {

       $this->con = $con;
       $parking_spaces_details_query = mysqli_query($con, "SELECT * FROM Parking_Spaces WHERE Parking_Space_ID = '$parking_spaces'");
       $this->parking_spaces = mysqli_fetch_array($parking_spaces_details_query);

    } 

   ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                        // Getters and Setters \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function getParking_Space_ID()
    {

        return @$this->parking_spaces['Parking_Space_ID'];

    }

    public function getParking_Structure_ID()
    {

        return @$this->parking_spaces['Parking_Structure_ID'];

    }

    public function getFloor()
    {

        return @$this->parking_spaces['Floor'];

    }

    public function getSpace_Number()
    {

        return @$this->parking_spaces['Space_Number']; 

    }

    public function getis_disabled()
    {

        return @$this->parking_spaces['is_disabled']; 

    }

    public function getRegisteration_Plate()
    {

        return @$this->parking_spaces['Registeration_Plate']; 

    }

    // NOTE - Parking_Space_ID and Parking_Structure_ID is determined by system and cannot be set

    public function setFloor($Floor)
    {

        mysqli_query($this->con, "UPDATE Parking_Spaces SET Floor = '$Floor' WHERE Parking_Space_ID='$parking_spaces'");

    } 

    public function setSpace_Number($Space_Number)
    {

        mysqli_query($this->con, "UPDATE Parking_Spaces SET Space_Number = '$Space_Number' WHERE Parking_Space_ID='$parking_spaces'");

    } 

    public function setis_disabled($is_disabled)
    {

        mysqli_query($this->con, "UPDATE Parking_Spaces SET is_disabled = '$is_disabled' WHERE Parking_Space_ID='$parking_spaces'");

    } 

    public function setRegisteration_Plate($Registeration_Plate)
    {

        mysqli_query($this->con, "UPDATE Parking_Spaces SET Registeration_Plate = '$Registeration_Plate' WHERE Parking_Space_ID='$parking_spaces'");

    } 

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                        // Functions \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function newParking_Spaces($con, $Parking_Structure_ID, $Floor, $Space_Number, $is_disabled)
    {

        // Creates a new parking space object
        if (mysqli_query($con, "INSERT INTO Parking_Spaces VALUES ('$Parking_Structure_ID', '$Floor', '$Space_Number', '$is_disabled')"))
        {

            return TRUE;

        }
        else
        {

            return FALSE;

        }

    }   // End of FUNCTION newParking_Spaces()

    public function updateParking_Spaces($con, $field, $change, $Parking_Space_ID)
    {

        // Changes information about parking space
        if (mysqli_query($con, "UPDATE Parking_Spaces SET $field = '$change' WHERE Parking_Space_ID='$Parking_Space_ID'"))

        {

            return TRUE;

        }
        else
        {

            return FALSE;

        }

    }   // End of FUNCTION updateParking_Spaces()

    public function deleteParking_Spaces($con, $Parking_Structure_ID)
    {

        // Removes parking space record from database
        if (mysqli_query($con, "DELETE FROM Parking_Spaces WHERE Parking_Space_ID='$Parking_Space_ID'"))

        {

            return TRUE;

        }
        else
        {

            return FALSE;

        }

    }   // End of FUNCTION deleteParking_Spaces()

}   // End of Class User

?>