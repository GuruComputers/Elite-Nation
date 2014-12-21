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
			echo "&copy"." ".$cy." <a href=\"http://www.gurucomputers.co.uk\">Guru Computers Ltd</a>"."\n";
		?>
		<a href="https://www.facebook.com/elitenationgame"><img class="social-media" src="./img/facebook.png" alt="Facebook Logo"></a>
		<a href="https://twitter.com/EliteNationGame"><img class="social-media" src="./img/twitter.png" alt="Twitter Logo"></a>	
	</center>
</footer>