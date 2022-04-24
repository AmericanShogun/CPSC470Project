<?php
/*When the user successfully signs up or logs in,
then the user will be sent to this invisible page to complete
the session variable setting and then be sent to the Home Page.*/
session_start();
require "DBConnection.inc.php";

//we use this join to find all of the data contained for
//each user, including the preferences which are contained
//in the joined table.
$result = $conn->query('SELECT user_ID, username, password,
                          user_Perms, preference
                        FROM Users')
                        or die($conn->error);

$userTableData = [];
$i = 0;
//using this loop we pull all of the data out of the
//query and into an array for use in the rest of the
//sign up checking process.
while ($row = $result->fetch_assoc()) {
  $userTableData[$i] = [$row['user_ID'], $row['username'],
    $row['password'], $row['user_Perms'], $row['preference']];
  $i++;
}
/*This for loop allows us to generate all the session variables
we need for the user*/
for ($i = 0; $i < count($userTableData); $i++){
  if ($_SESSION['userSessionName'] == $userTableData[$i][1]) {
    if ($_SESSION['userSessionPassword'] == $userTableData[$i][2]) {
      //here we set each of the remaining session variables
      //that we can use throughout the pages of the website.
      $_SESSION["userSessionID"] = $userTableData[$i][0];
      $_SESSION["userSessionPermissions"] = $userTableData[$i][3];
      $_SESSION["userSessionPreference"] = $userTableData[$i][4];
      header('Location: http://cpsc.roanoke.edu/~rgbooth/cs470/rgbooth470website/HomePage.php');
      die();
    }
  }
}
