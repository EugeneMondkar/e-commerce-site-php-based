<?php                                                                       
session_start();
if (!isset($_SESSION['user_level']) or ( ($_SESSION['user_level'] != 2) and ($_SESSION['user_level'] != 3) ) )
{ header("Location: index.php");
  exit();
}

require('mysqli_connect.php');

$sqlcommand01 = "SELECT cat_id, cat_name, cat_description FROM categories";
$result01 = $dbcon->query($sqlcommand01);

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

			<?php
				if(!$result01)
				{
					echo "<h1>The categories could not be displayed, please try again later.</h1>";
				}else {
					if ($result01->num_rows == 0)
					{	
						echo "<h1>No categories defined yet.</h1>";
					} else {
						echo "<table class=\"table table-striped table-dark\">
						      <thead>
							<tr>
							<th scope=\"col\" style=\"width:60%\">Category</th>
							<th scope=\"col\" style=\"width:40%\">Most Recent Topic</th>
							</tr>
						      </thead><tbody>";

						while($row = $result01->fetch_assoc())
						{
							$cat_name = $row['cat_name'];
							$cat_id = $row['cat_id'];
							echo "<tr>";
							echo "<td>";
							echo "<h4><a href=\"forum-category-page.php?cat_id={$cat_id}&cat_name={$cat_name}\" class=\"text-warning\">".$row['cat_name']."</a></h4><br />".$row['cat_description'];
							echo "</td>";

							
							$sqlcommand02 = "SELECT * FROM topics WHERE topic_cat={$cat_id} ORDER BY topic_id DESC LIMIT 1";
							$result02 = $dbcon->query($sqlcommand02);
							if ($result02->num_rows == 1)
							{
								$row = $result02->fetch_assoc();
								$topic_subject = $row['topic_subject'];
								$topic_id = $row['topic_id'];
								echo "<td><a href=\"forum-topic-page.php?topic_id={$topic_id}&topic_subject={$topic_subject}\" class=\"text-warning\">{$topic_subject}</a></td>";
							} else {
								echo "<td>No Topics Posted</td>";
							}

							
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
