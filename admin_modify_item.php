<!--Ensures Admin Access Only-->
<?php                                                                                     
	session_start();
	if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 1))
	{ header("Location: login.php");
	exit();
	}

	require("mysqli_connect.php");

	$product_id = $_GET["action"];
	$_SESSION["productID"] = $product_id;

	$sql_command = "SELECT product_name, product_image, product_description, product_price, product_category FROM products WHERE product_id={$product_id}";
	$db_result = $dbcon->query($sql_command);

	$row = $db_result->fetch_assoc();


	
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
			<h2 class="text-center">Modify Product</h2>


			<form action="admin_modify_item_process.php" method="post" enctype="multipart/form-data">

			<div class="form-group row">
			    <label class="col-sm-2 col-form-label">Product ID:</label>
			    <div class="col-sm-8">
			      <?php echo "$product_id"; ?>
			    </div>
			  </div>

			  <div class="form-group row">
			    <label class="col-sm-2 col-form-label">Product Name:</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" name="product_name" placeholder="<?php echo($row["product_name"]); ?>" value="<?php echo($row["product_name"]); ?>">
			    </div>
			  </div>

			  <div class="form-group row">
			    <label class="col-sm-2 col-form-label">Product Image:</label>
			    <div class="col-sm-8">
			      
				
				    <input type="file" name="image" id="image">
				

			    </div>
			  </div>
			<div class="form-group row">
			    <label class="col-sm-2 col-form-label">Product Description:</label>
			    <div class="col-sm-8">
			      <textarea class="form-control" name="product_description" rows="3"><?php echo($row["product_description"]); ?></textarea>
			    </div>
			  </div>
			<div class="form-group row">
			    <label class="col-sm-2 col-form-label">Product Price:</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" name="product_price" placeholder="<?php echo($row["product_price"]); ?>" value="<?php echo($row["product_price"]); ?>">
			    </div>
			  </div>
			<div class="form-group row">
			    <label class="col-sm-2 col-form-label">Product Category:</label>
			    <div class="col-sm-8">
			       	<select name="product_category">
				    	<option value="specialty">Specialty</option>
				    	<option value="cheese">Cheese</option>
				    	<option value="meat">Meat</option>
					<option value="snack">Snack</option>
					<option value="tool">Tool</option>	
				</select>
			    </div>
			  </div>
			<div class="form-group row">
			    <div class="col-sm-12 text-center">
				<input id="submit" class="btn btn-warning" type="submit" name="submit" value="Modify Product">
			    </div>
				</div>
			</form>





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
