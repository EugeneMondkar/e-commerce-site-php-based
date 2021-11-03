<?php                                                                       
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 3))
{ header("Location: index.php");
  exit();
}

try{
require ('mysqli_connect.php');


$shiftNum = $_GET["action"];


$sqlcommand = "UPDATE timesheet SET approval='Approved' WHERE shiftNum={$shiftNum}"; 
	
$url = $_GET["back"];


if ($dbcon->query($sqlcommand) === TRUE) {
    header("location: $url");
} else {
    echo "Error updating record: " . $dbcon->error;
}	




}									
catch(Exception $e) // We finally handle any problems here   
{

	print "The system is busy please try later";
}
catch(Error $e)
{

	print "The system is busy please try again later.";
}

?>
































?>


