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
require("includes/_Send_Message.php");
?>

<form id="messageform" name="messageform" method="post">
<table width="90%" border="1" >
  <tr>
    <td colspan="2" align="left" >Send Letter: </td>
    </tr>
  <tr>
    <td width="75" align="left" ><b>Send to: </b></td>
    <td width="475" align="center" ><input name="sendto" type="text"  style='width: 98%; ' value='<?php echo htmlspecialchars($_GET['name']);?>' maxlength="110" /></td>
  </tr>
  <tr>
    <td width="75" align="left" valign="top" ><b>Message: </b></td>
    <td width="475" align="center" ><textarea name="message" rows="10"><?php 

if($_GET['action'] == "helpdesk" and (in_array($name, $admin_array) or in_array($name, $manager_array) or in_array($name, $hdo_array))){

$sql = "SELECT help_desk FROM users WHERE name='".mysql_real_escape_string($_GET['name'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$help_desk = htmlspecialchars($row->help_desk);

echo "

[hr][b]Your questions was:[/b]

".stripslashes($help_desk);

}


if (!empty($_GET['reply'])){

$query = "SELECT * FROM pm WHERE id='".mysql_real_escape_string($_GET['reply'])."'"; 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);

if($row['sendto'] != $name){
echo "You are not allowed to view this information.";}
else {
echo "

";// empty line at reply.
echo "[b]".htmlspecialchars($row['sendby'])." wrote:[/b]";
echo "
";
echo htmlspecialchars(stripslashes($row['message']));
}// if not your reply.
}
	?></textarea></td>
  </tr>
  <tr>
    <td colspan="2" align="right" valign="top" ><input name="Send" type="submit" value="Send."  onfocus="if(this.blur)this.blur()"/></td>
  </tr>
</table>
<p>&nbsp;</p>
<br />
</form>
</section>
		<?php
			include "footer.php";
		?>
	</div>
</body>
</html>

