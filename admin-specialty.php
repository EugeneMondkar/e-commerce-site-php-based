<!--Ensures Admin Access Only-->
<?php                                                                                     
	session_start();
	if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 1))
	{ header("Location: login.php");
	exit();
	}

	require("mysqli_connect.php");


	$sql_command = "SELECT product_id, product_name, product_image, product_description, product_price FROM products WHERE product_category='specialty'";
	$db_result = $dbcon->query($sql_command);


	setlocale(LC_MONETARY, 'en_US');












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
			<?php include('header-admin.php'); ?>
		</header>

		<!-- Body -->

		<div class="row" style="padding-left: 0px;">
	
		<!-- Left Column Menu Area -->

		<nav class="col-sm-2" style="background:linear-gradient(#800000, #800000);
		padding:30px;">
			<!-- Import Menu -->
			<?php include('admin-product-nav.php'); ?> 
      			
  		</nav>

		<!-- Center Column Content Area -->

		<div class="text-white col-sm-10" 
		style="background:linear-gradient(#800000,#800000);">
			<h2 class="text-center">Specialty Items</h2>
			
			<table class="table table-dark table-striped">
			 <thead>
			 <tr>
				 <th>PID</th>
				 <th>Name</th>
				 <th>Image</th>
				 <th>Description</th>
				 <th>Price</th>
				 <th>Action</th>
			 
			 </tr>
                         </thead>
			 <?php
			 $total = 0;
			
			 while ($row = $db_result->fetch_assoc()) {
				
			 

			 ?>
			 <tr>
			 <td><?php echo($row["product_id"]); ?></td>
			 <td><?php echo($row["product_name"]); ?></td>
			 <td width="45px"><?php echo($row["product_image"]); ?></td>
			 <td width="200px"><?php echo($row["product_description"]); ?></td>
			 <td width="40px"><?php echo($row["product_price"] ); ?></td>
			 <td><a href="admin_modify_item.php?action=<?php echo($row["product_id"]); ?>&back=admin-snacks.php" class="text-warning">Modify</a> / <a href="admin_delete_item.php?action=<?php echo($row["product_id"]); ?>&back=admin-specialty.php" class="text-warning">Delete</a></td>
			 
			 </tr>
			 <?php
			 
			 }
			 
			 ?>
			 

			

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
