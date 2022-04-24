
<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
/*This page displays all information that is on the
table named StudentIDData*/
  require "../includes/Header.inc.php";
  require "../includes/DBConnection.inc.php";
  session_Start();



?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../styles.css">
</head>
<body>

<h1> Welcome to the Tale Locations Add Data Page <h2>

<form id="taleLocationAddDataSingleForm" action="includes/confirmTaleLocationAddData.inc.php" method="post" style="display: block">
  <fieldset>
    <legend>Add a Row of taleLocation Data:</legend>
    <input type="text" id="latitude" name="latitude" placeholder="Lattitude">
    <input type="text" id="longitude" name="longitude" placeholder="Longitude">
    <input type="text" id="fkey_reference" name="fkey_reference" placeholder="Reference">
    <input type="text" id="City" name="City" placeholder="City">
  </fieldset>
  <input type="button" onClick=updateData(this.form) value="Confirm New Tale Location Row">
</form>
</body>
</html>

<script>
//PRE: The form has been filled and is awaiting submission
//POST: The form has been submitted to
//      confirmEditCourseHoursData.inc.php,
//      and is sent to the database.
function updateData(form) {
  form.submit();
}
</script>
