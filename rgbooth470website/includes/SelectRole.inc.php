<?php

/*The user will never see this page,  it is only used if the
user attempts to change a user's role to something else.*/
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
require "DBConnection.inc.php";

if (isset($_POST['UserPermsUpdateSubmit'])) {
  $username = $_POST['SelectUserForRole'];
  $newRole = $_POST['SelectRoleForUser'];

  $result = $conn->query('SELECT * FROM Roles;');

  $userData = [];
  $i = 0;
  while ($row = $result->fetch_assoc()) {
    $userData[$i] = [$row['role_ID'], $row['roleName']];
    $i++;
  }

  /*This is the query that updates the users role to the new one.*/
  $sqlNewRole = "UPDATE Users SET user_Perms = '$newRole'
                WHERE username = '$username'";

//running the query and printing error messages.
  if (mysqli_query($conn, $sqlNewRole)) {
  } else {
  echo "Error: " . $sqlNewRole . "<br>" . mysqli_error($conn);
  }
  $result->free();
  $conn->close();
  /*end database pings*/
}
//send the user back to the manage users page.
header('Location: http://cpsc.roanoke.edu/~rgbooth/cs470/DragonBaseQueries/rgbooth470website/ManagePage.php');
die();
