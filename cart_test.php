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
  
 
 if ( isset($_SESSION["cart"]) ) {
 ?>
 <br/><br/><br/>
 <h2>Cart</h2>
 <table>
 <tr>
 <th>Product</th>
 <th width="10px">&nbsp;</th>
 <th>Qty</th>
 <th width="10px">&nbsp;</th>
 <th>Amount</th>
 <th width="10px">&nbsp;</th>
 <th>Action</th>
 </tr>
 <?php
 $total = 0;
 foreach ( $_SESSION["cart"] as $i ) {
 ?>
 <tr>
 <td><?php echo( $prod_id_name_arr[$i] ); ?></td>
 <td width="10px">&nbsp;</td>
 <td><?php echo( $_SESSION["qty"][$i] ); ?></td>
 <td width="10px">&nbsp;</td>
 <td><?php echo( $_SESSION["amounts"][$i] ); ?></td>
 <td width="10px">&nbsp;</td>
 <td><a href="?delete=<?php echo($i); ?>">Delete from cart</a></td>
 </tr>
 <?php
 $total = $total + $_SESSION["amounts"][$i];
 }
 $_SESSION["total"] = $total;
 ?>
 <tr>
 <td colspan="7">Total : <?php echo($total); ?></td>
 </tr>
 </table>
 
 <?php
 }
   print_r($_SESSION["cart"]);echo "<br />";
   print_r($_SESSION["qty"]);echo "<br />";
   echo "<a href=\"index.php\">Home</a>";
   /*
   unset($_SESSION["qty"]); //The quantity for each product
   unset($_SESSION["amounts"]); //The amount from each product
   unset($_SESSION["total"]); //The total cost
   unset($_SESSION["cart"]); //Which item has been chosen
   */
   
 ?>


