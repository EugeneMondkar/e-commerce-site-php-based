<?php                                                                       
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 3))
{ header("Location: index.php");
  exit();
}

require('mysqli_connect.php');

$sqlcommand = "SELECT * FROM employees";
$result = $dbcon->query($sqlcommand);


?>


<html>
	<head>
	
		<title>Gallo and Sons Gourmet Foods, Importer of Fine Foods and Kitchen Tools</title>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  		<!-- Bootstrap CSS Import -->
  		<link rel="stylesheet" 
  		href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" 
  		integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" 
	  	crossorigin="anonymous">
		
		

	</head>

	<body>
			<div class="container" style="margin-top:30px">
			
			<!-- Banner/Header Area -->

			<header class="text-center row"
			style="margin-bottom:0px; background:linear-gradient(black, #800000); 
			padding:20px;">
				<!-- Import Banner -->
				<?php include('admin-header.php'); ?>
			</header>

			<!-- Body -->

			<div class="row" style="padding-left: 0px;">

			<!-- Navigation Menu -->
			<nav class="col-sm-2" style="background:linear-gradient(#800000, #800000);
		padding:30px;">
			<!-- Import Menu -->
			<?php include('admin-nav.php'); ?> 
      			
  		</nav>
			
			

			<!-- Center Column Content Area -->

			<div class="text-white col-sm-10" 
			style="background:linear-gradient(#800000,#800000);">
				<h2 class="text-center text-warning">Employee List</h2>
				
				<table class="table table-striped table-dark">
				  <thead>
				    <tr>
				      <th scope="col">EmpID</th>
				      <th scope="col">First</th>
				      <th scope="col">Last</th>
				      <th scope="col">Username</th>
				      <th scope="col">Hire Date</th>
				      <th scope="col">Pay Rate</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
					<?php
						while($row = $result->fetch_assoc())
						{

						    echo "<tr>";
						    if ($row['user_level'] != 3)
						    {echo "<th scope=\"row\"><a href=\"admin-work-history.php?empID={$row['empID']}\"class=\"text-warning\">{$row['empID']}</a></th>";} else {echo "<th scope=\"row\">{$row['empID']}</th>";}
						    echo "<td>{$row['first_name']}</td>";
						    echo "<td>{$row['last_name']}</td>";
						    echo "<td>{$row['empUN']}</td>";
						    echo "<td>{$row['registration_date']}</td>";
						    echo "<td>{$row['pay_rate']}</td>";
						    echo "<td ><a href=\"admin-remove-employee.php?action={$row['empUN']}\" class=\"text-warning\">Delete</a></td>";
						    echo "</tr>";
						}


					?>
					
				        <tr><td colspan="7" align="right"><button type="button" class="btn btn-warning" 
	onclick="location.href = 'admin-add-employee.php'">Add Employee</button></td></tr>
				    
				  </tbody>
				</table>

			


			</div>

			

			</div>
			<!-- Footer Area -->

			<footer class="text-center row"
			style="padding-bottom:15px; padding-top:15px;
			background:linear-gradient(#800000,black);">
	  			<?php include('footer.php'); ?>
			</footer>
			

			</div> 

		</body>

	</html>
