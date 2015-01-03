<?php
include("db_config.php");
include("functions.php");

if(isset($_SESSION['user_id'])) {
 // Login OK, update last active
 $sql = "UPDATE users SET lastactive=NOW() WHERE id='".($_SESSION['user_id'])."'";
 mysql_query($sql);
}else{
   header("Location: index.php");
   exit();
}

$sql = "SELECT * FROM users WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$id = htmlspecialchars($row->id);
$gameip = htmlspecialchars($row->gameip);
$name = htmlspecialchars($row->username);
$password = htmlspecialchars($row->password);
$mail = htmlspecialchars($row->mail);
$money = htmlspecialchars($row->money);
$exp = htmlspecialchars($row->exp);
$rank = htmlspecialchars($row->rank);
$points = htmlspecialchars($row->points);

if(($row->gameip) == ""){
	$genIP = "".mt_rand(0,255).".".mt_rand(0,255).".".mt_rand(0,255).".".mt_rand(0,255);
	$checkip = "SELECT * from users WHERE gameip='".$genIP."'";
	$checkipres = mysql_query($checkip) or die(mysql_error());
	$ip_check = mysql_num_rows($checkipres);
	if($ip_count >= "1"){
		$genIP = "".mt_rand(0,255).".".mt_rand(0,255).".".mt_rand(0,255).".".mt_rand(0,255);
	}else {
		$sql = "UPDATE users SET gameip='".$genIP."' WHERE id='".($_SESSION['user_id'])."'";
		mysql_query($sql);
	}
}

$sql = "SELECT * FROM sitestats WHERE id='1'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$admins = htmlspecialchars($row->admins);
$mods = htmlspecialchars($row->mods);
$hdo = htmlspecialchars($row->hdo);
$admins_ip = htmlspecialchars($row->admins_ip);
$mods_ip = htmlspecialchars($row->mods_ip);

$admin_array = explode("-", $admins);
$mods_array = explode("-", $mods);
$hdo_array = explode("-", $hdo);
$admin_ip_array = explode("-", $admins_ip);
$mods_ip_array = explode("-", $mods_ip);

$internet_name = array ("Dial Up", "Dial-Up", "Speedbridge", "Super Speedbridge", "Coppercore", "Gold Coppercore", "Multicore Gold", "Footce", "Light Pipe", "Quantum Beams");

$internet_speed = array ("14.4Kbps", "56Kbps","1Mbps","5Mbps","10Mbps","20Mbps","50Mbps","100Mbps","250Mbps","1Tbps");

$internet_speedratio = array ("");

$CPU_name = array ("Pineapple One", "Carrot 10", "Stick 100", "BN£ 1337", "Daisy", "Silicon Chip", "Uber Chip", "Terrachip", "Scotty", "Shofast");

$CPU_speed = array ("1Hz", "10Hz", "100Hz", "1GHz", "10GHz", "100GHz", "1THz", "10THz", "100THz", "1LHz");

$RAM_capacity = array("1 Bit", "1 Byte", "1 Word", "1 Nibble", "1MB", "100MB", "1GB", "100GB", "1TB", "1EB");

$HDD_capacity = array("100MB", "500MB", "1GB", "10GB", "100GB", "1TB", "10TB", "100TB", "1DC", "1QC");

?>