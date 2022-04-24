<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
/*This page displays all information that is on the
table named StudentIDData*/
  require "../../includes/DBConnection.inc.php";
  session_Start();

  $_Location_name = $_POST['Location_name'];
  $_Year = $_POST['Year'];
  $_fkey_county = $_POST['fkey_county'];

  $sqlAddMarketLocationData = "INSERT INTO market_location(Location_name, Year, fkey_county)
                      VALUES ('$_Location_name', '$_Year', '$_fkey_county')";

  //running the query and printing error messages.
  if (mysqli_query($conn, $sqlAddMarketLocationData)) {
  } else {
    echo "Error: " . $sqlAddMarketLocationData . "<br>" . mysqli_error($conn);
  }
  $conn->close();

  header('Location: ../../tables/marketLocationTable.tab.php');
  die();
?>
