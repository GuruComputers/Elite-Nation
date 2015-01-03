<?php
require('constants.php');
include 'session.php';
include INCLUDES_PATH . 'head.php';
include INCLUDES_PATH . 'threatlevel.php';
include INCLUDES_PATH . 'sidemenu.php';
include INCLUDES_PATH . 'gamebar.php';
require("includes/variables.php");
?>
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
				$newLogDate = date('d-m-Y H:i:s'); 
				$logDIR = 'vt/logs/'.$login_session.'.txt';
				$myfile = fopen($logDIR, "a") or die("unable to open file");
				$txt = "[".$newLogDate."] ".$login_session." logged in.\n";
				fwrite($myfile, $txt);
				fclose($myfile);
			?>
		</section>
		<?php
			include INCLUDES_PATH . 'footer.php';
		?>
	</div>
</body>
</html>