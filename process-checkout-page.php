<?php

session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 0))
{ header("Location: login.php");
  exit();
}

try
{
   require ('mysqli_connect.php');

   $fullName = $_POST['first_name'] . " " . $_POST['last_name'];
   $email = $_SESSION['email'];
   $order_cc = crypt($_POST['order_cc']);
   $order_address = $_POST['order_address'];
   $order_phone = $_POST['order_phone'];

   $_SESSION["address"] = $_POST["order_address"];
   $_SESSION["phone"] = $_POST["order_phone"];

   $sql01 = "INSERT INTO orders (order_date, order_name, email, order_cc, order_address, order_phone) ";
   $sql01 .= "VALUES( NOW(), '$fullName', '$email', '$order_cc', '$order_address', '$order_phone')";

   if ($dbcon->query($sql01) === TRUE)
   {

	$order_id = $dbcon->insert_id;
	$_SESSION["order_no"] = $order_id;
        foreach ($_SESSION["cart"] as $i)
        {
	   $qty = $_SESSION["qty"][$i];
           $sql02 = "INSERT INTO orders_items (order_id, product_id, quantity)";
           $sql02 .= "VALUES ('$order_id', '$i', '$qty')";
	   $dbcon->query($sql02);
	}

      


	header ("location: invoice.php");
   } else {
        $errorstring = "<p class='text-center col-sm-8' style='color:red'>";
	$errorstring .= "System Error<br />You could not be registered due ";
	$errorstring .= "to a system error. We apologize for any inconvenience.</p>"; 
	echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";

   }

}
catch(Exception $e) // We finally handle any problems here   
   {
     // print "An Exception occurred. Message: " . $e->getMessage();
     print "The system is busy please try later";
   }
   catch(Error $e)
   {
      //print "An Error occurred. Message: " . $e->getMessage();

   }
?>
