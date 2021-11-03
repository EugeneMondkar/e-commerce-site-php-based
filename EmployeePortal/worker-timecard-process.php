<?php
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 2))
{ header("Location: index.php");
  exit();
}


	require ('mysqli_connect.php');	

	$empID = $_SESSION["empID"];
	$start_time = $_POST["start_hour"] + ($_POST["start_min"] / 60);
	$end_time = $_POST["end_hour"] + ($_POST["end_min"] / 60);
	$shift_date = $_POST["shift_date"];
	if ($start_time >= $end_time)
	{
		$num_hours = (12 - $start_time) + $end_time;
	} else {
		$num_hours = $end_time - $start_time;
	}
	$approval = "Needs Approval";
	$amount = $_SESSION["pay_rate"] * $num_hours;

	$sqlcommand = "INSERT INTO timesheet(empID, start_time, end_time, shift_date, num_hours, approval, amount)"; 
	$sqlcommand .= " VALUES({$empID},{$start_time},{$end_time},'{$shift_date}', {$num_hours}, '{$approval}', {$amount})"; 
	
	$dbcon->query($sqlcommand);
	
	header ("location: worker-workhistory.php"); 


?>
