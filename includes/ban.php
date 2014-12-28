<?php
include('session.php');
include('includes/sidemenu.php');
include('includes/gamebar.php');
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
			<a href="index.php"><img class="logo" src="img/logo.png" alt="Elite Nation Logo" /></a>
			<div id="profile">
				<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
				<b id="logout"><a href="logout.php">Log Out</a></b>
			</div>
		</nav>
		<section>
			<?php
				if (in_array($name, $admin_array) or in_array($name, $mods_array)){
					if(isset($_POST['Ban'])){
						$sql = "SELECT name,sitestate,signup_ip FROM users WHERE name='".mysql_real_escape_string($_POST['ban_name'])."'";
						$query = mysql_query($sql) or die(mysql_error());
						$row = mysql_fetch_object($query);
						$banned_name = htmlspecialchars($row->username);
						$banned_state = htmlspecialchars($row->sitestate);
						$banned_ip = htmlspecialchars($row->signup_ip);

						if($_POST['ban_all'] == "1"){
							
						}
					}
				}
		</section>
		<?php
			include "footer.php";
		?>
	</div>
</body>
</html>