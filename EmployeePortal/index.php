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
				<?php include('header.php'); ?>
			</header>

			<!-- Body -->

			<div class="row" style="padding-left: 0px;">

			<div class="text-white col-sm-1" 
			style="background:linear-gradient(#800000,#800000);"></div>
		
			<!-- Input Validation -->
		
			<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			 require('process-login.php');
			} 
			?>

			<!-- Center Column Content Area -->

			<div class="text-white col-sm-10" 
			style="background:linear-gradient(#800000,#800000);">
				<h2 class="text-center text-warning">Employee Login</h2>
					<form action="index.php" method="post" name="loginform" id="loginform">
		  				<div class="form-group row">
		    					<label for="empUN" class="col-sm-2 col-form-label text-right"><h5>User Name:</h5></label>
		    					<div class="col-sm-8">
			      					<input type="text" class="form-control" id="empUN" name="empUN" 
				  				placeholder="Enter User Name" maxlength="30" required
				  				value="<?php if (isset($_POST['empUN'])) echo $_POST['empUN']; ?>" >
		    					</div>
		  				</div>
		  				<div class="form-group row">
			    				<label for="password" class="col-sm-2 col-form-label text-right"><h5>Password:</h5></label>
				    			<div class="col-sm-8">
				      				<input type="password" class="form-control" id="password" name="password" 
					  			placeholder="Enter Password" maxlength="40" required
					  			value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>">
					  			<span>&nbsp;Between 8 and 12 characters.</span></p>
				    			</div>
	  					</div>
						<div class="form-group row">
							<div class="col-sm-12 text-center">
								<input id="submit" class="btn btn-warning" type="submit" name="submit" value="Login">
							</div>
						</div>
					</form>






			</div>

			<div class="text-white col-sm-1" 
			style="background:linear-gradient(#800000,#800000);"></div>

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
