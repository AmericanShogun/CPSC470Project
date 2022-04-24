
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

<h1> Welcome to the Refer Table Add Data Page <h2>

<form id="referAddDataSingleForm" action="includes/confirmReferAddData.inc.php" method="post" style="display: block">
  <fieldset>
    <legend>Add a Row of refer Data:</legend>
    <input type="text" id="fkey_publisher_id" name="fkey_publisher_id" placeholder="Publisher ID">
    <input type="text" id="title" name="title" placeholder="Title">
    <input type="text" id="publish_date" name="publish_date" placeholder="Publish Date">
    <input type="text" id="access_date" name="access_date" placeholder="Access Date">
    <input type="text" id="Notes" name="Notes" placeholder="Notes">
  </fieldset>
  <input type="button" onClick=updateData(this.form) value="Confirm New Refer Row">
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
