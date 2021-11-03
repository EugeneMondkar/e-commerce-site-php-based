<div class="btn-group-vertical" role="group" aria-label="Button Group">
  	
	
	<?php
	if (isset($_SESSION['user_level']) and ($_SESSION['user_level'] == 1)){
	  echo "<button type=\"button\" class=\"btn btn-secondary\" 
	  onclick=\"location.href = 'admin-page.php'\" >Home</button>";
	  echo "<button type=\"button\" class=\"btn btn-secondary\" 
	  onclick=\"location.href = 'admin-specialty.php'\">Specialty Items</button>";
	  echo "<button type=\"button\" class=\"btn btn-secondary\" 
	  onclick=\"location.href = 'admin-meats.php'\">Meats</button>";
	  echo "<button type=\"button\" class=\"btn btn-secondary\" 
	  onclick=\"location.href = 'admin-cheese.php'\">Cheeses</button>";
	  echo "<button type=\"button\" class=\"btn btn-secondary\" 
	  onclick=\"location.href = 'admin-snacks.php'\">Snacks</button>";
	  echo "<button type=\"button\" class=\"btn btn-secondary\" 
	  onclick=\"location.href = 'admin-tools.php'\">Kitchen Tools</button>";
	  echo "<button type=\"button\" class=\"btn btn-secondary\" 
	  onclick=\"location.href = 'admin-add-product.php'\">Add Product</button>";
	  
	} 
	
















	?>
  	
        

	
</div>
