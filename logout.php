<?php
session_start();//access the current session.                  

	$_SESSION = array();
    	unset($_SESSION["qty"]); 
        unset($_SESSION["amounts"]); 
        unset($_SESSION["total"]); 
        unset($_SESSION["cart"]); 
	unset($_SESSION['userid']);	
	unset($_SESSION['user_level']);	

	header("location:index.php");


?>
