<?php
/*The user will see this page after a successful account creation .*/
session_start();

$username = $_SESSION["userSessionName"];
$roleRequested = $_SESSION["userSessionPermissions"];

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles.css">
</head>

<h2 align="center">Account Creation Request successful!</h2><br>
<b1 align="center">Your username is:<?php echo $username;?></b1>
<b1 align="center">Your role that you requested is:
  <?php echo $roleRequested;?></b1>

<form action="LoginPage.php" method="post" align="center">
  <h5>If you already have an account, Login here:</h5><br>
  <div class="container" align="center" style="background-color:#f1f1f1">
    <button type="submit" class="frontPageGoToLoginBtn">Login</button>
  </div>

  <br>
</form>
