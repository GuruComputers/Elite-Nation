<?php
	include('login.php'); // Includes Login Script
	if(!$_SESSION['login_user']==""){
		header('Location: profile.php');
	}
	include 'includes/head.php';
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
				<h1 class="css-typing">Welcome to Elite Nation</h1>
				<?php echo $error; ?>
			</center>
		</section>
		<?php
			include "includes/footer.php";
		?>
	</div>
</body>
</html>