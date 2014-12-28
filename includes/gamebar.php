<div id="gamebar">
	<td width="150" align="right" valign="top" bgcolor="">
		<table width="135" border="0" align="right" cellpadding="0" cellspacing="2" class="table">
			<tr>
				<td class="header">Running Processes</td>
			</tr>
			<tr>
				<td height="128" class="cell"><?php include ('processes.php'); ?></td>
			</tr>
			<tr>
				<td class="header">Player Information</td>
			</tr>
			<tr>
				<td height="19" class="header">Money</td>
			</tr>
			<tr>
				<td height="27" class="cell"><?php echo "&#934;".number_format($money)."";?></td>
			</tr>
			<tr>
				<td height="19" class="header">Hacker Ranking</td>
			</tr>
			<tr>
				<td height="24" class="cell"><?php echo number_format($rank);?></td>
			</tr>
			<tr>
				<td height="19" class="header">Hacker Points</td>
			</tr>
			<tr>
				<td height="19" class="cell"><?php echo $points; ?></td>
			</tr>
			<tr>
				<td class="header">Terminal Information</td>
			</tr>
			<tr>
				<td height="19" class="header">CPU</td>
			</tr>
			<tr>
				<td height="27" class="cell"><?php echo "Coming Soon";?></td>
			</tr>
			<tr>
				<td height="19" class="header">RAM</td>
			</tr>
			<tr>
				<td height="27" class="cell"><?php echo "Coming Soon";?></td>
			</tr>	
			<tr>
				<td height="19" class="header">HDD</td>
			</tr>
			<tr>
				<td height="27" class="cell"><?php echo "Coming Soon";?></td>
			</tr>
			<tr>
				<td height="19" class="header">Internet</td>
			</tr>
			<tr>
				<td height="27" class="cell"><?php echo "Coming Soon";?></td>
			</tr>
		</table>
	</td>
</div>