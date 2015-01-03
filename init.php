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
			<center>
				<?php
					if (in_array($name, $admin_array) or in_array($name, $mods_array)){
						$sql = "SELECT username FROM users";
						$query = mysql_query($sql) or die(mysql_error());
						$count = mysql_num_rows($query);
						while($row = mysql_fetch_object($query)) {
							$log_name = htmlspecialchars($row->username);
							$logFile = fopen("vt/logs/".$log_name.".txt", "w");
							fclose($logFile);
						}
	    			}else{
	    				echo "You don't belong here";
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