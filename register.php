<?php
include('login.php'); // Includes Login Script
if(!$_SESSION['login_user']==""){
  header('Location: profile.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Elite Nation</title>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
  <?php
    $fire = strpos ($_SERVER['HTTP_USER_AGENT'],"Mobile");
    if ($fire == true) 
      {
        echo "<script>window.location='fire.php'</script>";
      }
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
    <header>
    <div id="mobile-logo">
      <a href="index.php"><img class="logo" src="img/logo.png" alt="Elite Nation Logo" /></a>
    </div>
      <br class="anti-oops" />
      <form id="login" action="" method="post">
        <div id="mobile-user">
          <label>User Name :</label>
          <input id="name" name="username" placeholder="username" type="text">
        </div>
        <div id="mobile-password">
          <label>Password :</label>
          <input id="password" name="password" placeholder="**********" type="password">
        </div>
        <input name="submit" type="submit" value=" Login " id="submit_button">
        <br />
        <ul class="user-tools">
          <li><a href="register.php">Register Now</a></li>
          <li><a href="forgot.php">Forgotten Password?</a></li>
        </ul>
      </form>
    </header>
    <section>
      <center>
        <?php

include_once('includes/db_config.php');
require 'includes/functions.php';

?>
<?php
if (isset($_POST['Register'])) {
if(strlen($_POST['Username'])<3 || strlen($_POST['Username'])>32)
    { // This check the characters of the username and it makes sure if it is longer that 3 letters.
        echo 'Your name must be between 3 and 32 characters!';
    }else{

    if(empty($_POST['Password'])){ // This checks the password field to see if it is empty
        echo 'You need to select a password!';
    }else{
    if(preg_match('/[^a-z0-9\-\_\.]+/i',$_POST['Username']))
    {// this checks the user for any symbols space etc .You can remove this is you choose
        echo 'Your name contains invalid characters!';
    }else{
    if(!checkEmail($_POST['Email']))
    { // this is one of the functions we added on the function page. for this to work make sure the function is required on this page
        echo 'Your email is not valid!';
    }else{

if(empty($_POST['Agree'])){ // Check if the Checkbox is checked to agree with the terms of services

echo "You need to accept the Terms & conditions  in order to sign up.!";

}else{
// this check and makes sure that their are no duplication with the email

$sql = "SELECT id FROM users WHERE mail='".mysql_real_escape_string($_POST['Email'])."'";
$query = mysql_query($sql) or die(mysql_error());
$m_count = mysql_num_rows($query);
if($m_count >= "1"){
echo 'This email has already been used.!';
}else{
// this makes sure that all the uses that sign up have their own names
$sql = "SELECT id FROM users WHERE username='".mysql_real_escape_string($_POST['Username'])."'";
$query = mysql_query($sql) or die(mysql_error());
$m_count = mysql_num_rows($query);
if($m_count >= "1"){
echo 'This name has already been used.!';
}else{
$hash = md5($_POST['Email']); // Generate 32 character hash from email address
$password = md5($_POST['Password']); // this is a md5 hash. its encrypt your password so it isnt easily hackable
// The id is blank because it is an auto_increment  which mean it will auto add a value to every user and the are all different. this is mainly so we dont have dupilcate.
$sql = "INSERT INTO users SET id = '', username = '".$_POST['Username']."' , password= '$password', mail= '".$_POST["Email"]."', hash= '$hash'";
$res = mysql_query($sql);
$to = $_POST['Email'];
    $from = "no-reply@gurucomputers.co.uk";
    $subject = "Registration - Your Registration Details";
    $message = "<html>
   <body background=\"#4B4B4B\">
   <h1>Game Registration Details</h1>
   Dear ".$_POST['Username'].", <br>
    <center>
Your Username: ".$_POST['Username']."<p>
 
Your Password: ".$_POST['Password']."<p>

Please click this link to activate your account:
http://www.gurucomputers.co.uk/game/verify.php?hash=$hash

      <p>
      <font size=3> You received this mail because someone used this email address to sign up to Elite Nation</font>
  </body>
</html>";
    
    $headers  = "From: Game Registration Details <no-reply@gurucomputers.co.uk>\r\n";
    $headers .= "Content-type: text/html\r\n";
 
    mail($to, $subject, $message, $headers);            
 
echo "".$_POST['Username'].", Welcome to the game.";
}}}
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
      I Agree to the Terms & Conditions
      <input type="checkbox" name="Agree" id="Agree">
      <br /><br />
      <input type="submit" name="Register" id="Register" value="Register">
    </p>
  </center>
</form>
      </center>
    </section>
    <?php
      include "footer.php";
    ?>
  </div>
</body>
</html>