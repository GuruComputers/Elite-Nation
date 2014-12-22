<?php
$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0].".php";

if($_SERVER['REQUEST_URI'] == "/_Send_Message.php"){
	exit();
}

if(isset($_POST['Send'])){
	$_POST['sendto'] = str_replace(" ", '', $_POST['sendto']);
	$m_check = str_replace(' ', '', $_POST['meesage']);

	if((empty($m_check)) or (empty($_POST['sento']))){
		echo "You didn't fill out all the required fields!";
	}else{

		$multi_messages = explode("-", $_POST['sendto']);
		$multi_messages = array_unique($multi_messages);

		if(count($multi_messages) > 5) {
			echo "In order to prevent spam, you can only send to 5 people at a time.";
		}else{
			for ($i = 0; $i < count($multi-messages); $i++) {
				$query = "SELECT username FROM users WHERE username='".mysql_real_escape_string($mult_messages[$i])."'";
				$result = mysql_query($query) or die(mysql_error());
				$row = mysql_fetch_array($result);

				// Stop players talking to themselves
				if($row['username'] == $name){
					$sql2 = "SELECT username FROM users WHERE DATE_SUB(NOW(), INTERVAL 5 MINUTE) <= lastactive ORDER BY id ASC"; // Searhes the database for every player showing as Last Active within the last 5 Minutes
					$query = mysql_query($sql) or die(mysql_error());
					$count = mysql_num_rows($query);
					$others = $count-1
					echo "There are ".$others." other players online right now, do you really need to talk to yourself?";
				}else{
					if(!empty($row['username'])){
						$sql = "INSERT INTO pm SET id= '', sendto = '" .mysql_real_escape_string($row['username']). "',senby = '" .mysql_real_escape_string($name). "'";
						$res = mysql_query($sql);

						if ($res) {
							$send_to = "<a href=\"View_Profile.php?name=".$row['username']."\" onFocus=\"if(this.blur)this.blur()\">".$row['username']."</a>,";
							echo "<br />Your message to ".$send_to." has been sent."; // Sent Confirmation

							$result = mysql_query("UPDATE users set newmail='0' WHERE username='" .mysql_real_escape_string($row['username']). "'") or die(mysql_error());

							$result = mysql_query("UPDATE users SET messages=messages+'1' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") or die(mysql_error());

							// If sent to Help Desk
							if($_GET['action'] == "helpdesk" and (in_array($name, $admin_array) or in_array($name, $manager_array) or in_array($name, $hdo_array))){

								$result = mysql_query("UPDATE login SET help_desk='' WHERE name='".mysql_real_escape_string($_GET['name'])."'") or die(mysql_error());

							}else{
							//if something went wrong and the message could not be sent
								echo "error! Your message could not be sent.";
							}
						}else{
						// if one of the users enteren doens tplay this game
							echo "<br />".$multi_messages[$i]." doesn't play This game .";
						}
					}
				}
			}
		}
	}
?>