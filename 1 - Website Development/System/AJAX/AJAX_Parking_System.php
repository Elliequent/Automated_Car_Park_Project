<?php

include '../Config/config.php';
include '../Classes/Parking_Space.php';
include '../Classes/Parking_Structure.php';

$Parking_Structure_ID = $_REQUEST['parking_location'];

$parking_structure_test = mysqli_query($con, "SELECT * FROM Parking_Structure WHERE Parking_Structure_ID = '$Parking_Structure_ID'");
$parking_structure_test_array = mysqli_fetch_array($parking_structure_test);

$parking_structure_ID = $parking_structure_test_array['Parking_Structure_ID'];

$parking_strucuture_obj = new Parking_Structure($con, $parking_structure_ID);

$test = $parking_strucuture_obj->assemble_Parking_Structure($con, $Parking_Structure_ID);

?>