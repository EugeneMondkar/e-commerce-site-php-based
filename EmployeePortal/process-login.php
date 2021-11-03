<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    	
	try 
	{
		//connect to database
	    	require ('mysqli_connect.php');
	    	$empUN= $_POST['empUN'];
		$password= $_POST['password'];

		$query = "SELECT empID, first_name, last_name, password, registration_date, user_level, pay_rate FROM employees WHERE empUN='{$empUN}'";
		$result = $dbcon->query($query);
		
		if ($result->num_rows == 1) {
			$row = $result->fetch_assoc();
			
			

				//if ($password === $row["password"]) 
				if (password_verify($password, $row["password"])){
				session_start();								
				// Ensure that the user level is an integer.
				$_SESSION["empUN"] = $empUN;
				$_SESSION["empID"] = (int) $row["empID"];
				$_SESSION["first_name"] = $row["first_name"];
				$_SESSION["last_name"] = $row["last_name"];
				$_SESSION["user_level"] = (int) $row["user_level"];
				$_SESSION["pay_rate"] = $row["pay_rate"];
				$_SESSION["registration_date"] = $row["registration_date"];
				// Use a ternary operation to set the URL
				$url = ($_SESSION["user_level"] === 3) ? 'admin-page.php' : 'worker-page.php'; 
				header('Location: ' . $url); 
				// Make the browser load either the members or the admin page
			} 
		}

	

	}
	catch(Exception $e) // We finally handle any problems here   
	{
	     // print "An Exception occurred. Message: " . $e->getMessage();
	     print "The system is busy please try later";
	}
	catch(Error $e)
	{
	      //print "An Error occurred. Message: " . $e->getMessage();
	      print "The system is busy please try again later.";
	}
} 
?> 
