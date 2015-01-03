<?php
include('../session.php');
include('../includes/head.php');
include('../includes/threatlevel.php');
include('../includes/sidemenu.php');
include('../includes/gamebar.php');
require("../includes/variables.php");
?>
<body>
	<div id="wrapper">
		<nav>
			<a href="../index.php"><img class="logo" src="../img/logo.png" alt="Elite Nation Logo" /></a>
			<div id="profile">
				<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
				<b id="logout"><a href="logout.php">Log Out</a></b>
			</div>
		</nav>
		<section>
			<?php
				$currentLog = 'logs/'.$login_session.'.txt';
				function Read()
				{
					echo @file_get_contents($currentLog);
				};

				function Write()
				{
					$logUpdate = $_POST["updateLogContents"];
					@file_put_contents($currentLog, $logUpdate);
				}
			?>
			<form id="logWindow" name="logWindow" method="post">
				<table width="90%" border="0" align="center">
  					<tr>
  						<td align="center" ><textarea style="width:100%; height:400px; resize:none" name="updateLogContents"></textarea></td>
  					</tr>
  					<tr>
  						<td colspan="2" align="center" valign="top" ><input name="Send" type="submit" value="Update Log"  onfocus="if(this.blur)this.blur()"/></td>
  					</tr>
  				</table>
  			</form>
		</section>
		<?php
			include('../includes/footer.php');
		?>
	</div>
</body>
</html>