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
  $result = $conn->query('SELECT * FROM market_location;')
     or die($conn->error);

  $marketLocationTableData = [];
  $i = 0;

  while($row = $result->fetch_assoc()) {
    $marketLocationTableData[$i] = [$row['id'],
                                    $row['Location_name'],
                                    $row['Year'],
                                    $row['fkey_county']];
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
echo "<h2>" . "This table has: " . count($marketLocationTableData) .
        " rows." ."</h2>";
?>

<h2 align="center">marketLocation Data Table</h2>
<table style="width:100%">
  <tr>
    <th>ID</th>
    <th>Location Name</th>
    <th>Year</th>
    <th>County</th>

    <?php
    for ($y = 0; $y < count($marketLocationTableData); $y++) {
      echo "<tr>";
      for ($z = 0; $z < 4; $z++) {
        echo "<td>" . $marketLocationTableData[$y][$z] . "</td>";
      }
      echo "<tr>";
    }
    ?>
</table>
</body>
</html>
