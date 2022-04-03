<?php

class User_Vehicles 
{

    // Class Attributes
    private $user_vehicles;
    private $con;

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                        // Constructor \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function __construct($con, $user_vehicles) 
    {

       $this->con = $con;
       $user_vehicles_details_query = mysqli_query($con, "SELECT * FROM User_Vehicles WHERE User_ID = '$user_vehicles'");
       $this->user_vehicles = mysqli_fetch_array($user_vehicles_details_query);

    } 

   ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                        // Getters and Setters \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function getUser_ID()
    {

        return @$this->user_vehicles['User_ID'];

    }

    public function getRegisteration_Plate()
    {

        return @$this->user_vehicles['Registeration_Plate'];

    }

    // NOTE - User_ID is determined by system and cannot be set and Registeration_Plate is an array and handled by functions

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                        // Functions \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function newUser_Vehicles($con, $User_ID, $Registeration_Plate)
    {

        if (mysqli_query($con, "INSERT INTO User_Vehicles VALUES ('$User_ID', '$Registeration_Plate')"))
        {

            return TRUE;

        }
        else
        {

            return FALSE;

        }

    }   // End of FUNCTION newUser_Vehicles()

    public function updateUser_Vehicles($con, $Registeration_Plate, $change, $User_ID)
    {

        if (mysqli_query($con, "UPDATE User_Vehicles SET Registeration_Plate = '$Registeration_Plate' WHERE User_ID='$User_ID'"))

        {

            return TRUE;

        }
        else
        {

            return FALSE;

        }

    }   // End of FUNCTION updateUser_Vehicles()

    // REQUIRED - create add vehicle and remove vehicle function here

    public function deleteUser_Vehicles($con, $Parking_Structure_ID)
    {

        if (mysqli_query($con, "DELETE FROM User_Vehicles WHERE User_ID='$User_ID'"))

        {

            return TRUE;

        }
        else
        {

            return FALSE;

        }

    }   // End of FUNCTION deleteUser_Vehicles()

}   // End of Class User

?>
