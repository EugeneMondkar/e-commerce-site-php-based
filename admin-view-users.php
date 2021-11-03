<!--Ensures Admin Access Only-->
<?php                                                                       
session_start();
if (!isset($_SESSION['user_level']) || ($_SESSION['user_level'] != 1))
{ header("Location: login.php");
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
			<h2 class="text-center">Membership List</h2>
<p>
<?php 
try {
// This script retrieves all the records from the users table.
require('mysqli_connect.php'); // Connect to the database.
// Make the query:
// Nothing passed from user safe query									
$query ="SELECT last_name, first_name, email, DATE_FORMAT(registration_date, '%M %d, %Y')"; 
$query .= " AS regdat, userid FROM users ORDER BY registration_date ASC";	
// Prepared statement not needed since hardcoded	
$result = mysqli_query ($dbcon, $query); // Run the query.
if ($result) { // If it ran OK, display the records.
// Table header. 									
echo '<table class="table table-striped table-dark">
<tr>
<th scope="col">Edit</th>
<th scope="col">Delete</th>
<th scope="col">Last Name</th>
<th scope="col">First Name</th>
<th scope="col">Email</th>
<th scope="col">Date Registered</th>
</tr>';				
// Fetch and print all the records:							
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	// Remove special characters that might already be in table to 
	// reduce the chance of XSS exploits
	$user_id = htmlspecialchars($row['userid'], ENT_QUOTES);
	$last_name = htmlspecialchars($row['last_name'], ENT_QUOTES);
	$first_name = htmlspecialchars($row['first_name'], ENT_QUOTES);
	$email = htmlspecialchars($row['email'], ENT_QUOTES);
	$registration_date = htmlspecialchars($row['regdat'], ENT_QUOTES);
	echo '<tr>
	<td><a href="edit_user.php?id=' . $user_id . '" class="text-warning">Edit</a></td>
	<td><a href="delete_user.php?id=' . $user_id . '" class="text-warning">Delete</a></td>
	<td>' . $last_name . '</td>
	<td>' . $first_name . '</td>
	<td>' . $email . '</td>
	<td>' . $registration_date . '</td>
	</tr>';
	}
	echo '</table>'; // Close the table.
	//                                                                                                                                                                      
	mysqli_free_result ($result); // Free up the resources.	
}
else { // If it did not run OK.
// Error message:
echo '<p class="error">The current users could not be retrieved. We apologize';
echo ' for any inconvenience.</p>';
// Debug message:
// echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
exit;
} // End of if ($result) 
mysqli_close($dbcon); // Close the database connection.
}
catch(Exception $e) // We finally handle any problems here                
   {
     // print "An Exception occurred. Message: " . $e->getMessage();
     print "The system is busy please try later";
   }
   catch(Error $e)
   {
      //print "An Error occurred. Message: " . $e->getMessage();
      print "The system is busy please try again later.";
   }
?>

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
