<?php
/*This file is for when a user wants to edit a row of data in the
StudentIDData table.*/
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
require "includes/Header.inc.php"

?>



<!DOCTYPE html>
<html>
<head>
<meta name="Addport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Add Single Rows Page</h1>

<h2>The Following Buttons Add Relevant Unjoined Tables</h2>

<?php
  $sendPages = ['addBigData/fossilAddBigData.big.php',
  'addBigData/countryAddBigData.big.php',
  'addBigData/discovererAddBigData.big.php',
  'addBigData/testAddBigData.big.php'];
  //goToVars is currently deprecated, may reimplement.
  //         they are the names of each of the buttons that the loop generates.
  $goToVars = ['goToAddBigFossilDataPage',
  'goToAddBigCountryTable',
  'goToAddBigDiscovererTable',
  'goToAddBigTestTable'];
  $bodies = ['Add Big Fossil Data',
  'Add Big Country Data Tables',
  'Add Big Discoverer Data Tables',
  'Add Big Test Table'];
  ?>
  <?php for ($i=0; $i < count($sendPages); $i++) { ?>
  <form method="GET" action="<?= $sendPages[$i] ?>" style="align: center" align="center">
    <button type="submit" class="goToLoginBtn"><?= $bodies[$i] ?></button>
  </form>
  <br>
  <?php } ?>

</body>
</html>
