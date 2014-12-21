<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Elite Nation</title>
	<?php
		$page = "home";
		$root = "./";
		echo '<link rel="stylesheet" href="'.$root.'css/normalize.css">'."\n";
		echo '<link rel="stylesheet" href="'.$root.'css/main.css">'."\n";
		if (date('m') == '12') {
 			echo '<link rel="stylesheet" href="'.$root.'css/snow.css">'."\n";
		}
	?>
	<link href='http://fonts.googleapis.com/css?family=Poiret+One|Lobster|Indie+Flower|Raleway:400,500,600,700,800,900' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="wrapper">

<<<<<<< Updated upstream
		<nav>
			<h3>Elite Nation</h3>
		</nav>
		<section>
=======
		<div id="header">
			<img src="img/logo.png" alt="Elite Nation Logo" />
		</div>
		<div id="content">
>>>>>>> Stashed changes

		</section>
		<footer>
			<center>
				<?php
					$start=2014;
					$current=date("Y");
					$cy="";
					if ($current=$start) {
						$cy=$start;
					}
					if ($current>$start) {
						$cy=$start."-".$current;
					}
					echo "<p>&copy;"." ".$cy." Guru Computers Ltd.</p>"."\n";
					?>
			</center>
		</footer>
	</div>
</body>
</html>