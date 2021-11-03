<?php                                                                       
		session_start();
		if (!isset($_SESSION['user_level']) or ( ($_SESSION['user_level'] != 2) and ($_SESSION['user_level'] != 3) ) )
		{ header("Location: index.php");
		  exit();
		}

		require ('mysqli_connect.php');
	    	
		$password= $_POST['password'];
		$password1= $_POST['password1'];
		$password2= $_POST['password2'];

		$empID = $_SESSION['empID'];

		$sqlcommand = "SELECT password FROM employees WHERE empID={$empID}";
		$result = $dbcon->query($sqlcommand);

		if ($result->num_rows == 1) {
			$row = $result->fetch_assoc();
			
							
				if (password_verify($password, $row["password"])){
												
					if ($password1 === $password2)
					{
						$hashed_passcode = password_hash($password1, PASSWORD_DEFAULT);
						$sqlcommand01 = "UPDATE employees SET password='{$hashed_passcode}' WHERE empID={$empID}"; 	

						
						$dbcon->query($sqlcommand01);
						
						
						header('Location: index.php'); 
						




					}
				


				
				
			} 
		}



?>
