<?php                                                                       
session_start();
if (!isset($_SESSION['user_level']) or ( ($_SESSION['user_level'] != 2) and ($_SESSION['user_level'] != 3) ) )
{ header("Location: index.php");
  exit();
}

require('mysqli_connect.php');

$cat_id = $_GET['cat_id'];
$cat_name = $_GET['cat_name'];

$_SESSION['cat_id'] = $cat_id;
$_SESSION['cat_name'] = $cat_name;

$sqlcommand01 = "SELECT * FROM topics WHERE topic_cat={$cat_id}";
$result01 = $dbcon->query($sqlcommand01);

$sqlcommand02 = "SELECT empID, first_name, last_name FROM employees";
$result02 = $dbcon->query($sqlcommand02);

// Create Name Array
$keys = array();
$values = array();
while($row = $result02->fetch_assoc())
{
	$name = $row['first_name'] . " " . $row['last_name'];
        $id = $row['empID'];
	array_push($keys, $id);
	array_push($values, $name);
}

$names = array_combine($keys, $values);


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
		<div class="container" style="margin-top:30px; background:linear-gradient(#800000,#800000);">
			
			<!-- Banner/Header Area -->

			<header class="text-center row"
			style="margin-bottom:0px; background:linear-gradient(black, #800000); 
			padding:20px;">
				<!-- Import Banner -->
				<?php include('forum-header.php'); ?>
			</header>

			<!-- Body -->

			<div class="text-white col-12" 
			style="background:linear-gradient(#800000,#800000);">
			<h2 class="text-center text-warning">Topics in the <?php print($cat_name); ?> Category</h2>
			<p><button type="button" class="btn btn-warning" onclick="location.href = 'forum-add-topic.php?cat_id=<?php echo "$cat_id"; ?>&cat_name=<?php echo "$cat_name"; ?>'">Post Topic</button></p>
			<?php
				if(!$result01)
				{
					echo "<h1>The topics could not be displayed, please try again later.</h1>";
				}else {
					if ($result01->num_rows == 0)
					{	
						echo "<h3>No topics for this category yet.</h3>";
					} else {
						echo "<table class=\"table table-striped table-dark\">
						      <thead>
							<tr>
							<th scope=\"col\" style=\"width:50%\">Topic</th>
							<th scope=\"col\" style=\"width:25%\">Date & Time Created</th>
							<th scope=\"col\" style=\"width:25%\">Posted By</th>
							</tr>
						      </thead><tbody>";

						while($row = $result01->fetch_assoc())
						{
							$topic_id = $row['topic_id'];
							$topic_subject = $row['topic_subject'];
							$topic_date = $row['topic_date'];
							$topic_by = $row['topic_by'];

							$id = (int) $topic_by;
						    	$name = $names["$id"];

							echo "<tr>";
							echo "<td>";
							echo "<h5><a href=\"forum-topic-page.php?topic_id={$topic_id}&topic_subject={$topic_subject}\" class=\"text-warning\">".$topic_subject."</a></h5>";
							echo "</td>";
							echo "<td>{$topic_date}</td>";
							echo "<td>{$name}</td>";
							echo "</tr>";
	
						}
						
 
						echo "</tbody></table>";

					}
				}



			?>
			
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
