<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
/*This file will not be seen by the user.
This file is run when the user attempts to add
a new role to the Roles table.
The program will either add the role to the table
and then send the user back to the Manage Users page,
Or the checks will fail and the user will be sent back
to the Manage Users Page without adding the role.*/
session_start();
require "DBConnection.inc.php";

if (isset($_POST['makeRoleButton'])) {

  $newRoleName = $_POST['MakeRoleName'];
  $IDTablePerms = $_POST['SelectStudentIDDataTableTF'];
  $CourseHoursTablePerms = $_POST['SelectCourseHoursDataTableTF'];
  $GradesTablePerms = $_POST['SelectStudentGradesDataTableTF'];
  $AddressesTablePerms = $_POST['SelectStudentAddressesDataTableTF'];

  /*begin database pings*/
  $result = $conn->query('SELECT * FROM Roles;');
  /*end database pings*/

  $sameName = 'false'; //keeps a bool that tells the
                       //program if the name conflicts
                       //with an existing role
  $roleData = []; //store the user data.
  $i = 0; //iterate through it in the loop.

  //use the loop to put all the data we need to check against into an array.
  while ($row = $result->fetch_assoc()) {
    $roleData[$i] = [$row['role_ID'], $row['roleName']];
    $i++;
  }

  //check against all the existing data here.
  for ($y = 0; $y < count($roleData); $y++) {
    if ($newRoleName == $roleData[$y][1]) {
      //Role name already exists, send back to Manage page and do not add role
      $result->free();
      $conn->close();
      $sameName = 'true';
      header('Location: http://cpsc.roanoke.edu/~rgbooth/cs470/rgbooth470website/ManagePage.php');
      die();
    }
  }
  if ($sameName == 'false') {
    if (strlen($newRoleName) <= 15) {
      if (strlen($newRoleName) > 0) {
        //Role does not already exist. Add Role.
        $sqlNewRole = "INSERT INTO Roles (roleName,
                            IDTablePerm, CourseHoursTablePerm,
                            GradesTablePerm, AddressesTablePerm)
                      VALUES ('$newRoleName', '$IDTablePerms',
                              '$CourseHoursTablePerms',
                              '$GradesTablePerms',
                              '$AddressesTablePerms')";

                  //running the query and printing error messages.
        if (mysqli_query($conn, $sqlNewRole)) {
        } else {
          echo "Error: " . $sqlNewRole . "<br>" . mysqli_error($conn);
        }
      }
    }
  }
  $result->free();
  $conn->close();
  /*end database pings*/
}
//send the user back to the manage users page.
header('Location: http://cpsc.roanoke.edu/~rgbooth/cs470/DragonBaseQueries/rgbooth470website/ManagePage.php');
die();
