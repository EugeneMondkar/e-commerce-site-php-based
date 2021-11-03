<?php                                                                       
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 2))
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
			<?php include('worker-nav.php'); ?> 
      			
  		</nav>
		
			

			<!-- Center Column Content Area -->

			<div class="text-white col-sm-10" 
			style="background:linear-gradient(#800000,#800000);">
				<h2 class="text-center text-warning">Timecard Submission</h2>
				
				<form action="worker-timecard-process.php" method="post">
					<div class="form-row">
						    <div class="form-group col-sm-12">
						      <label for="shift_date">Shift Date:</label>
						      <input type="date" class="form-control col-sm-2" id="shift_date" name="shift_date">
						    </div> 
					  </div>

					 <div class="form-row">
						    <div class="form-group col-sm-6">
						      <label for="start_hour">Starting Hour:</label>
						      <input type="number" class="form-control col-sm-3" id="start_hour" name="start_hour" min=0 max=12>
						    </div> 
							<div class="form-group col-sm-6">
						      <label for="start_min">Starting Minutes:</label>
						      <input type="number" class="form-control col-sm-3" id="start_min" name="start_min" min=0 max=59 step=15>
						    </div> 
					  </div>

					<div class="form-row">
						    <div class="form-group col-sm-6">
						      <label for="end_hour">Ending Hour:</label>
						      <input type="number" class="form-control col-sm-3" id="end_hour" name="end_hour" min=0 max=12>
						    </div> 
							<div class="form-group col-sm-6">
						      <label for="end_min">Ending Minutes:</label>
						      <input type="number" class="form-control col-sm-3" id="end_min" name="end_min" min=0 max=59 step=15>
						    </div> 
					  </div>


					<div class="form-row">
						<button type="submit" class="btn btn-warning">Submit Timecard</button>

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
