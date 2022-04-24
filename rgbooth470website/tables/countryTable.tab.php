<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
/*This page displays all information that is on the
table named StudentAddresses*/
  require "../includes/Header.inc.php";
  require "../includes/DBConnection.inc.php";
  session_Start();

  /*User Data query*/
  $result = $conn->query('SELECT * FROM country;')
     or die($conn->error);

  $countryTableData = [];
  $i = 0;

  while($row = $result->fetch_assoc()) {
    $countryTableData[$i] = [$row['id'],
                              $row['country_name']];
    $i++;
  }
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../styles.css">
</head>
<body>

<?php
echo "<br>";
echo "<h2>" . "This table has: " . count($countryTableData) .
        " rows." ."</h2>";
?>

<h2 align="center">Country Data Table</h2>
<table style="width:100%">
  <tr>
    <th>ID</th>
    <th>Country Name</th>

    <?php
    for ($y = 0; $y < count($countryTableData); $y++) {
      echo "<tr>";
      for ($z = 0; $z < 2; $z++) {
        echo "<td>" . $countryTableData[$y][$z] . "</td>";
      }
      echo "<tr>";
    }
    ?>
</table>
</body>
</html>
