<?php
/*This File runs the query to submit a user's role
request.*/
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
require "DBConnection.inc.php";

if (isset($_POST['RequestRoleSubmit'])) {
  /*Set the variables that the user wants to submit.
  Will be used for checking later.*/
  $roleRequested = $_POST['RequestRole'];
  $requestee = $_SESSION['userSessionName'];

  $result = $conn->query('SELECT * FROM RoleRequest;');

  $roleData = []; //store the user data.
  $i = 0; //iterate through it in the loop.

  //use the loop to put all the data we need to check against into an array.
  while ($row = $result->fetch_assoc()) {
    $roleData[$i] = [$row['request_ID'], $row['usernameRequested'],
      $row['roleName']];
    $i++;
  }

  $sameName = 'false'; //keeps a bool that tells the
                       //program if the name conflicts
                       //with an existing user who has
                       //submitted a role request.

  //check against all the existing data here.
  for ($y = 0; $y < count($roleData); $y++) {
    if($requestee == $roleData[$y][1]) {
      //If Requestee already exists in the requestee database, do not accept new
      //role request
      $result->free();
      $conn->close();
      $sameName = 'true';
      Header('Location: http://cpsc.roanoke.edu/~rgbooth/cs470/DragonBaseQueries/rgbooth470website/ManagePage.php');
      die();
    }
  }

  if ($sameName == 'false') {
    $sqlRequestRole = "INSERT INTO RoleRequest (usernameRequested, roleName)
                        VALUES ('$requestee', '$roleRequested')";

    //running the query and printing error messages.
    if (mysqli_query($conn, $sqlRequestRole)) {
    } else {
    echo "Error: " . $sqlRequestRole . "<br>" . mysqli_error($conn);
    }
    $conn->close();
  }
}

//send the user back to the manage users page.
header('Location: http://cpsc.roanoke.edu/~rgbooth/cs470/DragonBaseQueries/rgbooth470website/ManagePage.php');
die();
