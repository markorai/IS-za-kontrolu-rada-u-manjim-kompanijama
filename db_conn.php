<?php

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "is_za_kontrolu_rada";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}