<!-- Forum Heading -->
<div class="container-fluid">

	<div class="row">
		<div class="col-12">
			<h1 class="text-warning mb-4 font-bold text-uppercase">Gallo and Sons<br />Company Forum</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			
			
			  <button type="button" class="btn btn-warning" onclick="location.href = '<?php if ($_SESSION['user_level'] == 3) {echo "admin-page.php";} else {echo "worker-page.php";} ?>'">Home</button>
			  <button type="button" class="btn btn-warning" onclick="location.href = 'forum.php'">Categories</button>

			  <?php
				if($_SESSION['user_level'] == 3)
				{
					echo "<button type=\"button\" class=\"btn btn-warning\" onclick=\"location.href = 'forum-add-category.php'\">Add Category</button>";
					

				}
		
			  ?>
			
			
		</div>
	</div>


</div>
