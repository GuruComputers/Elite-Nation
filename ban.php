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
						if(isset($_POST['Ban'])){
							$sql = "SELECT username,sitestate,signup_ip FROM users WHERE username='".mysql_real_escape_string($_POST['ban_name'])."'";
							$query = mysql_query($sql) or die(mysql_error());
							$row = mysql_fetch_object($query);
							$banned_name = htmlspecialchars($row->username);
							$banned_state = htmlspecialchars($row->sitestate);
							$banned_ip = htmlspecialchars($row->signup_ip);

							if($_POST['ban_all'] == "1") // Ban by IP Function
							{
								$result = mysql_query("UPDATE users SET sitestate='2' WHERE signup_ip='".mysql_real_escape_string($banned_ip)) or die(mysql_error());
								echo "Ip has been banned.";
							}else{ // Throw Error if Name FIeld Empty
								if (empty($banned_name)){
									echo "This person does not seem to exist.";
								}else{
									if($banned_state == 2){
										echo "This person is already banned.";
									}else{
										if (in_array($banned_name, $admin_array) or in_array($banned_name, $admin_array)) {
											echo "<b style=\"font-size:36px;\">Can't Ban Staff!</b>";
										}else{

											$result = mysql_query("UPDATE users SET sitestate='2' WHERE username='".mysql_real_escape_string($banned_name). "'") or die(mysql_error());

											$sql = "INSERT INTO banned SET id = '', name = '".mysql_real_escape_string($banned_name). "', banner = '".mysql_real_escape_string($name). "', reason = '".$_POST['reason']. "'";
											$res = mysql_query($sql) or die(mysql_error());

											echo $banned_name." has been banned.";
										}
									}
								}
							}
						}
				?>
				<form method="post">
					<table width="350" border="0" cellpadding="0" cellspacing="2" class="table">
						<tr>
							<td colspan="2" align="left" class="header">
								Ban Member: <?php echo "$user"; ?>
							</td>
						</tr>
						<tr>
							<td align="center" class="cell">Username    </td>
							<td align="center" class="cell">
								<input name="ban_name" type="text" id="ban_name" onFocus="if(this.value=='Name')this.value='';" value="<?php echo htmlspecialchars($_GET['ban']);?>" />
							</td>
						</tr>
						<tr>
							<td align="center" valign="top" class="cell">Reason</td>
							<td align="center" valign="top" class="cell">
								<textarea name="reason" rows="6"  id="reason"></textarea>
							</td>
						</tr>
						<tr>
							<td colspan="2" align="left" class="cell">
								<input type="checkbox" name="ban_all" value="1" id="ban_all" />
	      						<label for="ban_all">Ban IP</label></td>
	  					</tr>
	  					<tr>
	    					<td colspan="2" align="right" class="cell">
	    						<input name="Ban" type="submit"  id="Ban" value="Ban" onFocus="if(this.blur)this.blur()" />
	    					</td>
	    				</tr>
	    			</table>
	    		</form>
	    		<?php
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