<?php

error_reporting(E_ALL);

ob_start();
require('config.php');
$tbl_name="members"; // Table name 

// Connect to server and select database.
$link = mysqli_connect($host, $username, $password);
mysqli_select_db($link, $db_name) or die(mysql_error());

// Define $myusername and $mypassword 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

// Encrypt Password
// $encrypted_mypassword=md5($mypassword);
$sql="SELECT * FROM $tbl_name WHERE username='RJ31337'";
$result=mysql_query($sql);

echo "Hello World " . $result;

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_register("myusername");
session_register("mypassword"); 
header("location:login_success.php");
}
else {
echo "Wrong Username or Password";
}
ob_end_flush();
?>