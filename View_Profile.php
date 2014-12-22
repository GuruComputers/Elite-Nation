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
			<?php
			$sql  = "SELECT * FROM users where username='".mysql_real_escape_string($_GET['name'])."'";
			$query = mysql_query($sql) or die(mysql_error());
			$row = mysql_fetch_object($query);
			$profile_id = htmlspecialchars($row->id);
			$profile_name = htmlspecialchars($row->username);
			$profile_money = htmlspecialchars($row->money);
			$profile_rank = htmlspecialchars($row->rank);
			$profile_clan = htmlspecialchars($row->clan);
			$profile_exp = htmlspecialchars($row->exp);

			$profile_account = "";
			if (in_array($profile_name, $admin_array)) {$profile_account = "Admin";}
			if (in_array($profile_name, $mods_array)) {$profile_account = "Moderator";}
			if (in_array($profile_name, $hdo_array)) {$profile_account = "HDO";}

			?>

			<tr>
    <td width="32%">Username:<?php echo "<a href=\"Send_Message.php?name=". $profile_name ."\" onFocus=\"if(this.blur)this.blur()\">".$profile_name."</a>"; ?> - <?php echo $profile_account; ?></td>
  </tr>
  <tr>
    <td>Rank:
      <?php echo $profile_rank; ?>
    </td>
  </tr>
  <tr>
    <td>Money: <?php echo $profile_money; ?></td>
  </tr>
  <tr>
    <td>Crew: Coming Soon</td>
  </tr>
  <tr>
    <td>Status: 
      <?php

$sql = "SELECT id,lastactive FROM users WHERE username='".mysql_real_escape_string($_GET['name'])."' and DATE_SUB(NOW(),INTERVAL 5 MINUTE) <= lastactive ";
$query = mysql_query($sql)  or die(mysql_error());
$row = mysql_fetch_object($query);
$online_id = htmlspecialchars($row->id);

if(empty($online_id)){echo "Offline";}
else{

	$sql = "SELECT lastactive FROM users WHERE username='".mysql_real_escape_string($_GET['name'])."' and DATE_SUB(NOW(),INTERVAL 1 MINUTE) <= lastactive";
$query = mysql_query($sql)  or die(mysql_error());
$row = mysql_fetch_object($query);
$idle = htmlspecialchars($row->lastactive);

	if(empty($idle)){
	echo "Away";
	}else{
	echo "Online";
	}
}



?>
      <?php if (!in_array($profile_name, $admin_array)){ ?>
)
<?php } ?>
    </td>
  </tr>
  <tr>
    <td height="82" colspan="2">      
      <?php


	$profile_profile = htmlentities($profile_profile);
    $profile_profile = nl2br($profile_profile); 
	$profile_profile = stripslashes($profile_profile);
	echo $profile_profile; ?>
    </td>
  </tr>
</table>

		</section>
		<?php
			include "footer.php";
		?>
	</div>
</body>
</html>