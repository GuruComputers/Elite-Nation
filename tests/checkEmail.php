<?php

function checkEmail($str)
{
     return preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $str);
}


if (isset($_POST['Register'])) {
    if(!checkEmail($_POST['Email']))
    {
        echo 'Your email is not valid!';
    }else{
    // Removed Database Connection for test purposes
    echo "Function Pass";
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