<?php
include('login.php'); // Includes Login Script
if(!$_SESSION['login_user']==""){
	header('Location: profile.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Elite Nation</title>
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
	<?php
		$fire = strpos ($_SERVER['HTTP_USER_AGENT'],"Mobile");
		if ($fire == true) 
			{
				echo "<script>window.location='fire.php'</script>";
			}
		$page = "home";
		$root = "./";
		echo '<link rel="stylesheet" href="'.$root.'css/normalize.css">'."\n";
		echo '<link rel="stylesheet" href="'.$root.'css/main.css">'."\n";
		if (date('m') == '12') {
	 			echo '<link rel="stylesheet" href="'.$root.'css/snow.css">'."\n";
			}
		echo '<link rel="stylesheet" href="'.$root.'css/responsive.css">'."\n";
	?>
	<link href='http://fonts.googleapis.com/css?family=Poiret+One|Lobster|Indie+Flower|Raleway:400,500,600,700,800,900' rel='stylesheet' type='text/css'>
</head>
<body>	
	<div id="wrapper">
		<header>
		<div id="mobile-logo">
			<a href="index.php"><img class="logo" src="img/logo.png" alt="Elite Nation Logo" /></a>
		</div>
			<br class="anti-oops" />
			<form id="login" action="" method="post">
				<div id="mobile-user">
					<label>User Name :</label>
					<input id="name" name="username" placeholder="username" type="text">
				</div>
				<div id="mobile-password">
					<label>Password :</label>
					<input id="password" name="password" placeholder="**********" type="password">
				</div>
				<input name="submit" type="submit" value=" Login " id="submit_button">
				<br />
				<ul class="user-tools">
					<li><a href="register.php">Register Now</a></li>
					<li><a href="forgot.php">Forgotten Password?</a></li>
				</ul>
			</form>
		</header>
		<section>
			<center>
				<?php
				include_once('includes/db_config.php');

             	if(isset($_GET['hash']) && !empty($_GET['hash'])){
             	// Verify data
             	$hash = mysql_escape_string($_GET['hash']); // Set hash variable
             }
             $search = mysql_query("SELECT hash, active FROM users WHERE hash='".$hash."' AND active='0'") or die(mysql_error()); 
             $match  = mysql_num_rows($search);

             if($match > 0){
             	mysql_query("UPDATE users SET active='1' WHERE hash='".$hash."' AND active='0'") or die(mysql_error());
             	echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
             } else {
             	echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
             }

        ?>
			</center>
		</section>
		<?php
			include "footer.php";
		?>
	</div>
</body>
</html>