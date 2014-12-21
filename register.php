<?php

include_once('includes/db_config.php');
require 'functions.php';

?>
<?
if (isset($_POST['Register'])) {
if (strlen($_POST['Username'])<3 || strlen($_POST['Username'])>32)
    {
        echo 'Your name must be between 3 and 32 characters!';
    } else {
    if (empty($_POST['Password'])){ 
        echo 'You need to select a password!';
    } else {
    if (preg_match('/[^a-z0-9\-\_\.]+/i',$_POST['Username']))
    {
        echo 'Your name contains invalid characters!';
    } else {
    if (!checkEmail($_POST['Email']))
    { 
        echo 'Your email is not valid!';
    } else {
$password = md5($_POST['Password']);
$sql = "INSERT INTO users SET id = '', name = '".$_POST['Username']."' , password= '$password', mail= '".$_POST["Email"]."'";
$res = mysql_query($sql);
 
echo "".$_POST['Username'].", Welcome to Elite Nation!";
                        }
 
                    }
            }
    }
}
 
?>

<form method="post">
  <center>
    <h1><strong>Register</strong></h1>
    <p>UserName:
      <input type="text" name="Username" id="Username">
    </p>
    <p>Password:
      <input type="password" name="Password" id="Password">
    </p>
    <p>Email:
      <input type="text" name="Email" id="Email">
    </p>
    <p>
      <input type="checkbox" name="Agree" id="Agree">
      <br>
<input type="submit" name="Register" id="Register" value="Register">
    </p>
  </center>
</form>