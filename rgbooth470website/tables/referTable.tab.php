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
  $result = $conn->query('SELECT * FROM refer;')
     or die($conn->error);

  $referTableData = [];
  $i = 0;

  while($row = $result->fetch_assoc()) {
    $referTableData[$i] = [$row['id'],
                           $row['fkey_publisher_id'],
                           $row['title'],
                           $row['publish_date'],
                           $row['access_date'],
                           $row['Notes']];
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
echo "<h2>" . "This table has: " . count($referTableData) .
        " rows." ."</h2>";
?>

<h2 align="center">Refer Data Table</h2>
<table style="width:100%">
  <tr>
    <th>ID</th>
    <th>Publisher ID</th>
    <th>Title</th>
    <th>Publish Date</th>
    <th>Access Date</th>
    <th>Notes</th>

    <?php
    for ($y = 0; $y < count($referTableData); $y++) {
      echo "<tr>";
      for ($z = 0; $z < 6; $z++) {
        echo "<td>" . $referTableData[$y][$z] . "</td>";
      }
      echo "<tr>";
    }
    ?>
</table>
</body>
</html>
