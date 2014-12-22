<?php
include('session.php');
require("includes/variables.php");

$sql = "SELECT username FROM users WHERE DATE_SUB(NOW(), INTERVAL 5 MINUTE) <= lastactive ORDER BY id ASC"; // Searhes the database for every player showing as Last Active within the last 5 Minutes

$query = mysql_query($sql) or die(mysql_error());
$count = mysql_num_rows($query);
$i = 1;

while($row = mysql_fetch_object($query)) {
	$online_name = htmlspecialchars($row->username);

	echo "<a href=\"View_Profile.php?name=".$online_name."\" onFocus=\"if(this.blur)this.blur()\">".$online_name."</a>";

	if ($i != $count) {
		echo "<label> - </label>";
	}
	$i++;
}
?>