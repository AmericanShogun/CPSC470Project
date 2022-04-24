
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $('#add_row').on('click', function() {
      $('#holding_div').append($('#append_me').html());
    });

    $(document).on('click', '.remove_row', function() {
      console.log($(this));
      $(this).closest('.row').remove();
    });
  });
</script>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../styles.css">
</head>
<body>

<h1> Welcome to the Fossils Add Big Data Page <h2>

<form id="fossilAddDataSingleForm" action="includes/confirmFossilAddBigData.inc.php" method="post" style="display: block">
  <div>
    <legend>Add a Row of Fossil Data:</legend>
    <input type="text" name="fkey_city_id[]" placeholder="City ID" class="input" required>
    <input type="text" name="fkey_plant_id[]" placeholder="Plant ID" class="input" required>
    <input type="text" name="fkey_discoverer_id[]" placeholder="Discoverer ID" class="input" required>
    <input type="text" name="lattitude[]" placeholder="Lattitude" class="input" required>
    <input type="text" name="longitude[]" placeholder="Longitude" class="input" required>
    <input type="text" name="year[]" placeholder="Year" class="input" required>
    <input type="text" name="fkey_reference_id[]" placeholder="Reference ID" class="input" required>
  </div>
  <div id="holding_div"></div>
  <input type="button" onClick=updateData(this.form) value="Confirm New Fossil Row">
</form>

<button id="add_row">Add Row</button>

<div id="append_me" style="display: none">
  <div class="row">
    <input type="text" name="fkey_city_id[]" placeholder="City ID" class="input" required>
    <input type="text" name="fkey_plant_id[]" placeholder="Plant ID" class="input" required>
    <input type="text" name="fkey_discoverer_id[]" placeholder="Discoverer ID" class="input" required>
    <input type="text" name="lattitude[]" placeholder="Lattitude" class="input" required>
    <input type="text" name="longitude[]" placeholder="Longitude" class="input" required>
    <input type="text" name="year[]" placeholder="Year" class="input" required>
    <input type="text" name="fkey_reference_id[]" placeholder="Reference ID" class="input" required>
    <button type="button" class="remove_row">Remove</button>
  </div>
</div>

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
