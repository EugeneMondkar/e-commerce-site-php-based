<?php                                                                       
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 3))
{ header("Location: index.php");
  exit();
}

try{
require ('mysqli_connect.php');

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$empUN = $_POST["empUN"];
$password1 = $_POST["password1"];
$password2 = $_POST["password2"];
$pay_rate = $_POST["pay_rate"];
$user_level = $_POST["user_level"];




if ($password1 === $password2)
{
	$hashed_passcode = password_hash($password1, PASSWORD_DEFAULT);
	$sqlcommand = "INSERT INTO employees(first_name, last_name, empUN, password, registration_date, user_level, pay_rate)"; 
	$sqlcommand .= " VALUES('{$first_name}','{$last_name}','{$empUN}','{$hashed_passcode}', NOW(), {$user_level}, {$pay_rate})"; 
	
	$dbcon->query($sqlcommand);
	
	header ("location: admin-employee-list.php");
	




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


