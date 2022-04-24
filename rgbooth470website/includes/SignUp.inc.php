<?php

/*The user will never actually see this page, it is only used to
check the users input when they attempt to create a new Account
If successful, then the user will be set to the page that
creates the rest of the session variables. If unsuccsessful
then the user will be sent back to the sign up page.*/
session_start();
require "DBConnection.inc.php";

if (isset($_POST['signUpSubmit'])) {

  /*Sign Up Input*/
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirmPass = $_POST['confirmpsw'];
  $roleRequested = $_POST['RequestRole'];

  /*check to ensure matching passwords*/
  if ($password == $confirmPass) {

    /*begin database pings*/
    $result = $conn->query('SELECT user_ID, username FROM Users;');

    $sameName = 'false'; //keeps a bool that tells the
                         //program if the name conflicts
    $userData = []; //store the user data.
    $i = 0; //iterate through it in the loop.

    //this array takes all the data into an array that we can
    //use to check against the user's input.
    while ($row = $result->fetch_assoc()) {
      $userData[$i] = [$row['user_ID'], $row['username']];
      $i++;
    }
    //This array checks to make sure that the user does not
    //attempt to enter a username that has already been used.
    for ($y = 0; $y < count($userData); $y++) {
      if($username == $userData[$y][1]) {
        $sameName = 'true';
        header('Location: http://cpsc.roanoke.edu/~rgbooth/cs470/DragonBaseQueries/rgbooth470website/SignUpPage.php');
        die();
      }
    }

    /*This query pushes the request into the database.*/
    if ($sameName == 'false') {
      $sqlNewUser = "INSERT INTO UserRequest (usernameReq, passwordReq, roleRequest)
                    VALUES ('$username', '$password', '$roleRequested');";
      if (mysqli_query($conn, $sqlNewUser)) {
      } else {
        echo "Error: " . $sqlNewUser . "<br>" . mysqli_error($conn);
      }
    }
  }
}
//set session variables, disconnect from the database, and
//send to the next page.
$_SESSION["userSessionName"] = $username;
$_SESSION["userSessionPermissions"] = $roleRequested;
$result->free();
$conn->close();
header('Location: http://cpsc.roanoke.edu/~rgbooth/cs470/DragonBaseQueries/rgbooth470website/UserRequestSuccessPage.php');
die();
