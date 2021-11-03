<?php                                                                       
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 3))
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
		<script src="verify.js"></script>
		

	</head>

	<body>
			<div class="container" style="margin-top:30px">
			
			<!-- Banner/Header Area -->

			<header class="text-center row"
			style="margin-bottom:0px; background:linear-gradient(black, #800000); 
			padding:20px;">
				<!-- Import Banner -->
				<?php include('admin-header.php'); ?>
			</header>

			<!-- Body -->

			<div class="row" style="padding-left: 0px;">

			<!-- Navigation Menu -->
			<nav class="col-sm-2" style="background:linear-gradient(#800000, #800000);
		padding:30px;">
			<!-- Import Menu -->
			<?php include('admin-nav.php'); ?> 
      			
  		</nav>
			
			

			<!-- Center Column Content Area -->

			<div class="text-white col-sm-10" 
			style="background:linear-gradient(#800000,#800000);">
				<h2 class="text-center text-warning">Add Employee</h2>
				<form action="admin-add-employee-process.php" method="post" onsubmit="return checked();">
				  <div class="form-group row">
				    <label for="first_name" class="col-sm-2 col-form-label">First Name:</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="first_name" name="first_name" 
					  placeholder="Enter First Name" maxlength="30" required>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="last_name" class="col-sm-2 col-form-label">Last Name:</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="last_name" name="last_name" 
					  placeholder="Enter Last Name" maxlength="40" required>
				    </div>
				  </div>
				<div class="form-group row">
				    <label for="pay_rate" class="col-sm-2 col-form-label">Pay Rate:</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="pay_rate" name="pay_rate" 
					  placeholder="Enter Pay Rate" maxlength="40" required>
				    </div>
				  </div>

				<div class="form-group row">
				    <label class="col-sm-2 col-form-label">User Level:</label>
				    <div class="col-sm-8">
				       	<select name="user_level">
					    	<option value="2">Worker</option>
					    	<option value="3">Admin</option>
					    		
					</select>
				    </div>
				  </div>

				<div class="form-group row">
				    <label for="empUN" class="col-sm-2 col-form-label">User Name:</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="empUN" name="empUN" 
					  placeholder="Enter User Name" maxlength="60" required>
				    </div>
				  </div>
				<div class="form-group row">
				    <label for="password1" class="col-sm-2 col-form-label">Password:</label>
				    <div class="col-sm-8">
				      <input type="password" class="form-control" id="password1" name="password1" 
					  placeholder="Password" minlength="8" maxlength="12" required>
					  <span id='message'>Between 8 and 12 characters.</span>
				    </div>
				  </div>
				<div class="form-group row">
				    <label for="password2" class="col-sm-2 col-form-label">Confirm Password:</label>
				    <div class="col-sm-8">
				      <input type="password" class="form-control" id="password2" name="password2" 
					  placeholder="Confirm Password" minlength="8" maxlength="12" required>
				    </div>
				  </div>
				<div class="form-group row">
				    <div class="col-sm-12 text-center">
					<input id="submit" class="btn btn-warning" type="submit" name="submit" value="Add Employee">
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
