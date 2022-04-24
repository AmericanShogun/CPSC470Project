
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

<h1> Welcome to the Discoverers Add Big Data Page <h2>

<form id="discovererAddDataSingleForm" action="includes/confirmDiscovererAddBigData.inc.php" method="post" style="display: block">
  <div>
    <legend>Add a Row of Discoverers Data:</legend>
    <input type="text"  name="first_name[]" placeholder="Discoverer's First Name" class="input" required>
    <input type="text" name="last_name[]" placeholder="Discoverer's Last Name" class="input" required>
  </div>
  <div id="holding_div"></div>

  <input type="button" onClick=updateData(this.form) value="Confirm New Discoverers Row">
</form>

<button id="add_row">Add Row</button>

<div id="append_me" style="display: none">
  <div class="row">
    <input type="text" name="first_name[]" placeholder="Discoverer's First Name" class="input" required>
    <input type="text" name="last_name[]" placeholder="Discoverer's Last Name" class="input" required>
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
