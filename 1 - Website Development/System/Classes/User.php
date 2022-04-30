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

    public function getIs_Banned()
    {

        return @$this->user['Is_Banned'];                                                                 // GET _ Address

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

    public function setIs_Banned($Is_Banned)
    {

        mysqli_query($this->con, "UPDATE User SET Is_Banned = '$Is_Banned' WHERE User_ID='$user'");          // SET Address

    } 

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                        // Functions \\
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function newUser($con, $username, $password, $firstname, $lastname, $email, $phonenumber, $address)
    {

        // Creates new user object
        if (mysqli_query($con, "INSERT INTO User VALUES (0, '$username', '$password', '$firstname', '$lastname', '$email', '$phonenumber', '$address', 'No')"))
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

        // Updates user object
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

        // Removes user object from database
        if (mysqli_query($con, "DELETE FROM User WHERE User_ID='$user_id'"))

        {

            return TRUE;

        }
        else
        {

            return FALSE;

        }

    }   // End of FUNCTION updateUser()

    public function firstname_and_lastname()
    {

        $firstname = strtolower(@$this->user['Firstname']);
        $lastname = strtolower(@$this->user['Lastname']);

        $firstname = ucfirst($firstname);
        $lastname = ucfirst($lastname);

        $name = $firstname . " " . $lastname;

        return $name;

    }   // End of FUNCTION firstname_and_lastname()

    public function returnCustomerList()
    {

        $database_query = mysqli_query($this->con, "SELECT * FROM User");
        
        return $database_query;

    }   // End of FUNCTION returnCustomerList()

}   // End of Class User

?>
