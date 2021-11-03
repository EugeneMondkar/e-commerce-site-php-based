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
		<script src="verify.js"></script>

	</head>

	<body>
		<div class="container" style="margin-top:30px">
		
		<!-- Banner/Header Area -->

		<header class="text-center row"
		style="margin-bottom:0px; background:linear-gradient(black, #800000); 
		padding:20px;">
			<!-- Import Banner -->
			<?php include('login-header.php'); ?>
		</header>

		<!-- Body -->

		<div class="row" style="padding-left: 0px;">
	
		<!-- Left Column Menu Area -->

		<nav class="col-sm-2" style="background:linear-gradient(#800000, #800000);
		padding:30px;">
			<!-- Import Menu -->
			<?php include('nav.php'); ?> 
      			
  		</nav>
		<!-- Input Validation -->
		
		<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		 require('process-login.php');
		} 
		?>		

		<!-- Center Column Content Area -->

		<div class="text-white col-sm-10" 
		style="background:linear-gradient(#800000,#800000);">
			<h2 class="text-center">Membership Login Page</h2>
			<form action="login.php" method="post" name="loginform" id="loginform">
  				<div class="form-group row">
    				<label for="email" class="col-sm-2 col-form-label">Email Address:</label>
    					<div class="col-sm-8">
      					<input type="text" class="form-control" id="email" name="email" 
	  				placeholder="Email" maxlength="30" required
	  				value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" >
    					</div>
  				</div>
  			<div class="form-group row">
    				<label for="password" class="col-sm-2 col-form-label">Password:</label>
	    			<div class="col-sm-8">
	      				<input type="password" class="form-control" id="password" name="password" 
		  			placeholder="Password" maxlength="40" required
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
