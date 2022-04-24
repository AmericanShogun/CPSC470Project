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
  $result = $conn->query('SELECT * FROM `test`;')
     or die($conn->error);

  $testTableData = [];
  $i = 0;

  while($row = $result->fetch_assoc()) {
    $testTableData[$i] = [$row['id'],
                            $row['first_name'],
                            $row['middle_name'],
                            $row['last_name'],
                            $row['occupation'],
                            $row['street'],
                            $row['employer']];
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
echo "<h2>" . "This table has: " . count($testTableData) .
        " rows." ."</h2>";
?>

<h2 align="center">tests Data Table</h2>
<table style="width:100%">
  <tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Middle Name</th>
    <th>Last Name</th>
    <th>Occupation</th>
    <th>Street</th>
    <th>Employer</th>

    <?php
    for ($y = 0; $y < count($testTableData); $y++) {
      echo "<tr>";
      for ($z = 0; $z < 7; $z++) {
        echo "<td>" . $testTableData[$y][$z] . "</td>";
      }
      echo "<tr>";
    }
    ?>
</table>
</body>
</html>
