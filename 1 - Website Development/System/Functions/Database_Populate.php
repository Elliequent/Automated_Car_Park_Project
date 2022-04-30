<?php

echo "<pre style = 'text-align: center;'>";

echo "Redbuilding Database";
echo "<br> <hr style = 'border: 2px solid black;'>";
echo "<br>";

require '../Config/config.php';

echo "<br>";
echo "<br> <hr style = 'border: 2px solid black;'>";
echo "<br>";

header("refresh: 5; url = ../../index.php");
exit();

?>