<?php
include('session.php');
include('includes/sidemenu.php');
include('includes/gamebar.php');
require("includes/variables.php");
include('includes/head.php');
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
			<center>
				<?php
					if (in_array($name, $admin_array) or in_array($name, $mods_array)){
						if(isset($_POST['Warn'])){
							$sql = "SELECT username,sitestate,signup_ip FROM users WHERE username='".mysql_real_escape_string($_POST['warn_name'])."'";
							$query = mysql_query($sql) or die(mysql_error());
							$row = mysql_fetch_object($query);
							$warned_name = htmlspecialchars($row->username);
							$banned_state = htmlspecialchars($row->sitestate);
							$warnings = htmlspecialchars($row->warnings);

							if($banned_state == 1){
								echo "This person is already banned.";
							} else {
								if($warnings == 2){
									$threestrikes = "UPDATE users SET sitestate='2' WHERE username='".mysql_real_escape_string($warned_name)."'") or die(mysql_error());
									$instaban = "INSERT INTO banned SET id='', name= '".mysql_real_escape_string($warned_name). "', banner = '".mysql_real_escape_string($name). "', reason = '".$_POST['reason']. "'";
									$res = mysql_query($instaban);
								}
							} else {
								$warninginc = mysql_query("UPDATE users SET warnings = warnings + 1 WHERE username='".mysql_real_escape_string($warned_name)."'") or die(mysql_error());
								$sql = "INSERT INTO warnings SET id='', name = '".mysql_real_escape_string($warned_name). "',warner = '".mysql_real_escape_string($name). "', reason = '".$_POST['reason']. "'";
								$res = mysql_query($sql);
							}
						}
				?>
				<form method="post">
					<table width="350" border="0" cellpadding="0" cellspacing="2" class="table">
						<tr>
							<td colspan="2" align="left" class="header">
								Warn Member: <?php echo "$user"; ?>
							</td>
						</tr>
						<tr>
							<td align="center" class="cell">Username    </td>
							<td align="center" class="cell">
								<input name="warn_name" type="text" id="warn_name" onFocus="if(this.value=='Name')this.value='';" value="<?php echo htmlspecialchars($_GET['warn']);?>" />
							</td>
						</tr>
						<tr>
							<td align="center" valign="top" class="cell">Reason</td>
							<td align="center" valign="top" class="cell">
								<textarea name="reason" rows="6"  id="reason"></textarea>
							</td>
						</tr>
	  					<tr>
	    					<td colspan="2" align="right" class="cell">
	    						<input name="Warn" type="submit"  id="Warn" value="Warn" onFocus="if(this.blur)this.blur()" />
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
			include "includes/footer.php";
		?>
	</div>
</body>
</html>