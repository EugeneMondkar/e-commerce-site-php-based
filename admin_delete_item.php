<?php                                                                                     
	session_start();
	if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 1))
	{ header("Location: login.php");
	exit();
	}

	require("mysqli_connect.php");

	$productID = $_GET["action"];
	$back = $_GET["back"];


	$sql_command = "DELETE FROM products WHERE product_id='{$productID}'";
	$dbcon->query($sql_command);
	
	header ("location: {$back}");
?>
