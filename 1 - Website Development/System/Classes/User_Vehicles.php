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

        // Checks if user already has a vehicle registered to their account - if yes then create array
        $user_vehicle_check = mysqli_query($con, "SELECT Registeration_Plate FROM User_Vehicles WHERE User_ID='$User_ID'");

        $row = mysqli_fetch_array($user_vehicle_check);

        if ($row[0] == "")
        {

            if (mysqli_query($con, "INSERT INTO User_Vehicles VALUES ('$User_ID', '$Registeration_Plate')"))
            {

                return TRUE;

            }
            else
            {

                return FALSE;

            }   // End of IF if (mysqli_query($con, "INSERT INTO User_Vehicles VALUES ('$User_ID', '$Registeration_Plate')"))

        }
        else
        {

            // Creates a string with each licence plate - function breaks down licence plates to array
            $Registeration_Plate = $row[0] + "," + $Registeration_Plate;

            if (mysqli_query($con, "INSERT INTO User_Vehicles VALUES ('$User_ID', '$Registeration_Plate')"))
            {

                return TRUE;

            }
            else
            {

                return FALSE;

            }   // End of IF if (mysqli_query($con, "INSERT INTO User_Vehicles VALUES ('$User_ID', '$Registeration_Plate')"))

        }   // ENd of IF ($row['0'] == "")

    }   // End of FUNCTION newUser_Vehicles()

    public function removeUser_Vehicles($con, $Registeration_Plate, $User_ID)
    {

        // Checks if user already has a vehicle registered to their account - if yes then create array
        $user_vehicle_check = mysqli_query($con, "SELECT Registeration_Plate FROM User_Vehicles WHERE User_ID='$User_ID'");

        $row = mysqli_fetch_array($user_vehicle_check);

        $vehicle_list = explode(",", $row);

        $counter = 0;

        // Goes through each car in array and matches licence plate and removes
        foreach ($vehicle_list as $car) 
        {
            
            if ($Registeration_Plate == $car)
            {

                unset($vehicle_list[$counter]);

            }

            $counter++;

        }   // End of FOREACH ($vehicle_list as $car) 
 
        // Returns vechile array back to string 
        $Registeration_Plate = implode(",", $vehicle_list);

        // Stores new licence plate string in database and returns TRUE if successful
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

        // Removes all vechiles associated with user - part of BANNING system
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
