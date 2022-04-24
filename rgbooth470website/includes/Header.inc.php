<?php
/*This file is used to display the header
The user will never actually reach this file while navigating
through the page, the user will only see the header above each
page as it is included.*/
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles.css">
</head>
<body>
    <!--The header, nav, and blocks are used mainly to setup
        the header format and to get styles correct.-->
<header>
  <div class="container">
    <nav>
      <blocks>
        <!--each item is a link to anther page in the website.-->
        <item><a href="http://cpsc.roanoke.edu/~rgbooth/cs470/rgbooth470website/HomePage.php">View Data Tables</a></item>
        <item><a href="http://cpsc.roanoke.edu/~rgbooth/cs470/rgbooth470website/AddNewData.php">Add New Data</a></item>
        <item><a href="http://cpsc.roanoke.edu/~rgbooth/cs470/rgbooth470website/addNewBigData.php">Add Dynamic Data</a></item>
        <item><a href="http://cpsc.roanoke.edu/~rgbooth/cs470/rgbooth470website/ManagePage.php">Manage Users</a></item>
        <item><a href="http://cpsc.roanoke.edu/~rgbooth/cs470/rgbooth470website/includes/Logout.inc.php">Logout</a></item>
      </blocks>
    </nav>
  </div>
</header>
