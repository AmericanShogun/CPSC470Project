<?php
/*This file is run when an admin user accepts the request of another
user's role request.*/
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
require "DBConnection.inc.php";

if (isset($_POST['AcceptUserRequestBtn'])) {
    $UserRequestedID = $_POST['AcceptUserRequestBtn'];

    $result = $conn->query('SELECT * FROM UserRequest;');

    $userReqData = []; //store the user data.
    $i = 0; //iterate through it in the loop.

    //use the loop to put all the data we need to check against into an array.
    while ($row = $result->fetch_assoc()) {
      $userReqData[$i] = [$row['request_ID'], $row['usernameReq'],
        $row['passwordReq'], $row['roleRequest']];
      $i++;
    }

    /*This while loop searches through the data to find the Request ID
    To set the variables of the Requestee and the role Requested*/
    for ($y = 0; $y < count($userReqData); $y++) {
      if ($UserRequestedID == $userReqData[$y][0]) {
        $userRequested = $userReqData[$y][1];
        $passwordRequested = $userReqData[$y][2];
        $roleRequested = $userReqData[$y][3];
      }
    }

    $sqlNewUser = "INSERT INTO Users (username, password,
                    user_Perms, preference)
                  VALUES ('$userRequested',
                    '$passwordRequested', '$roleRequested', 20);";

    //running the query and printing error messages.
    if (mysqli_query($conn, $sqlNewUser)) {
    } else {
    echo "Error: " . $sqlNewUser . "<br>" . mysqli_error($conn);
    }

    $sqlDeleteRequest = "DELETE FROM UserRequest
                      WHERE request_ID = '$UserRequestedID'";

    //running the query and printing error messages.
    if (mysqli_query($conn, $sqlDeleteRequest)) {
    } else {
    echo "Error: " . $sqlDeleteRequest . "<br>" . mysqli_error($conn);
    }
    $result->free();
    $conn->close();
    /*end database pings*/
}
//send the user back to the manage users page.
header('Location: http://cpsc.roanoke.edu/~rgbooth/cs470/rgbooth470website/ManagePage.php');
die();
