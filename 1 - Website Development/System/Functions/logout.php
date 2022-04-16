<?php

// When logout button is pressed

session_start();                                            // Begins a new session (deleting old data)
session_destroy();                                          // Ends new session
setcookie('login', null, -1, '/');                         // Unsets login cookie

header("Location: ../../Login.php");                        // Redirects to register page to relogin

?>