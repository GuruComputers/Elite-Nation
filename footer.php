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
<<<<<<< HEAD

			if(isset($login_session)){
				echo "<marquee behavior=\"scroll\" direction=\"left\" onmouseover=\"this.stop();\" onmouseout=\"this.start();\">";
				include('includes/viewonline.php');
				echo "</marquee>";
			}
				
=======
		?>
			<marquee id="players" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();"><?php include('includes/viewonline.php'); ?></marquee>
		<?php	
>>>>>>> FETCH_HEAD
			echo "&copy"." ".$cy." <a href=\"http://www.gurucomputers.co.uk\">Guru Computers Ltd</a>"."\n";
		?>
		<a href="https://www.facebook.com/elitenationgame"><img class="social-media" src="./img/facebook.png" alt="Facebook Logo"></a>
		<a href="https://twitter.com/EliteNationGame"><img class="social-media" src="./img/twitter.png" alt="Twitter Logo"></a>
		<?php
			echo "    Current Player's Online : ";
			include('includes/onlinenow.php');
		?>
	</center>
</footer>