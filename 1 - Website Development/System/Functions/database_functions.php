<?php

    function insertBD($table, $row, $value)
    {

        mysqli_query($con, "INSERT INTO $table ('$row') VALUES ('$value')");

    }

?>