<?php
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 3) )
{ header("Location: index.php");
  exit();
}

require('mysqli_connect.php');

$cat_name = $_POST['cat_name'];
$cat_description = $_POST['cat_description'];

$sqlcommand = "INSERT INTO categories (cat_name, cat_description)";
$sqlcommand .= "VALUES ('{$cat_name}', '{$cat_description}')";



$dbcon->query($sqlcommand);

header ("location: forum.php");


?>
