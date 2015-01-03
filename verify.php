<?php
include('login.php'); // Includes Login Script
if(!$_SESSION['login_user']==""){
	header('Location: profile.php');
}
include('includes/head.php');
?>
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
			include "includes/footer.php";
		?>
	</div>
</body>
</html>