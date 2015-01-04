<?php
	define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"]);
	define('INCLUDES_PATH', ROOT_PATH.'/includes/');
	// Establishing Connection with Server by passing server_name, user_id and password as a parameter
	$connection = mysql_connect("localhost", "gameuser", "me9yqabav");
	// Selecting Database
	$db = mysql_select_db("zadmin_elitenation", $connection);
	session_start();// Starting Session
	// Storing Session
	$user_check=$_SESSION['login_user'];
	// SQL Query To Fetch Complete Information Of User
	$ses_sql=mysql_query("select username, id from users where username='$user_check'", $connection);
	$row = mysql_fetch_assoc($ses_sql);
	$login_session =$row['username'];
	$_SESSION['user_id']=$row['id'];
	if(!isset($login_session)){
		mysql_close($connection); // Closing Connection
		header('Location: index.php'); // Redirecting To Home Page
	}
	include INCLUDES_PATH . 'head.php';
	include INCLUDES_PATH . 'threatlevel.php';
	include INCLUDES_PATH . 'sidemenu.php';
	require INCLUDES_PATH . 'variables.php';
	include INCLUDES_PATH . 'gamebar.php';
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
				<table id="logTable" width="90%" border="0" align="center">
  					<tr>
  						<td align="center" ><textarea style="width:100%; height:400px; resize:none" name="updateLogContents"></textarea></td>
  					</tr>
  					<tr>
  						<td colspan="2" align="center" valign="top" id="AntiLogBot"> AntiBot System Please Wait...</td>
  						<script>
  							function loadXMLDoc()
  							{
  								var xmlhttp;
  								if (window.XMLHttpRequest)
  								{// code for IE7+, Firefox, Chrome, Opera, Safari
  									xmlhttp=new XMLHttpRequest();
  								} else {// code for IE6, IE5
  									xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  								}
  								xmlhttp.onreadystatechange=function()
  								{
  									if (xmlhttp.readyState==4 && xmlhttp.status==200)
  									{
  										document.getElementById("AntiLogBot").innerHTML=xmlhttp.responseText;
  									}
  								}
  								xmlhttp.open("GET","AntiLogBot.txt",true);
  								xmlhttp.send();
  							}
  						</script>
  						<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  						<script type="text/javascript">
  							$(document).ready(function(){
  								setTimeout(function() { 
  									loadXMLDoc();
  								}, 5000);
  							});
  						</script>
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