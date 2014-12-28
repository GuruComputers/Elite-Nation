<?php include_once("variables.php"); ?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/main.css" />
	</head>
	<body id="sidebar">
		<table width="0%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td align="left" valign="top">
					<table width="75%" height="301" border="0" align="left" cellpadding="0" cellspacing="2" class="table">

						<tr> <!-- Main Game Links -->
							<td height="23" class="header">Main Game</td>
						</tr>
						<tr>
							<td height="65" valign="top" class="cell">
								<a href="gamemanual.php">Game Manual</a><br />
								<a href="Find_Player.php">Find a Player</a><br />
								<a href="clans.php">Clans</a><br />
								<a href="../logout.php">Logout</a><br />
							</td>
						</tr>

						<tr class="header"> <!-- Social Interaction Links -->
							<td height="23">Social</td>
						</tr>
						<tr>
							<td height="128" valign="top" class="cell">
								<a href="http://www.hitech4all.co.uk/forum" target="_blank">Forum</a><br />
								<a href="../inbox.php">Inbox (<?php include('messagecount.php'); ?>)</a><br />
								<a href="../Send_Message.php">Send a Message</a><br />
							</td>
						</tr>

						<?php
							if (in_array($name, $admin_array) or in_array($name, $mods_array)){
								include('staffmenu.php');
							}
						?>