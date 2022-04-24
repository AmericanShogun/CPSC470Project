<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles.css">
</head>
<body>

<br><br><br><br><br><br><br><br>

<h2 align="center">Please Login to Access Your Account</h2>

<!--Login Forms allows user input for their username and
their password to login-->
<form action="includes/Login.inc.php" method="post" align="center">
  <div class="container">
    <label for="uname"><b>Username: </b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
    <br>
    <label for="psw"><b>Password: </b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <br>
    <button type="submit" name='loginSubmit' class="confirmLoginBtn">Login</button>
  </div>
</form>

<!--Send To Sign Up Page Button
if the user needs to create a new account they can click
this button to be sent to the sign up page.-->
<form action="SignUpPage.php" align="center" method="post">
  <h5>Don't have an account? Make one here:</h5>
  <div class="container" align="center" style="background-color:#f1f1f1">
    <button type="submit" class="goToSignUpBtn">Create Account</button>
  </div>
</form>
</body>
</html>
