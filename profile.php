<?php
include('session.php');
require("includes/variables.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php
		echo "<title>Elite Nation : ".$_SESSION['login_user']."</title>";
	?>
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"> 
	<?php
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
		<nav>
			<img class="logo" src="img/logo.png" alt="Elite Nation Logo" />
			<div id="profile">
				<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
				<b id="logout"><a href="logout.php">Log Out</a></b>
			</div>
		</nav>
		<section>
			<h3>Money:</h3><?php echo $money; ?>
			<h3>Experience Points:</h3><?php echo $exp; ?>
		</section>
		<?php
			include "footer.php";
		?>
	</div>
</body>
</html>