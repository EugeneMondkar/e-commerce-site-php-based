<?php
	session_start();//access the current session.                  

	$_SESSION = array();
    	
	
	unset($_SESSION["empID"]);	
	unset($_SESSION["first_name"]);	
	unset($_SESSION["last_name"]);	
	unset($_SESSION["user_level"]);	
	unset($_SESSION["pay_rate"]);	
	unset($_SESSION["registration_date"]);	

	header("location:index.php");


?>
