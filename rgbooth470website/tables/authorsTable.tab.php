<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
/*This page displays all information that is on the
table named CourseHours*/
  require "../includes/Header.inc.php";
  require "../includes/DBConnection.inc.php";
  session_Start();

  /*User Data query*/
  $result = $conn->query('SELECT * FROM author;')
     or die($conn->error);

  $authorTableData = [];
  $i = 0;

  while($row = $result->fetch_assoc()) {
    $authorTableData[$i] = [$row['id'],
                              $row['author_first_name'],
                              $row['author_last_name']];
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
echo "<h2>" . "This table has: " . count($authorTableData) .
        " rows." ."</h2>";
?>

<h2 align="center">Authors Data Table</h2>
<table style="width:100%">
  <tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>

    <?php
    for ($y = 0; $y < count($authorTableData); $y++) {
      echo "<tr>";
      for ($z = 0; $z < 3; $z++) {
        echo "<td>" . $authorTableData[$y][$z] . "</td>";
      }
      echo "<tr>";
    }
    ?>
</table>
</body>
</html>
