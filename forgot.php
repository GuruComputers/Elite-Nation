<?php
include('login.php'); // Includes Login Script
if(!$_SESSION['login_user']==""){
	header('Location: profile.php');
}
include_once('includes/db_config.php');
require 'includes/functions.php';
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
			<?php 
			if (isset($_POST['Send'])) {
				$password = substr(md5($_SERVER['REMOTE_ADDR'].microtime().rand(1,100000)),0,6); // Generate a random number
				$nsql = "SELECT * FROM users WHERE mail='".mysql_real_escape_string($_POST['Email'])."'";
				$query = mysql_query($nsql) or die(mysql_error());
				$row = mysql_fetch_object($query);
				$name = htmlspecialchars($row->username);
				$pass = htmlspecialchars($row->password);
				$mail = htmlspecialchars($row->mail);
				$dbpass = md5($password);

				if((empty($_POST['Email']))){ // if the email field is empty there will be an error
					echo 'Please enter the email address associated with your account.';
				} else {
				if(empty($name)){  // there is no name with the entered email
					echo 'Email address not found in our Database.';
				} else {
					if($_POST['Email'] != $mail){
					echo 'Invalid information.'; // if their is no match in the email
				} else {
				if(!checkEmail($_POST['Email'])){ // the checkEmail function we have in our function that saves us time and sapce
					echo 'Your email is not valid!';
				} else {
					$result = mysql_query("UPDATE users SET password='$dbpass' WHERE username='" .mysql_real_escape_string($name). "'") 
					or die(mysql_error());	

					$to = $_POST['Email'];
					$from = "no-reply@gurucomputers.co.uk";
					$subject = "Registration - Your Registration Details";
					$message = "<html>
					<body background=\"#4B4B4B\">
					<h1>Game Registration Details</h1>
					Dear $name, <br>
					<center>
					Your Username: $name <p>
					Your Password: $password <p>
					</body>
					</html>";
   
    $headers  = "From: Game Lost Details <no-reply@gurucomputers.co.uk>\r\n";
    $headers .= "Content-type: text/html\r\n";
	mail($to, $subject, $message, $headers);             
			echo 'We sent you an email with your Details!';
		
	}
}
}// check if name is unused.
}// check if accepted to the tos.
}// name check.
// if post register.		
?>

			<center>
				<form method="post">
					<h1><strong>Lost Password</strong></h1>
					<p>Email:
						<input type="text" name="Email" id="Email">
						<br />
						<input type="submit" name="Send" id="Send" value="Send">
					</p>
				</form>
			</center>
		</section>
		<?php
			include "footer.php";
		?>
	</div>
</body>
</html>