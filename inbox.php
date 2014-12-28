<?php
include('session.php');
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
			<form method="post">
				<table width="319" borrder="2" align="center">
					<tr>

					<td width="40" align="center"> <!-- Start of Pagination -->
						<?php
							$amount = 6; // Number of Messages to Show per Page

							$nsql = "SELECT * FROM pm WHERE sendto='".mysql_real_escape_string($name)."' and del='1'";
							$nres = mysql_query($nsql) or die(mysql_error());
							$totalmail = mysql_num_rows($nres);

							if(empty($_GET['page'])){
								$page = 1;
							}else {
								if(is_numeric($_GET['page'])){
									$page = $_GET['page'];
								}else{
									$page = 1;
								}
							}

							$min = $amount * ( $page - 1 );
							$max = $amount;

							if( $page > 1){
								$previouspage = $page - 1;
								echo "<a href=\"inbox.php?page=".$previouspage."\" onFocus=\"if(this.blur)this.blur()\">Previous</a>";
							}
						?>
					</td> <!-- End of Pagination -->

					<td width="101" align="center"> <!-- Start of Delete All Messages -->
						<?php
							$numofpages = ceil($totalmail / $amount);

							if($totalmail >= "1") and (!isset($_POST['Clean'])){ ?>
								<input name="Clean" type="submit" id="Clean" value="Delete All Messages" onFocus="if(this.blur)this.blur()" />
						<?php } ?>
					</td> <!-- End of Delete All Messages -->

					<td width="115" align="center"> <!-- Start of Delete Selected Message -->
						<?php
							if(($totalmail >= "1") and (!isset($_POST['Clean']))){ ?>
								<input name="Delete" type="submit" id="Delete" calue="Delete Selected" onFocus="if(this.blur)this.blur()" />
						<?php } ?>
					</td> <!-- End of Delete Selected Message -->

					<td width="34" align="center">
						<span color="#000000">
							<?php
								if($page < $numofpages){
									$pagenext = ($page + 1);
									echo "<a href=\"inbox.php?page=".$pagenext."\" onFocus=\"if(this.blur)this.blur()\" color='#00CC00'>Next</a>";
								}
							?>
						</span>
					</td>
				</tr>
			</table>

			<?php 
				require("/includes/inbox.php");

				$presult = mysql_query("SELECT * FROM pm WHERE sento='".mysql_real_escape_string($name)."' and del='1' ORDER BY id DESC LIMIT $min,$amount") or die(mysql_error());

				if (!isset($_POST['Clean'])){
					if ((mysql_num_rows($presult) == 0) and (!isset($_POST['clean']))){
						echo "Sorry, you don't have any messages.";
					}else {
						$b = 0; // Lets establish a variable to fetch all the rows until there are no messages left for the player
						while($row = mysql_fetch_array( $presult )) {
							// Print out the contents of each row into our Inbox View
							?>
							<table width="90%" border="1">
								<tr>
									<td align="left">
										<span class="text">
											<span class="head">
												<?php

												$b = $b + 1;
												echo "<a href=\"View_Profile.php?name=". $row['sendby'] . "\" onFocus=\"if(this.blur)this.blur()\">".$row['sendby']."</a>";

												?>
											</span>
										</span>
									</td>
								</tr>
								<tr>
									<td align="left" >
										<?php
											$row['message'] = htmlentities($row['message']);
											$row['message'] = nl2br($row['message']); 
											$row['message'] = stripslashes($row['message']);
											echo $row['message'];
										?>
									</td>
								</tr>
								<tr>
									<td align="left" >
										<table width="100%" border="1">
											<tr>
												<td width="25" align="left" >
													<?php echo "<input type='checkbox' name='id[$b]' value='".$row['id']."' onFocus=\"if(this.blur)this.blur()\"/>"; ?>
												</td>
												<td width="50" align="center" >
													<?php echo "<a href=\"Send_Message.php?name=". $row['sendby'] ."&reply=". $row['id'] ."\" onFocus=\"if(this.blur)this.blur()\">Reply.</a>"; ?>
												</td>
												<td width="50" align="center" >
													<?php echo "<a href=\"Inbox.php?delete=". $row['id'] ."\" onFocus=\"if(this.blur)this.blur()\">Delete.</a>"; ?>
												</td>
												<td width="50" align="right" >
													<?php echo "".$row['time'].""; ?>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						<br />
						<?php 
							} // if imbox is empty
							} // if while
							} // if <> clean	
						?>
					</form>
			</section>
		<?php
			include "footer.php";
		?>
	</div>
</body>
</html>