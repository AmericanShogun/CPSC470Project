<?php


require "includes/DBConnection.inc.php";
/*This sign up page is where the user can create a new user account
This page allows the user to input a username and a password.
If the username has already been taken, then the user will
be sent back to this page and can try and make another account.*/

$result = $conn->query('SELECT * from Users');

/*Roles data query*/
$rolesResult = $conn->query('SELECT * FROM Roles;')
                              or die($conn->error);

$rolesListData = []; //store list of all roles
$i = 0; //iterate through the loop

//This array is created to hold all the roles that
//need to be shown in the Select Roles dropdown form.
while ($row = $rolesResult->fetch_assoc()) {
  $rolesListData[$i] = [$row['role_ID'], $row['roleName']];
  $i++;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles.css">
</head>
<body>

<br><br><br><br>

<h2 align="center">Please Create an Account</h2>

<!--This form allows the user to input a username, password, and a confirmed
password, and then  click the button below to submit the account to
attempt to create it.-->
<form action="includes/SignUp.inc.php" align="center" method="post">
  <div class="container">
    <!--Username-->
    <label for="uname"><b>Username: </b></label>
    <input type="text" placeholder="Create a Username" name="username" required>

    <br>

    <!--Password-->
    <label for="psw" id="password1"><b>Password: </b></label>
    <input type="password" placeholder="Create a Password" name="password" required>
    <br>
    <label for="confirmpsw" id="password2"><b>Confirm: </b></label>
    <input type="password" placeholder="Confirm Password" name="confirmpsw" required>

    <br>
    <h6>Choose the role that you need:</h6>
    <select class="selectStyles" name="RequestRole">
      <?php
      //This select and for loop displays all the roles
      //contained in the database so that a user may
      //pick any role to be given to the above selected user.
      for ($i = 0; $i < count($rolesListData); $i++) {?>
        <option value="<?php echo $rolesListData[$i][1]; ?>">
          <?php echo $rolesListData[$i][1]; ?>
        </option>
      <?php }?>
    </select>
    <br>

    <button type="submit" name="signUpSubmit" class="confirmSignUpBtn">Create Account</button>
  </div>
</form>

<!--This button allows the user to move to the login page without backing
out to the index.php page then clicking the login button if the user
already has a working account.-->
<form action="LoginPage.php" align="center" method="post">
  <h5>Already have an account? Sign in here:</h5>
  <div class="container" align="center" style="background-color:#f1f1f1">
    <button type="submit" class="goToLoginBtn">Login</button>
  </div>
</form>

<script>

    // Function to check Whether both passwords
    // is same or not.
    function checkPassword(form) {
        password1 = document.getElementById("password1").value;
        password2 = document.getElementById("password2").value;

        // If password not entered
        if (password1 == '')
            alert ("Please enter Password");

        // If confirm password not entered
        else if (password2 == '')
            alert ("Please enter confirm password");

        // If Not same return False.
        else if (password1 != password2) {
            alert ("\nPassword did not match: Please try again...")
            return false;
        }

        // If same return True.
        else{
            alert("Password Match: Welcome to GeeksforGeeks!")
            return true;
        }
    }
</script>


</body>
</html>
