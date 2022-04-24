<?php
/*This page allows the user to change their viewing preference
for the tables on the Home Page.*/
session_start();
require "includes/Header.inc.php";

$PrefValue = $_SESSION["userSessionPreference"];
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles.css">
</head>
<body>

<h1 align="center">Your Preferences Page</h1>
<div class="container">
  <h2 align = "center">Current View Preference: </h2>
  <h2 align="center"><?php
  //This value is the current session user's preferred Preference value
   echo $PrefValue;
   ?></h2>
</div>
<h2 align="center">Please Select the number of rows you wish to view</h2>

<!--This form allows the user to pick the amount of rows
    they wish to view on the Home page.-->
<form action="includes/Preferences.inc.php" align="center" method="post">
  <div class="container">
    <select class="selectStyles" name="preferences" id="preferences">
      <option value=20>20 Rows</option>
      <option value=50>50 Rows</option>
      <option value=100>100 Rows</option>
      <option value=200>200 Rows</option>
      <option value=500>500 Rows</option>
    </select>
  </div>
  <br><br><br><br>
  <button class="frontPageGoToLoginBtn" action="button"
    name="changePreferenceButton"> Confirm New Preference</button>
</form>

</body>
</html>
