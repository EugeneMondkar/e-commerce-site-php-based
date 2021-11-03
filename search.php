<?php											
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 1))
{
header("Location: login.php");
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
			<h2 class="text-center">Search for Registered Users</h2>
			<h6 class="text-center">Both names are required items</h6>
<form action="view_found_record.php" method="post" >
  <div class="form-group row">
    <label for="first_name" class="col-sm-2 col-form-label">First Name:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="first_name" name="first_name" 
	  placeholder="First Name" maxlength="30" required
	  value=
			"<?php if (isset($_POST['first_name'])) 
				echo htmlspecialchars($_POST['first_name'], ENT_QUOTES); ?>" >
    </div>
  </div>
  <div class="form-group row">
    <label for="last_name" class="col-sm-2 col-form-label">Last Name:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="last_name" name="last_name" 
	  placeholder="Last Name" maxlength="40" required
	  value=
			"<?php if (isset($_POST['last_name'])) 
				echo htmlspecialchars($_POST['last_name'], ENT_QUOTES); ?>">
    </div>
  </div>
<div class="form-group row">
    <label for="" class="col-sm-4 col-form-label"></label>
    <div class="col-sm-12 text-center">
	<input id="submit" class="btn btn-warning" type="submit" 
		name="submit" value="Search">
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
