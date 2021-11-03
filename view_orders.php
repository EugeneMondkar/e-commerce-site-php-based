<?php                                                                       
	session_start();
	if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 0))
	{ header("Location: login.php");
	  exit();
	}


	require("mysqli_connect.php");

	$email = $_SESSION["email"];

	$sql_command = "SELECT order_id, order_date, order_name, order_address, order_phone FROM orders WHERE email='{$email}'";
	$db_result = $dbcon->query($sql_command);


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
			<?php include('header-members.php'); ?>
		</header>

		<!-- Body -->

		<div class="row" style="padding-left: 0px;">
	
		<!-- Left Column Menu Area -->

		<nav class="col-sm-2" style="background:linear-gradient(#800000, #800000);
		padding:30px;">
			<!-- Import Menu -->
			<?php include('nav.php'); ?> 
      			
  		</nav>

		<!-- Center Column Content Area -->

		<div class="text-white col-sm-10" 
		style="background:linear-gradient(#800000,#800000);">
			<h2 class="text-center">Your Orders</h2>
			<?php if ($db_result->num_rows >= 1)
						{
			?>
			<table class="table table-striped table-dark">
			 <thead>
				 <tr>
					 <th>Order Number</th>
					 <th>Name</th>
					 <th>Address</th>
					 <th>Phone</th>
					 <th>Date & Time Created</th>
				 </tr>
                         </thead>
					<?php
						
							while ($row = $db_result->fetch_assoc())
							{
									
								echo "<tr>";
								echo "<td align=\"center\"><a href=\"order_summary.php?order_id={$row['order_id']}\" class=\"text-warning\">{$row['order_id']}</a></td>";
								echo "<td>{$row['order_name']}</td>";
								echo "<td>{$row['order_address']}</td>";
								echo "<td>{$row['order_phone']}</td>";
								echo "<td>{$row['order_date']}</td>";
								echo "</tr>";
							}
						
						


					?>








		        </table>
			<?php } else { echo "<h3 class=\"text-center text-warning\" align=\"center\">You currently don't have any orders.</h3>"; } ?>
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
