<?php
include('session.php');
require("variables.php");

$nsql = "SELECT * FROM pm WHERE sendto='".mysql_real_escape_string($name)."' and del='1'";            
$nres = mysql_query($nsql) or die(mysql_error());
$totalmail = mysql_num_rows($nres);

echo $totalmail;

?>