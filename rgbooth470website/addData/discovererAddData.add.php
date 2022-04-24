
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

<h1> Welcome to the Discoverers Add Data Page <h2>

<form id="discovererAddDataSingleForm" action="includes/confirmDiscovererAddData.inc.php" method="post" style="display: block">
  <fieldset>
    <legend>Add a Row of Discoverers Data:</legend>
    <input type="text" id="discoverers_first_name" name="first_name" placeholder="Discoverer's First Name">
    <input type="text" id="discoverers_last_name" name="last_name" placeholder="Discoverer's Last Name">
  </fieldset>
  <input type="button" onClick=updateData(this.form) value="Confirm New Discoverers Row">
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
