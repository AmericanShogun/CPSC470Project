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
  $result = $conn->query('SELECT * FROM tales;')
     or die($conn->error);

  $tales = [];
  $i = 0;

  while($row = $result->fetch_assoc()) {
    $tales[$i] = [$row['id'],
                         $row['Dragon_Name'],
                         $row['fkey_ref_id'],
                         $row['Page_Number'],
                         $row['Dragon_Description'],
                         $row['fkey_country_id']];
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
echo "<h2>" . "This table has: " . count($tales) .
        " rows." ."</h2>";
?>

<h2 align="center">Tales Data Table</h2>
<table style="width:100%">
  <tr>
    <th>ID</th>
    <th>Dragon Name</th>
    <th>Reference ID</th>
    <th>Page Number</th>
    <th>Dragon Description</th>
    <th>Country ID</th>

    <?php
    for ($y = 0; $y < count($tales); $y++) {
      echo "<tr>";
      for ($z = 0; $z < 6; $z++) {
        echo "<td>" . $tales[$y][$z] . "</td>";
      }
      echo "<tr>";
    }
    ?>
</table>
</body>
</html>
