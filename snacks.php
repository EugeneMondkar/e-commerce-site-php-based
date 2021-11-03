<!-- Establish Connection -->
<?php
  require("mysqli_connect.php");
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
			<?php include('header.php'); ?>
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
			<h2 class="text-center">Snacks</h2>




			<div id="products" class="container"><div class="row"><?php
		    /* [GRAB ALL THE PRODUCTS] */
		    // 3 PRODUCTS IN A ROW
		    $perrow = 3; $now = 0;
		    $sql = "SELECT * FROM products WHERE product_category='snack'";
		    $result = $dbcon->query($sql);

		    while ($row = $result->fetch_assoc()){ ?>
		      <div class="col-4">
			<img src="products/images/<?=$row['product_image']?>"/>
			<h3><?=$row['product_name']?></h3>
			<div>$<?=$row['product_price']?></div>
			<div><?=$row['product_description']?></div>
			<!--<div class="btn btn-success" onclick="addToCart(<?=$row['product_id']?>);">Add to cart</div>-->
		      </div>
		      <?php
		      // ROW BREAK
		      $now++;
		      if ($now==3) {
			echo '</div><div class="row">';
			$now = 0;
		      }
		  } ?></div></div>




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
