<?php
// Setup connection to the galloRetailDB 
// Set the encoding and the access details as constants:
DEFINE ('DB_USER', 'ymondkar');
DEFINE ('DB_PASSWORD', 'cisw31L');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'galloPortalDB');
// Make the connection:
$dbcon = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

/*
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
*/

// Set the encoding...optional but recommended
mysqli_set_charset($dbcon, 'utf8'); 

?> 
