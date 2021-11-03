<?php                                                                       
session_start();
if (!isset($_SESSION['user_level']) or ( ($_SESSION['user_level'] != 2) and ($_SESSION['user_level'] != 3) ) )
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
		<!-- Javascript Based Input Validation -->
		<script src="verify.js"></script>
		

	</head>

	<body>
			<div class="container" style="margin-top:30px">
			
			<!-- Banner/Header Area -->

			<header class="text-center row"
			style="margin-bottom:0px; background:linear-gradient(black, #800000); 
			padding:20px;">
				<!-- Import Banner -->
				<?php include('worker-header.php'); ?>
			</header>

			<!-- Body -->

			<div class="row" style="padding-left: 0px;">
			
			<!-- Navigation Menu -->
			<nav class="col-sm-2" style="background:linear-gradient(#800000, #800000);
		padding:30px;">
			<!-- Import Menu -->
			<?php 

			     if ($_SESSION['user_level'] == 2)
			     {
				include('worker-nav.php'); 
			     } else {

				include('admin-nav.php');
			     }



			?> 
      			
  		</nav>
			
			<!-- Input Validation -->
		
			<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			 require('new-password-process.php');
			} 
			?>
			

			<!-- Center Column Content Area -->

			<div class="text-white col-sm-10" 
			style="background:linear-gradient(#800000,#800000);">
				<h2 class="text-center text-warning">Change Your Password</h2>
				


				<form action="new-password-page.php" method="post" onsubmit="return checked();">
		  				
						<div class="form-group row">
			    				<label for="password" class="col-sm-2 col-form-label text-right"><h6>Old Password:</h6></label>
				    			<div class="col-sm-8">
				      				<input type="password" class="form-control" id="password" name="password" 
					  			placeholder="Enter Current Password" maxlength="40" required>
					  			
				    			</div>
	  					</div>

						<div class="form-group row">
			    				<label for="password" class="col-sm-2 col-form-label text-right"><h6>New Password:</h6></label>
				    			<div class="col-sm-8">
				      				<input type="password" class="form-control" id="password1" name="password1" 
					  			placeholder="Enter New Password" maxlength="40" required>
					  			<span>&nbsp;Between 8 and 12 characters.</span></p>
				    			</div>
	  					</div>
		  				<div class="form-group row">
			    				<label for="password" class="col-sm-2 col-form-label text-right"><h6>Verify Password:</h6></label>
				    			<div class="col-sm-8">
				      				<input type="password" class="form-control" id="password2" name="password2" 
					  			placeholder="Confirm New Password" maxlength="40" required>
					  			
				    			</div>
	  					</div>
						<div class="form-group row">
							<div class="col-sm-12 text-center">
								<input id="submit" class="btn btn-warning" type="submit" name="submit" value="Change Password">
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
