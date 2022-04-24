<?php
/*This is the first page that anyone will see when they
enter the website, it allows the user to choose between
logging in or signing up*/

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles.css">
</head>
<body>

<br><br><br><br>

<!--Little form and button allows the user to be sent to the
Login page.-->
<h2 align="center">Welcome to the website for CS 470! Please, Login or Create an Account.</h2>
<form action="LoginPage.php" method="post" align="center">
  <h5>If you already have an account, Login here:</h5><br>
  <div class="container" align="center" style="background-color:#f1f1f1">
    <button type="submit" class="frontPageGoToLoginBtn">Login</button>
  </div>

  <br>
</form>

<!--Little form and button allows the user to be sent to the
Sign up page to create a new account.-->
<form action="SignUpPage.php" method="post" align="center">
  <h5>If you do not have an account, Sign up here:</h5><br>
  <div class="container" align="center" style="background-color:#f1f1f1">
    <button type="submit" class="frontPageGoToSignUpBtn">Create Account</button>
  </div>
</form>
</body>
</html>
