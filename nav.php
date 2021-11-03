<div class="btn-group-vertical" role="group" aria-label="Button Group">
  	
	
	<?php
	if (isset($_SESSION['user_level']) and ($_SESSION['user_level'] == 0))
	{ 
	  echo "<button type=\"button\" class=\"btn btn-secondary\" 
	  onclick=\"location.href = 'members-page.php'\" >Home</button>";
	  echo "<button type=\"button\" class=\"btn btn-secondary\" 
	  onclick=\"location.href = 'specialty_cart.php'\">Specialty Items</button>";
	  echo "<button type=\"button\" class=\"btn btn-secondary\" 
	  onclick=\"location.href = 'meats_cart.php'\">Meats</button>";
	  echo "<button type=\"button\" class=\"btn btn-secondary\" 
	  onclick=\"location.href = 'cheese_cart.php'\">Cheeses</button>";
	  echo "<button type=\"button\" class=\"btn btn-secondary\" 
	  onclick=\"location.href = 'snacks_cart.php'\">Snacks</button>";
	  echo "<button type=\"button\" class=\"btn btn-secondary\" 
	  onclick=\"location.href = 'tools_cart.php'\">Kitchen Tools</button>";
	} else if (isset($_SESSION['user_level']) and ($_SESSION['user_level'] == 1)){
	  echo "<button type=\"button\" class=\"btn btn-secondary\" 
	  onclick=\"location.href = 'admin-page.php'\" >Home</button>";
	  echo "<button type=\"button\" class=\"btn btn-secondary\" 
	  onclick=\"location.href = 'admin-specialty.php'\">Manage Products</button>";
	  
	} else {
	  echo "<button type=\"button\" class=\"btn btn-secondary\" 
	  onclick=\"location.href = 'index.php'\" >Home</button>";
	  echo "<button type=\"button\" class=\"btn btn-secondary\" 
	  onclick=\"location.href = 'specialty.php'\">Specialty Items</button>";
	  echo "<button type=\"button\" class=\"btn btn-secondary\" 
	  onclick=\"location.href = 'meats.php'\">Meats</button>";
	  echo "<button type=\"button\" class=\"btn btn-secondary\" 
	  onclick=\"location.href = 'cheese.php'\">Cheeses</button>";
	  echo "<button type=\"button\" class=\"btn btn-secondary\" 
	  onclick=\"location.href = 'snacks.php'\">Snacks</button>";
	  echo "<button type=\"button\" class=\"btn btn-secondary\" 
	  onclick=\"location.href = 'tools.php'\">Kitchen Tools</button>";	
	}
	
















	?>
  	
        

	
</div>
