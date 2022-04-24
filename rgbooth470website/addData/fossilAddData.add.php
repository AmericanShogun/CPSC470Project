
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

<h1> Welcome to the Fossils Add Data Page <h2>

<form id="fossilAddDataSingleForm" action="includes/confirmFossilAddData.inc.php" method="post" style="display: block">
  <fieldset>
    <legend>Add a Row of Fossil Data:</legend>
    <input type="text" id="fkey_city_id" name="fkey_city_id" placeholder="City ID">
    <input type="text" id="fkey_plant_id" name="fkey_plant_id" placeholder="Plant ID">
    <input type="text" id="fkey_discoverer_id" name="fkey_discoverer_id" placeholder="Discoverer ID">
    <input type="text" id="lattitude" name="lattitude" placeholder="Lattitude">
    <input type="text" id="longitude" name="longitude" placeholder="Longitude">
    <input type="text" id="year" name="year" placeholder="Year">
    <input type="text" id="fkey_reference_id" name="fkey_reference_id" placeholder="Reference ID">
  </fieldset>
  <input type="button" onClick=updateData(this.form) value="Confirm New Fossil Row">
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
