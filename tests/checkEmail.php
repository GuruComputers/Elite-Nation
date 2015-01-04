<?php

require('../includes/functions.php');


if (isset($_POST['Register'])) {
    if(!checkEmail($_POST['Email']))
    {
        echo 'Your email is not valid!';
    }else{
    // Removed Database Connection for test purposes
    echo "Function Pass";
}
}
?>


<form method="post">
  <center>
    <h1><strong>Register</strong></h1>
    <p>Email:
      <input type="text" name="Email" id="Email">
    </p>
    <p>
      <br /><br />
      <input type="submit" name="Register" id="Register" value="Register">
    </p>
  </center>
</form>