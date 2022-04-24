
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

<h1> Welcome to the Authors Add Data Page </h1>

<form id="authorAddDataSingleForm" action="includes/confirmAuthorsAddData.inc.php" method="post" style="display: block">
  <fieldset>
    <legend>Add a Row of Authors Data:</legend>
    <input type="text" id="author_first_name" name="author_first_name" placeholder="Author's First Name">
    <input type="text" id="author_last_name" name="author_last_name" placeholder="Author's Last Name">
  </fieldset>
  <input type="button" onClick=updateData(this.form) value="Confirm New Authors Row">
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
