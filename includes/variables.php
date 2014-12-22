<?php
include_once("db_config.php");
include_once("functions.php");

if(isset($_SESSION['user_id'])) {
 // Login OK, update last active
 $sql = "UPDATE users SET lastactive=NOW() WHERE id='".($_SESSION['user_id'])."'";
 mysql_query($sql);
}else{
   header("Location: index.php");
   exit();
}

$sql = "SELECT * FROM users WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$id = htmlspecialchars($row->id);
$userip = htmlspecialchars($row->userip);
$name = htmlspecialchars($row->name);
$password = htmlspecialchars($row->password);
$mail = htmlspecialchars($row->mail);
$money = htmlspecialchars($row->money);
$exp = htmlspecialchars($row->exp);
$rank = htmlspecialchars($row->rank);
$points = htmlspecialchars($row->points);

?>