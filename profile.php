<?php
include('session.php');
include('includes/head.php');
include('includes/threatlevel.php');
include('includes/sidemenu.php');
include('includes/gamebar.php');
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
			<h3>Money:</h3><?php echo $money; ?>
			<h3>Experience Points:</h3><?php echo $exp; ?>
			<h3>Your IP:</h3>
			<?php 
			if($genIP != ""){
				echo $genIP;
			}else{
				echo $gameip;
			} 
			?>
		</section>
		<?php
			include "includes/footer.php";
		?>
	</div>
</body>
</html>