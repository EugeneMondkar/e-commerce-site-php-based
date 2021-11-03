<?php                                                                       
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 1))
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

  $order_id = $_GET["order_id"];

  $sql_command = "SELECT order_id, product_id, quantity FROM orders_items WHERE order_id='{$order_id}'";
  $db_result = $dbcon->query($sql_command);

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
			<?php include('header-admin.php'); ?>
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
			<h2 class="text-center">Here are the items in order number <?php echo "$order_id" ?></h2>
			
			<table class="table table-dark">
			 <thead>
			 <tr>
			 <th>Product</th>
			 <th width="10px">&nbsp;</th>
			 <th>Qty</th>
			 <th width="10px">&nbsp;</th>
			 <th class="text-right">Amount</th>
			 <th width="10px">&nbsp;</th>
			 
			 </tr>
                         </thead>
			 <?php
			 $total = 0;
			
			 while ($row = $db_result->fetch_assoc()) {
				
			 $amount = $row["quantity"] * $prod_id_price_arr[$row["product_id"]];

			 ?>
			 <tr>
			 <td><?php echo( $prod_id_name_arr[$row["product_id"]] ); ?></td>
			 <td width="10px">&nbsp;</td>
			 <td><?php echo( $row["quantity"] ); ?></td>
			 <td width="10px">&nbsp;</td>
			 <td class="text-right"><?php echo( money_format('%(#10n', $amount )); ?></td>
			 <td width="10px">&nbsp;</td>
			 
			 </tr>
			 <?php
			 $total = $total + $amount;
			 }
			 
			 ?>
			 <tr>
			 <td></td>
			 <td width="10px"></td>
			 <td></td>
			 <td width="10px">Total</td>
			 <td class="text-right"><?php echo( money_format('%(#10n', $total))?></td>
			 <td width="10px"></td>
			 <td></td>
			 
                        
			 </tr>

			

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




