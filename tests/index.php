<?php
	$files = scandir('./'); 
	foreach ($files as $file){
		if($file != '.' && $file != '..' && $file != 'index.php'){
			$withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file);
			echo '<a href="'.$file.'" target="_blank">'."\n";
			echo '<h2>'.$withoutExt.'</h2></a></li>'."\n";
		}
	}
?>