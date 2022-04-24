<?php

/*This page will allow admin users to view
the list of website users. It also allows admin users
functionality to create new roles, change other
User's roles, delete users, or accept or deny
permission requests from users.*/
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
require "includes/Header.inc.php";
require "includes/DBConnection.inc.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles.css">
</head>
<body>

<?php

if($_SESSION["userSessionPermissions"] == 'admin') {

/*User Data query*/
$result = $conn->query('SELECT user_ID, username, user_Perms, preference
                        FROM Users')
                        or die($conn->error);
/*Roles data query*/
$rolesResult = $conn->query('SELECT * FROM Roles;')
                              or die($conn->error);

/*Role Requests Data Query*/
$userRequestResult = $conn->query('SELECT * FROM UserRequest;')
                                    or die($conn->error);

$userTableData = []; //store the user data
$i = 0; //iterate through the loop

//This array is created to hold all the user data to
//show in the users table.
while ($row = $result->fetch_assoc()) {
  $userTableData[$i] = [$row['user_ID'], $row['username'],
    $row['user_Perms'], $row['preference']];
  $i++;
}

$rolesListData = []; //store list of all roles
$i = 0; //iterate through the loop

//This array is created to hold all the roles that
//need to be shown in the Select Roles dropdown form.
while ($row = $rolesResult->fetch_assoc()) {
  $rolesListData[$i] = [$row['role_ID'], $row['roleName']];
  $i++;
}

$userReqListData = []; //store list of all role requests
$i = 0; //iterate through the loop

//populate the list roleReqListData to fill the table
while ($row = $userRequestResult->fetch_assoc()) {
  $userReqListData[$i] = [$row['request_ID'], $row['usernameReq'],
                          $row['passwordReq'], $row['roleRequest']];
  $i++;


  $rolePermissionsSelectTF = [];
  $rolePermissionsSelectTF[0] = 'true';
  $rolePermissionsSelectTF[1] = 'false';
}

/*This table shows all users and their permission and preference levels*/
?>
<h1 align="center">Manage Users Page</h1>
<br><br><br>

<h2 align="center">All User Role Requests</h2>
<table style="width:100%">
  <tr>
    <th>RequestID</th>
    <th>Username</th>
    <th>Requested Role</th>
    <th>Accept</th>
    <th>Deny</th>
  </tr>
  <?php
  //creates the users table and shows all  users
  //with their information within the table.
  //the table does not show passwords.
  for ($i = 0; $i < count($userReqListData); $i++) {
    echo "<tr>";
    echo "<td>" . $userReqListData[$i][0] . "</td>";
    echo "<td>" . $userReqListData[$i][1] . "</td>";
    echo "<td>" . $userReqListData[$i][3] . "</td>";
    ?>
    <td>
    <form method="post" action="includes/AcceptUserRequest.inc.php">
      <button align="center" name="AcceptUserRequestBtn"
              value="<?php echo $userReqListData[$i][0];?>">Accept New User</button>
    </form>
  </td>
  <td>
  <form method="post" action="includes/DenyUserRequest.inc.php">
    <button align="center" name="DenyUserRequestBtn"
            value="<?php echo $userReqListData[$i][0];?>">Deny New User</button>
  </form>
</td>
            <?php
    echo "</tr>";
  }

  ?>


</table>
<br><br><br>
<h2 align="center">All Users</h2>
<table style="width:100%">
  <tr>
    <th>UserID</th>
    <th>Username</th>
    <th>Role</th>
    <th>Preferences</th>
  </tr>

<?php
//creates the users table and shows all  users
//with their information within the table.
//the table does not show passwords.
for ($i = 0; $i < count($userTableData); $i++) {
  echo "<tr>";
  for ($y = 0; $y < 4; $y++){
    echo "<td>" . $userTableData[$i][$y] . "</td>";
  }
  echo "</tr>";
}

?>

</table>

<br><br><br>
<h2 align="center">Modify Users Permissions</h2>

<form method="post" id="RoleForm" action="includes/SelectRole.inc.php">

  <!--this container holds the User names to modify-->
  <div class="container">
    <h4 align="center">Select a User to Modify:</h4>
    <select class="selectStyles" name="SelectUserForRole"
     id="SelectUserForRole">
      <?php
      //This Select and for loop displays all the users
      //that a user may wish to have their role be modified
      for ($i = 0; $i < count($userTableData); $i++) {?>
        <option value="<?php echo $userTableData[$i][1]; ?>">
          <?php echo $userTableData[$i][1]; ?>
        </option>
      <?php }?>
    </select>
  </div>

  <!--this container holds the Roles to apply to the user-->
  <div align="center" class="container">
    <h4 align="center">Select a Role to give the User:</h4>
    <select class="selectStyles" name="SelectRoleForUser"
     id="SelectRoleForUser">
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
    <br><br>
    <button class="frontPageGoToLoginBtn" action="submit"
     name="UserPermsUpdateSubmit">Confirm Role Change</button>
  </div>
</form>

<br><br><br>
<h2 align="center">Create a New Role</h2>

<form method="post" name="MakeRole" action="includes/CreateRole.inc.php">
  <!--this container holds the text field to input a new role into-->
  <div align="center" class="container">
    <h4 align="center">Enter the name of the new Role:</h4>
      <input type="text" placeholder="Create a Role Name"
       name="MakeRoleName" required>
      <br>
      <h4 align="center">Permissions for Student ID Data Table:</h4>
      <select class="selectStyles" name="SelectStudentIDDataTableTF">
        <option value="true">true</option>
        <option value="false">false</option>
      </select>
      <h4 align="center">Permissions for Course Hours Data Table:</h4>
      <select class="selectStyles" name="SelectCourseHoursDataTableTF">
        <option value="true">true</option>
        <option value="false">false</option>
      </select>
      <h4 align="center">Permissions for Student Grades Data Table:</h4>
      <select class="selectStyles" name="SelectStudentGradesDataTableTF">
        <option value="true">true</option>
        <option value="false">false</option>
      </select>
      <h4 align="center">Permissions for Student Addresses Data Table:</h4>
      <select class="selectStyles" name="SelectStudentAddressesDataTableTF">
        <option value="true">true</option>
        <option value="false">false</option>
      </select>
      <!--This input field and button allows a user to create
          new roles in the database.-->
      <button action="submit" class="frontPageGoToLoginBtn"
        name="makeRoleButton">Confirm New Role</button>
        <br>
      <p5>Role Names must be between 1 and 15 characters long</p5>
  </div>
</form>
<!--spacing so that the last line of text isnt annoyingly far down the screen-->
<br><br><br><br><br>
<?php
} else {

  $servername = "localhost";
  $username = "rgbooth";
  $password = "boothman226";
  $dbname = "rgbooth_db";
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
  }
  /*Roles data query*/
  $rolesResult = $conn->query('SELECT * FROM Roles;')
                                or die($conn->error);

    $rolesListData = [];
    $i = 0;

    //This array is created to hold all the roles that
    //need to be shown in the Select Roles dropdown form.
    while ($row = $rolesResult->fetch_assoc()) {
      $rolesListData[$i] = [$row['role_ID'], $row['roleName']];
      $i++;
    }

  ?>
  <br><br><br>
  <h2 align="center">Request a new Role</h2>

  <form method="post" action="includes/RequestRole.inc.php">

    <!--this container holds the Roles to apply to the user-->
    <div align="center" class="container">
      <h4 align="center">Request a Role that you need:</h4>
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
      <br><br>
      <button class="frontPageGoToLoginBtn" action="submit"
       name="RequestRoleSubmit">Confirm Role Request</button>
    </div>
  </form>
    <?php
}
?>
</body>
</html>
