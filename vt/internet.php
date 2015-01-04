<?php
	define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"]);
	define('INCLUDES_PATH', ROOT_PATH.'/includes/');
	// Establishing Connection with Server by passing server_name, user_id and password as a parameter
	$connection = mysql_connect("localhost", "gameuser", "me9yqabav");
	// Selecting Database
	$db = mysql_select_db("zadmin_elitenation", $connection);
	session_start();// Starting Session
	// Storing Session
	$user_check=$_SESSION['login_user'];
	// SQL Query To Fetch Complete Information Of User
	$ses_sql=mysql_query("select username, id from users where username='$user_check'", $connection);
	$row = mysql_fetch_assoc($ses_sql);
	$login_session =$row['username'];
	$_SESSION['user_id']=$row['id'];
	if(!isset($login_session)){
		mysql_close($connection); // Closing Connection
		header('Location: index.php'); // Redirecting To Home Page
	}
	include INCLUDES_PATH . 'head.php';
	include INCLUDES_PATH . 'threatlevel.php';
	include INCLUDES_PATH . 'sidemenu.php';
	require INCLUDES_PATH . 'variables.php';
	include INCLUDES_PATH . 'gamebar.php';
?>