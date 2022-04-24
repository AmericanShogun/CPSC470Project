
<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
/*This page displays all information that is on the
table named StudentIDData*/
  require "../includes/Header.inc.php";
  require "../includes/DBConnection.inc.php";
  session_Start();

$num_rows = 1; //number of rows the user wants to add to the table.

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  //PRE: a holding_div exists and is holding a place for the invisible forms
  //     to be appended
  //POST: This Function has appended a copy of the form with the id append_me
  //      to the holding div.
  $(document).ready(function() {
    $('#add_row').on('click', function() {
      $('#holding_div').append($('#append_me').html());
    });
    //PRE: a form that has been appended to the holding div exists with
    //     a remove button.
    //POST: This Function has removed the appended copy of the form id append_me
    //      at the desired location that the user clicked.
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

<h1> Welcome to the Countries Add Big Data Page <h2>

<!--
This is the beginning of the form, a near identical copy of the not dynamic form.
This form has a single input, and a holding div that can append more rows of inputs.
-->
<form id="countryAddDataSingleForm" action="includes/confirmCountryAddBigData.inc.php" method="post" style="display: block">
  <div class="row">
    <input type="text" name="country_name[]" placeholder="Country Name" class="input" required>
  </div>

<!--This is the holding div that has additional inputs appended to it.-->
  <div id="holding_div"></div>

  <input type="button" onClick=updateData(this.form) value="Confirm New Country Row">
</form>

<!--
This add row button activates the javascript function to append an additional
form to the forms.
-->
<button id="add_row">Add Row</button>

<!--
This is the form that is appended when the user clicks the Add Row button.
-->
  <div id="append_me" style="display: none">
    <div class="row">
      <input type="text" name="country_name[]" placeholder="Country Name" class="input" required>
      <button type="button" class="remove_row">Remove</button>
    </div>
  </div>


</body>
</html>

<script>
//PRE: The form has been filled and is awaiting submission
//POST: The form has been submitted to the corresponding page,
//      and is sent to the database.
function updateData(form) {
  form.submit();
}
</script>
