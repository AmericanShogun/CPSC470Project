<?php
/*This file is run when an admin user accepts the request of another
user's role request.*/
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
require "DBConnection.inc.php";

if (isset($_POST['DenyUserRequestBtn'])) {
    $UserRequestedID = $_POST['DenyUserRequestBtn'];

    $sqlDeleteRequest = "DELETE FROM UserRequest
                      WHERE request_ID = '$UserRequestedID'";

    //running the query and printing error messages.
    if (mysqli_query($conn, $sqlDeleteRequest)) {
    } else {
    echo "Error: " . $sqlDeleteRequest . "<br>" . mysqli_error($conn);
    }
    $conn->close();
    /*end database pings*/
}
//send the user back to the manage users page.
header('Location: http://cpsc.roanoke.edu/~rgbooth/cs470/rgbooth470website/ManagePage.php');
die();
