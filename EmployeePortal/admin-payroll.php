<?php                                                                       
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 3))
{ header("Location: index.php");
  exit();
}

require('mysqli_connect.php');

$sqlcommand01 = "SELECT * FROM timesheet";
$result01 = $dbcon->query($sqlcommand01);
$sqlcommand02 = "SELECT empID, first_name, last_name FROM employees";
$result02 = $dbcon->query($sqlcommand02);

// Create Name Array
$keys = array();
$values = array();
while($row = $result02->fetch_assoc())
{
	$name = $row['first_name'] . " " . $row['last_name'];
        $id = $row['empID'];
	array_push($keys, $id);
	array_push($values, $name);
}

$names = array_combine($keys, $values);




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
				<h2 class="text-center text-warning">Company Payroll</h2>
				
				<table class="table table-striped table-dark">
				  <thead>
				    <tr>
				      <th scope="col">Shift</th>
				      <th scope="col">EmpID</th>
				      <th scope="col">Name</th>
				      <th scope="col">Shift Date</th>
				      <th scope="col">Start Time</th>
				      <th scope="col">End Time</th>
				      <th scope="col">Hours Worked</th>
				      <th scope="col">Amount Earned</th>
				      <th scope="col">Approval</th>
				      
				    </tr>
				  </thead>
				  <tbody>
					<?php
						while($row = $result01->fetch_assoc())
						{
						    $id = (int) $row['empID'];
						    $name = $names["$id"];
							
						    echo "<tr>";
						    echo "<th scope=\"row\">{$row['shiftNum']}</th>";
						    echo "<td>{$row['empID']}</td>";
						    echo "<td>{$name}</td>";
						    echo "<td>{$row['shift_date']}</td>";
						    echo "<td>{$row['start_time']}</td>";
						    echo "<td>{$row['end_time']}</td>";
						    echo "<td>{$row['num_hours']}</td>";
						    echo "<td>{$row['amount']}</td>";
						    
					      	    //add approval link
						    if ($row['approval'] == "Needs Approval")
						    {
							echo "<td><a href=\"admin-approval-process.php?action={$row['shiftNum']}&back=admin-payroll.php\">{$row['approval']}</a></td>";
						    } else { 
							echo "<td class=\"text-warning\">{$row['approval']}</td>";			
						    }

						    echo "</tr>";
						}


					?>
					
				        
				    
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
