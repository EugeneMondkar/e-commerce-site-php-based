<?php                                                                       
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


  $sql_command = "SELECT product_id, product_name, product_price FROM products";
  $db_result = $dbcon->query($sql_command);
  
  if ($db_result->num_rows > 0)
  {
    while ($row = $db_result->fetch_assoc())
    {  
      array_push($product_id_arr, $row["product_id"]);
      array_push($product_name_arr, $row["product_name"]);
      array_push($product_price_arr, $row["product_price"]);
    }

  } 

  $prod_id_name_arr = array_combine($product_id_arr, $product_name_arr);
  $prod_id_price_arr = array_combine($product_id_arr, $product_price_arr);
 
  //Delete
   if ( isset($_GET["delete"]) )
   {
     $i = $_GET["delete"];
     $qty = $_SESSION["qty"][$i];
     $qty--;
     $_SESSION["qty"][$i] = $qty;
     //remove item if quantity is zero
     if ($qty == 0) {
       $_SESSION["amounts"][$i] = 0;
       unset($_SESSION["cart"][$i]);
     }
     else
     {
      $_SESSION["amounts"][$i] = $prod_id_price_arr[$i] * $qty;
     }
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



// Set currency at USD
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
			<h2 class="text-center">Here's whats in your Shopping Cart, <?php print($_SESSION['first_name']) ?></h2>
			
			<?php
			
			if ( isset($_SESSION["cart"]) ) {	

			?>
			 <table class="table table-dark">
			 <thead>
			 <tr>
			 <th>Product</th>
			 <th width="10px">&nbsp;</th>
			 <th>Qty</th>
			 <th width="10px">&nbsp;</th>
			 <th class="text-right">Amount</th>
			 <th width="10px">&nbsp;</th>
			 <th>Action</th>
			 </tr>
                         </thead>
			 <?php
			 $total = 0;
			 foreach ( $_SESSION["cart"] as $i ) {
			 ?>
			 <tr>
			 <td><?php echo( $prod_id_name_arr[$i] ); ?></td>
			 <td width="10px">&nbsp;</td>
			 <td><?php echo( $_SESSION["qty"][$i] ); ?></td>
			 <td width="10px">&nbsp;</td>
			 <td class="text-right"><?php echo( money_format('%(#10n', $_SESSION["amounts"][$i] )); ?></td>
			 <td width="10px">&nbsp;</td>
			 <td><a href="?delete=<?php echo($i); ?>" class="text-warning">Delete from cart</a></td>
			 </tr>
			 <?php
			 $total = $total + $_SESSION["amounts"][$i];
			 }
			 $_SESSION["total"] = $total;
			 ?>
			 <tr>
			 <td></td>
			 <td width="10px"></td>
			 <td></td>
			 <td width="10px">Total</td>
			 <td class="text-right"><?php echo( money_format('%(#10n', $_SESSION["total"]))?></td>
			 <td width="10px"></td>
			 <td></td>
			 
                        
			 </tr>

			<tr>
			 <td><a href="?reset=true"><button type="button" class="btn btn-warning center-block">Reset Cart</button></a></td>
			 <td width="10px"></td>
			 <td></td>
			 <td width="10px"></td>
			 <td ></td>
			 <td width="10px"></td>
			 <td>
			 <button type="button" class="btn btn-warning" onclick="location.href = 'checkout.php'" >Checkout</button>
			  </td>
			 
                        
			 </tr>

			 </table>
			 
			  
			 
			 <?php
			 } else {
				echo "<h3 class=\"text-center text-warning\"> Your cart is empty </h3>";

			 }


			   /* Test Commands
			   print_r($_SESSION);echo "<br />"; 
			   print($_SESSION["userid"]);echo "<br />";
			   print($_SESSION["first_name"]);echo "<br />";
			   print($_SESSION["user_level"]);echo "<br />";
			   print_r($_SESSION["cart"]);echo "<br />";
			   print_r($_SESSION["qty"]);echo "<br />";
			   echo "<a href=\"index.php\">Home</a>";
			   
			   unset($_SESSION["qty"]); //The quantity for each product
			   unset($_SESSION["amounts"]); //The amount from each product
			   unset($_SESSION["total"]); //The total cost
			   unset($_SESSION["cart"]); //Which item has been chosen
			   */
			   
			 ?>



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
