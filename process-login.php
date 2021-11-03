<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    	
	try 
	{
		//connect to database
	    	require ('mysqli_connect.php');
	    	$email= $_POST['email'];
		$password= $_POST['password'];

		$query = "SELECT userid, password, first_name, last_name, user_level FROM users WHERE email='{$email}'";
		$result = $dbcon->query($query);
		
		if ($result->num_rows == 1) {
			$row = $result->fetch_assoc();
			
			if (password_verify($password, $row["password"])) {
				session_start();								
				// Ensure that the user level is an integer.
				$_SESSION["user_level"] = (int) $row["user_level"];
				$_SESSION["userid"] = $row["userid"];
				$_SESSION["first_name"] = $row["first_name"];
				$_SESSION["last_name"] = $row["last_name"];
				$_SESSION["email"] = $email;
				// Use a ternary operation to set the URL
				$url = ($_SESSION["user_level"] === 1) ? 'admin-page.php' : 'members-page.php'; 
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
