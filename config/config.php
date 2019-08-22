<?php

$servername = "localhost";
$username = "u1492p32235_spel";
$password = "***REMOVED***";
$dbname = "u1492p32235_spel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>
