<!-- Establish Connection -->
<?php
  // Start Session and user level check
  session_start();
  if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 0))
  { header("Location: login.php");
  exit();
  }

  require("mysqli_connect.php");

  // arrays needed
  $product_id_arr = array();
  $product_name_arr = array();
  $product_price_arr = array();

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
			<h2 class="text-center">Meats</h2>




			
		<?php

		    
		    // 3 PRODUCTS IN A ROW
		    $now = 0;
		    $sql = "SELECT * FROM products WHERE product_category='meat'";
		    $db_result01 = $dbcon->query($sql);
		    $db_result02 = $dbcon->query($sql);
		    

		    if ($db_result01->num_rows > 0)
		    {
		      while ($row = $db_result01->fetch_assoc())
		      { 
 			array_push($product_id_arr, $row["product_id"]);
		        array_push($product_name_arr, $row["product_name"]);
		        array_push($product_price_arr, $row["product_price"]);
		      }

		    }

		    		    
		    $prod_id_name_arr = array_combine($product_id_arr, $product_name_arr);
  		    $prod_id_price_arr = array_combine($product_id_arr, $product_price_arr);
		    

		      // Load up session
		  if ( !isset($_SESSION["total"]) ) {
		    $_SESSION["total"] = 0;
		    for ($i=0; $i< 2; $i++) {
		     $_SESSION["qty"][$i] = 0;
		    $_SESSION["amounts"][$i] = 0;
		   }
		  }
		  
		  // Add
		  if ( isset($_GET["add"]) )
		  {
		   $key = $_GET["add"];
		   $qty = $_SESSION["qty"][$key] + 1;
		   $amount = $prod_id_price_arr[$key];
		   $_SESSION["amounts"][$key] = $amount * $qty;
		   $_SESSION["cart"][$key] = $key;
		   $_SESSION["qty"][$key] = $qty;
		  }

		  // Reset
		  if ( isset($_GET['reset']) )
		  {
		    if ($_GET["reset"] == 'true')
		    {
		      unset($_SESSION["qty"]); //The quantity for each product
		      unset($_SESSION["amounts"]); //The amount from each product
		      unset($_SESSION["total"]); //The total cost
		      unset($_SESSION["cart"]); //Which item has been chosen
		    }
		  }
		
		   echo "<div id=\"products\" class=\"container\"><div class=\"row\">";
		   if ($db_result02->num_rows > 0)
		    {
		      while ($row = $db_result02->fetch_assoc())
		      {  
			  echo "<div class=\"col-4\">";
				echo "<img src=\"products/images/{$row["product_image"]}\"/>";
				echo "<h3>{$row["product_name"]}</h3>";
				echo "<div>\${$row["product_price"]}</div>";
				echo "<div>{$row["product_description"]}</div>";
				echo "<a href=\"?add={$row["product_id"]}\"><div class=\"btn btn-warning center-block\">Add to cart</div></a>";
			  echo "</div>";

			  // ROW BREAK
			  $now++;
			  if ($now==3) {
			    echo '</div><div class="row">';
			    $now = 0;
			  }

		      }

		    }
		    echo "</div>";
		    
		      
		      
		   

		?>


		</div>

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


