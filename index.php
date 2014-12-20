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

		<div class="header">
			<h3>Elite Nation</h3>
		</div>
		<div class="content">

		</div>
		<div class="footer">
		<center>
			<a href="http://twitter.com/EliteNation">
			<?php
				echo '<img src="'.$root.'img/twitter-wrap.png" alt="Twitter Logo" class="social-icon">';
			?>
			</a>
			<a href="http://facebook.com/EliteNation">
			<?php
				echo '<img src="'.$root.'img/facebook-wrap.png" alt="Facebook Logo" class="social-icon">';
			?>
			</a>
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
		</div>
	</div>
</body>
</html>