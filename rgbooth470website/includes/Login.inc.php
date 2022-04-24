<?php
/*The user will never see this page, it is only used to
check the input that the user gives when the user
attempts to login, and sets the first two session variables
If the user successfully logs in, then the next page they will
be sent to is also an invisible page, used only for setting the
remaining session variables. If the login attempt is invalid
Then the user will be sent back to this page.*/
session_start();
require "DBConnection.inc.php";

if (isset($_POST['loginSubmit'])) {

  /*begin database pings*/

  $result = $conn->query('SELECT user_ID, username, password FROM Users;');
  /*end database pings*/

  $userData = []; //store the user data.
  $i = 0; //iterate through it in the loop.

  //creates an array of the data that we have selected from the DB
  while ($row = $result->fetch_assoc()) {
    $userData[$i] = [$row['user_ID'], $row['username'], $row['password']];
    $i++;
  }

  $username = $_POST['uname'];
  $password = $_POST['psw'];
  $sameName = 'false';
  $samePass = 'false';

  //checks to see if the username and password entered by the user
  //are correct within the database
  for ($y = 0; $y < count($userData); $y++) {
    if($username == $userData[$y][1]) {
      $sameName = 'true';
    }
    if ($password == $userData[$y][2]) {
      $samePass = 'true';
    }
  }

  if ($sameName == 'true' && $samePass == 'true') {
    //the user has entered valid credentials.
    //session variables will be set with what the user entered
    //then the user will be sent to the next file which
    //sets the remainder of the session variables needed for
    //that user.
    $_SESSION["userSessionName"] = $username;
    $_SESSION["userSessionPassword"] = $password;
    header('Location: http://cpsc.roanoke.edu/~rgbooth/cs470/rgbooth470website/includes/SetSession.inc.php');
    die();
  } else {
    //the user has entered invalid credentials.
    //the user will be sent back to the login page.
    header('Location: http://cpsc.roanoke.edu/~rgbooth/cs470/rgbooth470website/LoginPage.php');
    die();
  }
}
