<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=md5($_POST['password']);
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "gameuser", "me9yqabav");
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// Selecting Database
$db = mysql_select_db("zadmin_elitenation", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("SELECT * FROM users WHERE password='$password' AND username='$username' AND active='1' AND sitestate='1' ", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
$lastlogin = mysql_query("UPDATE users SET last_login=current_timestamp WHERE username='$username'", $connection);
header("location: profile.php"); // Redirecting To Other Page
} else {
	$checkban = mysql_query("select * from users where password='$password' AND username='$username' AND active='1' AND sitestate='2'", $connection);
	$confirmban = mysql_num_rows($checkban);
	if ($confirmban == 1) {
		$error = "You have been banned.";
	} else {
		$error = "Username or Password is invalid or your account hasn't been activated";
	}
}
mysql_close($connection); // Closing Connection
}
}
?>