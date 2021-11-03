<?php                                                                       
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 0))
{ header("Location: login.php");
  exit();
}
?>

<!--checkout Header-->
<div class="col-sm-2">
	<img class="img-fluid float-left" src="logo.png" alt="Logo"> 
</div>

<div class="col-sm-8">
	<h1 class="text-warning mb-4 font-bold text-uppercase">Gallo and Sons<br />Gourmet Products</h1>
</div>

<nav class="col-sm-2">
	<div class="btn-group-vertical" role="group" aria-label="Button Group">
  	<button type="button" class="btn btn-secondary" 
    	onclick="location.href = 'checkout.php'" >Erase Entries</button>
  	<button type="button" class="btn btn-secondary" 
    	onclick="location.href = 'members-page.php'">Cancel</button>
	</div>
</nav>
