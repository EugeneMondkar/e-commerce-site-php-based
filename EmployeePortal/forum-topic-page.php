<?php                                                                       
session_start();
if (!isset($_SESSION['user_level']) or ( ($_SESSION['user_level'] != 2) and ($_SESSION['user_level'] != 3) ) )
{ header("Location: index.php");
  exit();
}

require('mysqli_connect.php');

$cat_id = $_SESSION['cat_id'];
$cat_name = $_SESSION['cat_name'];

$topic_id = $_GET['topic_id'];
$topic_subject = $_GET['topic_subject'];

$sqlcommand01 = "SELECT * FROM posts WHERE post_topic={$topic_id}";
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
			
			<p><button type="button" class="btn btn-warning" onclick="location.href = 'forum-add-post.php?topic_id=<?php echo "$topic_id"; ?>&topic_subject=<?php echo "$topic_subject"; ?>'">Post Reply</button> <button type="button" class="btn btn-warning" onclick="location.href = 'forum-category-page.php?cat_id=<?php echo "$cat_id"; ?>&cat_name=<?php echo "$cat_name"; ?>'">Go Back to <?php echo "$cat_name"; ?> Page</button> </p>
			<?php
				if(!$result01)
				{
					echo "<h1>The posts could not be displayed, please try again later.</h1>";
				}else {
					if ($result01->num_rows == 0)
					{	
						echo "<h3>No replies yet.</h3>";
					} else {
						echo "<table class=\"table table-striped table-dark\">
						      <thead>
							<tr>
							<th scope=\"col\" colspan=\"2\" class=\"text-warning text-center\">{$topic_subject}</th>
							</tr>
						      </thead><tbody>";

						while($row = $result01->fetch_assoc())
						{
							$post_id = $row['post_id'];
							$post_content = $row['post_content'];
							$post_date = $row['post_date'];
							$post_by = $row['post_by'];
							
							$id = (int) $post_by;
						    	$name = $names["$id"];

							echo "<tr>";
							echo "<td style=\"width:25%\">{$name}<br />{$post_date}</td>";
							echo "<td style=\"width:75%\">{$post_content}</td>";
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
