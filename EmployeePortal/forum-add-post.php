<?php                                                                       
session_start();
if (!isset($_SESSION['user_level']) or ( ($_SESSION['user_level'] != 2) and ($_SESSION['user_level'] != 3) ) )
{ header("Location: index.php");
  exit();
}

$_SESSION['topic_id'] = $_GET['topic_id'];
$_SESSION['topic_subject'] = $_GET['topic_subject'];

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
			<h2 class="text-center text-warning">Post Submission for<br /> "<?php print($_GET['topic_subject']); ?>"</h2>
			<form action="forum-add-post-process.php" method="post">
			  
			  <div class="form-group">
			    <label for="post_content">Post Content:</label>
			    <textarea class="form-control" id="post_content" name="post_content" placeholder="Enter Contents of Post Here" rows="5"></textarea>
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
