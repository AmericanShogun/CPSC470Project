
<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
/*This page displays all information that is on the
table named StudentIDData*/
  require "../includes/Header.inc.php";
  require "../includes/DBConnection.inc.php";
  session_Start();

  /*User Data query*/
  $result = $conn->query('SELECT * FROM fossils;')
     or die($conn->error);

  $fossildata = [];
  $i = 0;

  while($row = $result->fetch_assoc()) {
    $fossildata[$i] = [$row['id'],
                              $row['fkey_city_id'],
                              $row['fkey_plant_id'],
                              $row['fkey_discoverer_id'],
                              $row['lattitude'],
                              $row['longitude'],
                              $row['year'],
                              $row['fkey_reference_id']];
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
echo "<h2>" . "This table has: " . count($fossildata) .
        " rows." ."</h2>";
?>

<h2 align="center">Dragon Fossil Data Table</h2>
<table style="width:100%">
  <tr>
    <th>Fossil ID</th>
    <th>City ID</th>
    <th>Plant ID</th>
    <th>Discoverer ID</th>
    <th>Lattitude</th>
    <th>Longitude</th>
    <th>year</th>
    <th>Reference ID</th>

    <?php
    for ($y = 0; $y < count($fossildata); $y++) {
      echo "<tr>";
      for ($z = 0; $z < 8; $z++) {
        echo "<td>" . $fossildata[$y][$z] . "</td>";
      }
      echo "<tr>";
    }
    ?>
</table>
</body>
</html>
