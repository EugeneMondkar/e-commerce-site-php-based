<?php
session_start();
if (!isset($_SESSION['user_level']) or ( ($_SESSION['user_level'] != 2) and ($_SESSION['user_level'] != 3) ) )
{ header("Location: index.php");
  exit();
}

require('mysqli_connect.php');

$topic_subject = $_POST['topic_subject'];
$topic_cat = $_SESSION['cat_id'];
$topic_by = $_SESSION['empID'];
$cat_name = $_SESSION['cat_name'];


$sqlcommand = "INSERT INTO topics (topic_subject, topic_date, topic_cat, topic_by)";
$sqlcommand .= "VALUES ('{$topic_subject}', NOW(), {$topic_cat}, {$topic_by})";
$dbcon->query($sqlcommand);

header ("location: forum-category-page.php?cat_id={$topic_cat}&cat_name={$cat_name}");


?>
