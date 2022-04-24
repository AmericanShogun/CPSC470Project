<?php

/*When the user successfully signs up or logs in,
then the user will be sent to this invisible page to complete
the session variable setting and then be sent to the Home Page.*/
session_start();
require "includes/Header.inc.php"

?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>View Data Page</h1>

<h2>The Following Buttons View Relevant Unjoined Tables</h2>

<?php
  $sendPages = ['tables/FossilDataPage.tab.php',
   'tables/testTable.tab.php',
   'tables/authorsTable.tab.php',
   'tables/cityTable.tab.php',
   'tables/countryTable.tab.php',
   'tables/countyTable.tab.php',
   'tables/discovererTable.tab.php',
   'tables/marketLocationTable.tab.php',
   'tables/plantsTable.tab.php',
   'tables/publisherTable.tab.php',
   'tables/referTable.tab.php',
   'tables/referenceAuthorMapTable.tab.php',
   'tables/taleLocationTable.tab.php',
   'tables/talesTable.tab.php'];
  $goToVars = ['goToFossilDataPage',
  'goToTestTable',
  'goToAuthorsTable',
  'goToCityTable',
  'goToCountryTable',
  'goToCountyTable',
  'goToDiscovererTable',
  'goToMarketLocationTable',
  'goToPlantsTable',
  'goToPublisherTable',
  'goToReferTable',
  'goToReferenceAuthorMapTable',
  'goToTaleLocationTable',
  'goToTalesTable'];
  $bodies = ['View Fossil Data',
  'View Test Data',
  'View Authors Tables',
  'View City Data Tables',
  'View Country Data Tables',
  'View County Data Tables',
  'View Discoverer Data Tables',
  'View Market Location Data Tables',
  'View Plant Data Tables',
  'View Publisher Data Tables',
  'View Refer Data Tables',
  'View Reference Author Map Data Tables',
  'View Tale Location Data Tables',
  'View Tales Data Tables'];
  ?>
  <?php for ($i=0; $i < count($sendPages); $i++) { ?>
  <form method="GET" action="<?= $sendPages[$i] ?>" style="align: center" align="center">
    <button type="submit" name="<?= $goToVar[$i] ?>" class="goToLoginBtn"><?= $bodies[$i] ?></button>
  </form>
  <br>
  <?php } ?>

</body>
</html>
