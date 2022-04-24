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
  $result = $conn->query('SELECT * FROM tale_location;')
     or die($conn->error);

  $taleLocation = [];
  $i = 0;

  while($row = $result->fetch_assoc()) {
    $taleLocation[$i] = [$row['id'],
                         $row['latitude'],
                         $row['longitude'],
                         $row['fkey_reference'],
                         $row['City']];
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
echo "<h2>" . "This table has: " . count($taleLocation) .
        " rows." ."</h2>";
?>

<h2 align="center">Reference Author Map Data Table</h2>
<table style="width:100%">
  <tr>
    <th>ID</th>
    <th>Latitude</th>
    <th>Longitude</th>
    <th>Reference</th>
    <th>City</th>

    <?php
    for ($y = 0; $y < count($taleLocation); $y++) {
      echo "<tr>";
      for ($z = 0; $z < 5; $z++) {
        echo "<td>" . $taleLocation[$y][$z] . "</td>";
      }
      echo "<tr>";
    }
    ?>
</table>
</body>
</html>
