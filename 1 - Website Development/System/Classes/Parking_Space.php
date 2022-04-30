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

    public function newParking_Spaces($con, $Parking_Structure_ID, $Floor, $Space_Number, $is_disabled, $Registeration_Plate)
    {

        // Creates a new parking space object
        if (mysqli_query($con, "INSERT INTO Parking_Spaces VALUES (0, '$Parking_Structure_ID', '$Floor', '$Space_Number', '$is_disabled', '$Registeration_Plate')"))
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

    public function assemble_Parking_Spaces($con, $Parking_Structure_ID)
    {

        return $All_parking_spaces = mysqli_query($con, "SELECT * FROM Parking_Spaces WHERE Parking_Structure_ID='$Parking_Structure_ID' ORDER BY Parking_Space_ID");

    }   // End of FUNCTION Display_Parking_Spaces()

    public function Find_car($con, $Registeration_Plate)
    {

        $parking_space_query = mysqli_query($con, "SELECT * FROM Parking_Spaces WHERE Registeration_Plate='$Registeration_Plate' ORDER BY Parking_Space_ID");
        $vehicle_test_array = mysqli_fetch_array($parking_space_query);

        @$parking_space = $vehicle_test_array['Parking_Space_ID'];

        return $parking_space;

    }   // End of FUNCTION Display_Parking_Spaces()

}   // End of Class User

?>
