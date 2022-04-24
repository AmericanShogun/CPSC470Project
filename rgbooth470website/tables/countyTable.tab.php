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
  $result = $conn->query('SELECT * FROM county;')
     or die($conn->error);

  $countyTableData = [];
  $i = 0;

  while($row = $result->fetch_assoc()) {
    $countyTableData[$i] = [$row['id'],
                            $row['county_name'],
                            $row['fkey_country']];
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
echo "<h2>" . "This table has: " . count($countyTableData) .
        " rows." ."</h2>";
?>

<h2 align="center">county Data Table</h2>
<table style="width:100%">
  <tr>
    <th>ID</th>
    <th>County Name</th>
    <th>Country ID</th>

    <?php
    for ($y = 0; $y < count($countyTableData); $y++) {
      echo "<tr>";
      for ($z = 0; $z < 3; $z++) {
        echo "<td>" . $countyTableData[$y][$z] . "</td>";
      }
      echo "<tr>";
    }
    ?>
</table>
</body>
</html>
