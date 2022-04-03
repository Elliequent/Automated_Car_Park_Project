<?php

class User 
{

    // Class Attributes
    private $user;
    private $con;

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                        // Constructor \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function __construct($con, $user) 
    {

       $this->con = $con;
       $user_details_query = mysqli_query($con, "SELECT * FROM User WHERE User_ID = '$user'");
       $this->user = mysqli_fetch_array($user_details_query);

    } 

   ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                        // Getters and Setters \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function getUser_ID()
    {

        return @$this->user['User_ID'];                                                                 // GET _ User_ID

    }

    public function getUsername()
    {

        return @$this->user['Username'];                                                                // GET _ Username

    }

    public function getPassword()
    {

        return @$this->user['Password'];                                                                // GET _ Password

    }

    public function getFirstName()
    {

        return @$this->user['Firstname'];                                                               // GET _ Firstname

    }

    public function getLastname()
    {

        return @$this->user['Lastname'];                                                                // GET _ Lastname

    }

    public function getEmail()
    {

        return @$this->user['Email'];                                                                   // GET _ Email

    }

    public function getPhone_number()
    {

        return @$this->user['Phone_Number'];                                                            // GET _ Phone_Number

    }

    public function getAddress()
    {

        return @$this->user['Address'];                                                                 // GET _ Address

    }

    // NOTE - User_ID is determined by system and cannot be set

    public function setUsername($username)
    {

        mysqli_query($this->con, "UPDATE User SET Username = '$username' WHERE User_ID='$user'");       // SET Username

    } 

    public function setPassword($password)
    {

        mysqli_query($this->con, "UPDATE User SET Password = '$password' WHERE User_ID='$user'");        // SET Password

    } 

    public function setFirstName($Firstname)
    {

        mysqli_query($this->con, "UPDATE User SET Firstname = '$Firstname' WHERE User_ID='$user'");     // SET Firstname

    } 

    public function setLastName($lastname)
    {

        mysqli_query($this->con, "UPDATE User SET Lastname = '$lastname' WHERE User_ID='$user'");       // SET Lastname

    } 

    public function setEmail($email)
    {

        mysqli_query($this->con, "UPDATE User SET Email = '$email' WHERE User_ID='$user'");             // SET Email

    } 

    public function setPhone_Number($phonenumber)
    {

        mysqli_query($this->con, "UPDATE User SET Phone_Number = '$phonenumber' WHERE User_ID='$user'");    // SET Phone_Number

    } 

    public function setAddress($address)
    {

        mysqli_query($this->con, "UPDATE User SET Address = '$address' WHERE User_ID='$user'");          // SET Address

    } 

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                        // Functions \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function newUser($con, $username, $password, $firstname, $lastname, $email, $phonenumber, $address)
    {

        $highest_user_ID = mysqli_query($con, "SELECT MAX(User_ID) FROM User");

        $row = mysqli_fetch_array($highest_user_ID);

        $highest_user_id_int = intval($row['0']) + 1;

        $highest_user_id_str = strval($highest_user_id_int);

        if (mysqli_query($con, "INSERT INTO User VALUES ('$highest_user_id_str', '$username', '$password', '$firstname', '$lastname', '$email', '$phonenumber', '$address')"))
        {

            return TRUE;

        }
        else
        {

            return FALSE;

        }

    }   // End of FUNCTION newUser()

    public function updateUser($con, $field, $change, $user_id)
    {

        if (mysqli_query($con, "UPDATE User SET $field = '$change' WHERE User_ID='$user_id'"))

        {

            return TRUE;

        }
        else
        {

            return FALSE;

        }

    }   // End of FUNCTION updateUser()

    public function deleteUser($con, $user_id)
    {

        if (mysqli_query($con, "DELETE FROM User WHERE User_ID='$user_id'"))

        {

            return TRUE;

        }
        else
        {

            return FALSE;

        }

    }   // End of FUNCTION updateUser()

}   // End of Class User

?>
