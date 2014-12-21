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
			echo "&copy"." ".$cy." Guru Computers Ltd"."\n";
		?>
		<img class="social-media" src="./img/facebook.png" alt="Facebook Logo">
		<img class="social-media" src="./img/twitter.png" alt="Twitter Logo">		
	</center>
</footer>