<?php

require("includes/db_config.php");

$sql = "SELECT username FROM users WHERE DATE_SUB(NOW(), INTERVAL 5 MINUTE) <= lastactive ORDER BY id ASC"; // Searhes the database for every player showing as Last Active within the last 5 Minutes

$query = mysql_query($sql) or die(mysql_error());
$count = mysql_num_rows($query);

echo $count;
?>