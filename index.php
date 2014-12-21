<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Elite Nation</title>
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"> 
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
		<nav>
			<img class="logo" src="img/logo.png" alt="Elite Nation Logo" />
		</nav>
		<section>

		</section>
		<footer>
			<center>
				<?php
					$start = "2013";
					$current = gmdate("Y");
					$cy = "";
					if ($current == $start) {
						$cy = $start;
					}
					if ($current > $start) {
						$cy=$start."-".$current;
					}
					echo "<p>&copy;"." ".$cy." Guru Computers Ltd.</p>"."\n";
					?>
			</center>
		</footer>
	</div>
</body>
</html>