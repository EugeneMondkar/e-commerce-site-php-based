<?php                                                                       
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 3) )
{ header("Location: index.php");
  exit();
}



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
		<div class="container" style="margin-top:30px; background:linear-gradient(#800000,#800000);">
			
			<!-- Banner/Header Area -->

			<header class="text-center row"
			style="margin-bottom:0px; background:linear-gradient(black, #800000); 
			padding:20px;">
				<!-- Import Banner -->
				<?php include('forum-header.php'); ?>
			</header>

			<!-- Body -->
			<div class="row">
			<div class="col-3"></div>
			<div class="text-white col-6" 
			style="background:linear-gradient(#800000,#800000);">

			<form action="forum-add-category-process.php" method="post">
			  <div class="form-group">
			    <label for="cat_name">Category Name:</label>
			    <input type="text" class="form-control" id="cat_name" name="cat_name" aria-describedby="catName" placeholder="Enter Category Name">
			    
			  </div>
			  <div class="form-group">
			    <label for="cat_decription">Category Description:</label>
			    <input type="text" class="form-control" id="cat_description" name="cat_description" placeholder="Enter Category Description">
			  </div>
			  
			  <button type="submit" class="btn btn-warning">Submit</button>
			  <button type="reset" class="btn btn-warning">Reset</button>
			</form>

			</div>
			<div class="col-3"></div>
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
