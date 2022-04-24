
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

<h1> Welcome to the Tales Add Data Page <h2>

<form id="talesAddDataSingleForm" action="includes/confirmTalesAddData.inc.php" method="post" style="display: block">
  <fieldset>
    <legend>Add a Row of tales Data:</legend>
    <input type="text" id="Dragon_Name" name="Dragon_Name" placeholder="Dragon Name">
    <input type="text" id="fkey_ref_id" name="fkey_ref_id" placeholder="Reference ID">
    <input type="text" id="Page_Number" name="Page_Number" placeholder="Page_Number">
    <input type="text" id="Dragon_Description" name="Dragon_Description" placeholder="Dragon Description">
    <input type="text" id="fkey_country_id" name="fkey_country_id" placeholder="Country ID">
  </fieldset>
  <input type="button" onClick=updateData(this.form) value="Confirm New tales Row">
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
