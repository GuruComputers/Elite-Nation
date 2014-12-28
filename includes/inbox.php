<?php
$page_url = explode(".", $_SERVER['REQUEST_URI']);

if($_SERVER['REQUEST_URI'] == "/includes/inbox.php"){
	exit();
}

if(isset($_POST['Clean'])) // Delete All Messages Function
{
	$result = mysql_query("UPDATE pm SET del='2' WHERE sendto = '".mysql_real_escape_string($name)."'") or die(mysql_error());
	echo "Your Inbox has been Emptied.";
}

if(!empty($_GET['delete'])) // Delete Message Function
{
	$result = mysql_query("UPDATE pm SET del='2' WHERE sendto = '".mysql_real_escape_string($name)."' and id='" .mysql_real_escape_string($_GET['delete']). "'") or die(mysql_error());
}

if(isset($_POST['Delete'])){

	$id = $_POST['id'];
	if(!empty($id)){
		$delete = implode(",",$id);
		$delete = explode(",",$delete);
		for($a = 0; !empty($delete[$a]);$a++){
			$result = mysql_query("UPDATE pm SET del='2' WHERE sendto = '".mysql_real_escape_string($name)."' and id='" .mysql_real_escape_string($delete[$a])."'") or die(mysql_error());
		}
			echo "All Selected Messages have been Deleted.";
	}else {
		echo "You didn't select any messages. Can't delete thin air ya know!";
	}
}
?>