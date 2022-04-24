<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

  require "../includes/Header.inc.php";
  require "../includes/DBConnection.inc.php";
  session_Start();

  /*User Data query*/
  $result = $conn->query('SELECT * FROM reference_author_map;')
     or die($conn->error);

  $referenceAuthorMapTableData = [];
  $i = 0;

  while($row = $result->fetch_assoc()) {
    $referenceAuthorMapTableData[$i] = [$row['id'],
                                        $row['fkey_reference_id'],
                                        $row['fkey_author_id']];
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
echo "<h2>" . "This table has: " . count($referenceAuthorMapTableData) .
        " rows." ."</h2>";
?>

<h2 align="center">Reference Author Map Data Table</h2>
<table style="width:100%">
  <tr>
    <th>ID</th>
    <th>Reference ID</th>
    <th>Author ID</th>

    <?php
    for ($y = 0; $y < count($referenceAuthorMapTableData); $y++) {
      echo "<tr>";
      for ($z = 0; $z < 3; $z++) {
        echo "<td>" . $referenceAuthorMapTableData[$y][$z] . "</td>";
      }
      echo "<tr>";
    }
    ?>
</table>
</body>
</html>
