<?php                                                                       
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 3))
{ header("Location: index.php");
  exit();
}

try{
require ('mysqli_connect.php');


$empUN = $_POST["empUN"];


$sqlcommand = "DELETE FROM employees WHERE empUN='{$empUN}'"; 
	



if ($dbcon->query($sqlcommand) === TRUE) {
    header("location: admin-page.php");
} else {
    echo "Error deleting record: " . $dbcon->error;
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


