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
  $sendPages = ['addData/fossilAddData.add.php',
  'addData/authorsAddData.add.php',
  'addData/cityAddData.add.php',
  'addData/countryAddData.add.php',
  'addData/countyAddData.add.php',
  'addData/discovererAddData.add.php',
  'addData/marketLocationAddData.add.php',
  'addData/plantsAddData.add.php',
  'addData/publisherAddData.add.php',
  'addData/referAddData.add.php',
  'addData/referenceAuthorMapAddData.add.php',
  'addData/taleLocationAddData.add.php',
  'addData/talesAddData.add.php'];
  //goToVars is currently deprecated, may reimplement.
  //         they are the names of each of the buttons that the loop generates.
  $goToVars = ['goToAddFossilDataPage',
  'goToAddAuthorsTable',
  'goToAddCityTable',
  'goToAddCountryTable',
  'goToAddCountyTable',
  'goToAddDiscovererTable',
  'goToAddMarketLocationTable',
  'goToAddPlantsTable',
  'goToAddPublisherTable',
  'goToAddReferTable',
  'goToAddReferenceAuthorMapTable',
  'goToAddTaleLocationTable',
  'goToAddTalesTable'];
  $bodies = ['Add Fossil Data',
  'Add Authors Tables',
  'Add City Data Tables',
  'Add Country Data Tables',
  'Add County Data Tables',
  'Add Discoverer Data Tables',
  'Add Market Location Data Tables',
  'Add Plant Data Tables',
  'Add Publisher Data Tables',
  'Add Refer Data Tables',
  'Add Reference Author Map Data Tables',
  'Add Tale Location Data Tables',
  'Add Tales Data Tables'];
  ?>
  <?php for ($i=0; $i < count($sendPages); $i++) { ?>
  <form method="GET" action="<?= $sendPages[$i] ?>" style="align: center" align="center">
    <button type="submit" class="goToLoginBtn"><?= $bodies[$i] ?></button>
  </form>
  <br>
  <?php } ?>

</body>
</html>
