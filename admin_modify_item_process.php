<?php                                                                                     
	session_start();
	if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 1))
	{ header("Location: login.php");
	exit();
	}

	require("mysqli_connect.php");

	$product_id = $_SESSION["productID"];
	$product_name = $_POST["product_name"];
	$product_image = $_FILES["image"]["name"];
	$product_description = $_POST["product_description"];
	$product_price = $_POST["product_price"];
	$product_category = $_POST["product_category"];

	/*
	print($product_name); echo "<br />";
	print($product_description); echo "<br />";
	print($product_price); echo "<br />";
	*/


	    
	    if(isset($_FILES['image'])){
	      $errors= array();
	      $file_name = $_FILES['image']['name'];
	      $file_size = $_FILES['image']['size'];
	      $file_tmp = $_FILES['image']['tmp_name'];
	      $file_type = $_FILES['image']['type'];
	      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
	      
	      $expensions= array("jpeg","jpg","png");
	      
	      if(in_array($file_ext,$expensions)=== false){
		 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
	      }
	      
	      if($file_size > 2097152) {
		 $errors[]='File size must be excately 2 MB';
	      }
	      
	      if(empty($errors)==true) {
		 move_uploaded_file($file_tmp,'products/images/'.$file_name);
		 echo "Success";
	      }else{
		 print_r($errors);
	      }
	   }




	$sql_command = "UPDATE products SET product_name='{$product_name}', product_image='{$product_image}', product_description='{$product_description}', product_price='{$product_price}', product_category='{$product_category}' WHERE product_id={$product_id}";
	
	$dbcon->query($sql_command);
	
	if ( ($product_category != 'cheese') && ($product_category != 'specialty') )
	{
		$back = "admin-".$product_category."s.php";
	} else
	{
		$back = "admin-".$product_category.".php";
	}	

	header ("location: {$back}");
?>
