<?php
session_start();
if (!isset($_SESSION['user_level']) or ( ($_SESSION['user_level'] != 2) and ($_SESSION['user_level'] != 3) ) )
{ header("Location: index.php");
  exit();
}

require('mysqli_connect.php');


$post_content = $dbcon->real_escape_string($_POST['post_content']);
$post_topic = $_SESSION['topic_id'];
$post_by = $_SESSION['empID'];
$topic_subject = $_SESSION['topic_subject'];


$sqlcommand = "INSERT INTO posts (post_content, post_date, post_topic, post_by)";
$sqlcommand .= "VALUES ('{$post_content}', NOW(), {$post_topic}, {$post_by})";
$dbcon->query($sqlcommand);

header ("location: forum-topic-page.php?topic_id={$post_topic}&topic_subject={$topic_subject}");


?>
