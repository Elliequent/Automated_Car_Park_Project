<?php

class Parking_Structure 
{

    // Class Attributes
    private $parking_structure;
    private $con;

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                        // Constructor \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function __construct($con, $parking_structure) 
    {

       $this->con = $con;
       $parking_structure_details_query = mysqli_query($con, "SELECT * FROM Parking_Structure WHERE Parking_Structure_ID = '$parking_structure'");
       $this->parking_structure = mysqli_fetch_array($parking_structure_details_query);

    } 

   ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                        // Getters and Setters \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function getParking_Structure_ID()
    {

        return @$this->parking_structure['Parking_Structure_ID'];

    }

    public function getAddress()
    {

        return @$this->parking_structure['Address'];

    }

    public function getNumber_of_parking_spaces()
    {

        return @$this->parking_structure['Number_of_parking_spaces'];

    }

    public function getCost_per_hour()
    {

        return @$this->parking_structure['Cost_per_hour']; 

    }

    // NOTE - Parking_Structure_ID is determined by system and cannot be set

    public function setAddress($Address)
    {

        mysqli_query($this->con, "UPDATE Parking_Structure SET Address = '$Address' WHERE Parking_Structure_ID='$parking_structure'");

    } 

    public function setNumber_of_parking_spaces($Number_of_parking_spaces)
    {

        mysqli_query($this->con, "UPDATE Parking_Structure SET Number_of_parking_spaces = '$Number_of_parking_spaces' WHERE Parking_Structure_ID='$parking_structure'");

    } 

    public function setCost_per_hour($Cost_per_hour)
    {

        mysqli_query($this->con, "UPDATE Parking_Structure SET Cost_per_hour = '$Cost_per_hour' WHERE Parking_Structure_ID='$parking_structure'");

    } 

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                        // Functions \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function newParking_Structure($con, $Address, $Number_of_parking_spaces, $Cost_per_hour)
    {

        // Creates parking structure object
        if (mysqli_query($con, "INSERT INTO Parking_Structure VALUES ('$Address', '$Number_of_parking_spaces', '$Cost_per_hour')"))
        {

            return TRUE;

        }
        else
        {

            return FALSE;

        }

    }   // End of FUNCTION newParking_Structure()

    public function updateParking_Structure($con, $field, $change, $Parking_Structure_ID)
    {

        // Updates parking structure information
        if (mysqli_query($con, "UPDATE Parking_Structure SET $field = '$change' WHERE Parking_Structure_ID='$Parking_Structure_ID'"))

        {

            return TRUE;

        }
        else
        {

            return FALSE;

        }

    }   // End of FUNCTION updateParking_Structure()

    public function deleteParking_Structure($con, $Parking_Structure_ID)
    {

        // Removes parking structure information from database
        if (mysqli_query($con, "DELETE FROM Parking_Structure WHERE Parking_Structure_ID='$Parking_Structure_ID'"))

        {

            return TRUE;

        }
        else
        {

            return FALSE;

        }

    }   // End of FUNCTION deleteParking_Structure()

}   // End of Class User

?>
