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
        if (mysqli_query($con, "INSERT INTO Parking_Structure VALUES (0, '$Address', '$Number_of_parking_spaces', '$Cost_per_hour')"))
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

    public function assemble_Parking_Structure($con, $Parking_Structure_ID)
    {

      // Assembles chapters together to form book
      $Parking_Space_obj = new Parking_Space($con, 1);
      $assembled_Parking_Structure = $Parking_Space_obj->assemble_Parking_Spaces($con, $Parking_Structure_ID);

      $parking_space_array = array();

        foreach ($assembled_Parking_Structure as $Parking_Space)
        {

            array_push($parking_space_array, $Parking_Space);

        }

        $counter = 0;

        echo "<div style = 'border: 2px solid black; padding: 20px;' class='container'>
                <div class='row' style = 'width: 100%;'>";

        foreach ($parking_space_array as $Parking_Space)
        {

            if ($counter == 5)
            {

                echo "</div> <div class='row' style = 'width: 100%;'>";

                

            }

            if ($Parking_Space['Registeration_Plate'] != '' or $Parking_Space['Registeration_Plate'] != NULL)
            {

                $Registeration_Plate = $Parking_Space['Registeration_Plate'];

                $user_search = mysqli_query($con, "SELECT * FROM User_Vehicles WHERE Registeration_Plate = '$Registeration_Plate'");

                $user_id_array = mysqli_fetch_array($user_search);

                @$User_ID = $user_id_array['User_ID'];

            }

            echo "<div style = 'display: grid; justify-content: center;' class='col-sm'>

            <p style = 'text-align: center; justify-content: center;'> " . $counter . " </p>

            <div style = 'border-style: dotted; padding: 50px 50px; max-height: 50px; max-width: 50px; display: grid; justify-content: center;'>";

            if ($Parking_Space['Registeration_Plate'] != '' or $Parking_Space['Registeration_Plate'] != NULL)
            {

                echo "
                <a href='pages-profile.php?id=" . $User_ID . "'
                
                <i class='fa fa-car' style = 'font-size: 50px; color: black;   top: 50%;
                -ms-transform: translateY(-50%);
                transform: translateY(-50%);'></i>
                
                </a>";

            }

            $counter++;

            echo "</div> </div>";

        }

        echo "</div> </div>";

    }   // End of FUNCTION assemble_Parking_Structure()

}   // End of Class User

?>
