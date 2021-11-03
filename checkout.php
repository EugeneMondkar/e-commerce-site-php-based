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



// Set currency at USD
setlocale(LC_MONETARY, 'en_US');


?>


<html>
	<head>
	
		<title>Gallo and Sons Gourmet Foods, Importer of Fine Foods and Kitchen Tools</title>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  		<!-- Bootstrap CSS Import -->
  		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="verify.js"></script>
	</head>

	<body>
		<div class="container" style="margin-top:30px">
		
		<!-- Banner/Header Area -->

		<header class="text-center row"
		style="margin-bottom:0px; background:linear-gradient(black, #800000); 
		padding:20px;">
			<!-- Import Banner -->
			<?php include('checkout-header.php'); ?>
		</header>

		<!-- Body -->

		<div class="row" style="padding-left: 0px;">
	
		
		<!-- Input Validation -->
		<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		 require('process-checkout-page.php');
		} // End of the main Submit conditional.
		?>

		<!-- Center Column Content Area -->

		<div class="text-white col-sm-12" 
		style="background:linear-gradient(#800000,#800000);">
			<h2 class="text-center">Checkout</h2>
			
			<?php
			
			if ( isset($_SESSION["cart"]) ) {	

			?>
			 <table class="table table-striped table-dark">
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
			 </table>
			 
			 <?php
			 } else {
				echo "<h3 class=\"text-center text-warning\"> Your cart is empty </h3>";

			 } ?>
			
			<form action="checkout.php" method="post" onsubmit="return checked();"
			name="regform" id="regform">
			  <div class="form-group row">
			    <label for="first_name" class="col-sm-2 col-form-label">First Name:</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" id="first_name" name="first_name" 
				  placeholder="First Name" maxlength="30" required
				  value="<?php if (isset($_SESSION['first_name'])) echo $_SESSION['first_name']; ?>" >
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="last_name" class="col-sm-2 col-form-label">Last Name:</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" id="last_name" name="last_name" 
				  placeholder="Last Name" maxlength="40" required
				  value="<?php if (isset($_SESSION['last_name'])) echo $_SESSION['last_name']; ?>">
			    </div>
			  </div>
			<div class="form-group row">
			    <label for="email" class="col-sm-2 col-form-label">E-mail:</label>
			    <div class="col-sm-8">
			      <?php if (isset($_SESSION['email'])) echo $_SESSION['email']; ?>
			    </div>
			  </div>
			<div class="form-group row">
			    <label for="order_cc" class="col-sm-2 col-form-label">Credit Card Number:</label>

				<div class="dropdown col-sm-2">
				   <select>
					  <option value="VISA">VISA</option>
					  <option value="MasterCard">MasterCard</option>
					  <option value="American Express">American Express</option>
					  <option value="Paypal">Paypal</option>
					</select> 
				</div>
			

			    <div class="col-sm-6">
			      <input type="text" class="form-control" id="order_cc" name="order_cc" 
				  placeholder="Enter Credit Card Number" minlength="8" maxlength="25" required
				  value="">
			    </div>
			</div>
			<div class="form-group row">
			    <label for="order_address" class="col-sm-2 col-form-label">Delivery Address:</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" id="order_address" name="order_address" 
				  placeholder="Enter Delivery Address" minlength="8" maxlength="200" required
				  value="">
			    </div>
			</div>

			<div class="form-group row">
			    <label for="order_phone" class="col-sm-2 col-form-label">Phone Number:</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" id="order_phone" name="order_phone" 
				  placeholder="Enter Phone Number" minlength="8" maxlength="200" required
				  value="">
			    </div>
			</div>

			<div class="form-group row">
			    <div class="col-sm-12 text-center">
				<input id="submit" class="btn btn-warning" type="submit" name="submit" value="Place Order">
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
