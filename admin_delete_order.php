<?php                                                                                     
	session_start();
	if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 1))
	{ header("Location: login.php");
	exit();
	}

	require("mysqli_connect.php");

	$order_id = $_GET["order_id"];

	$sql_command = "Delete FROM orders WHERE order_id='{$order_id}'";
	$dbcon->query($sql_command);
	$sql_command = "Delete FROM orders_items WHERE order_id='{$order_id}'";
	$dbcon->query($sql_command);

	header ("location: admin-view-orders.php");

?>
