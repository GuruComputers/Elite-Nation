<?php

    $to = $_POST['Email'];
    $from = "no-reply@elitenation.co.uk";
    $subject = "Test Results for send_mail";
    $message = "<html>
   <body background=\"#4B4B4B\">
   <h1>Game Registration Details</h1>
   <p>As you can see, the send_mail function works, please report your findings on the sheet!</p>
  </body>
</html>";
    
    $headers  = "From: Test Results <no-reply@elitenation.co.uk>\r\n";
    $headers .= "Content-type: text/html\r\n";
 
    mail($to, $subject, $message, $headers); 

    echo "Email Sent!";

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

<p>
  This function passes the inputed Email to a variable Called $to, sets $from to equal "no-reply@elitenation.co.uk"
</p>
<p>
  $subject is set to "Test Results for send_mail" and $message to "As you can see, the send_mail function works, please report your findings on the sheet!"
</p>
<br /><br />
<p>
  Syntax for calling:- mail($to,$subject, $message, $headers)
</p>