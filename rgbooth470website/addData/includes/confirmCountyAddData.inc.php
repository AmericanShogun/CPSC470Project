<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
/*This page displays all information that is on the
table named StudentIDData*/
  require "../../includes/DBConnection.inc.php";
  session_Start();

  $_county_name = $_POST['county_name'];
  $_fkey_country = $_POST['fkey_country'];

  $sqlAddCountyData = "INSERT INTO county(county_name, fkey_country)
                      VALUES ('$_county_name', '$_fkey_country')";

  //running the query and printing error messages.
  if (mysqli_query($conn, $sqlAddCountyData)) {
  } else {
    echo "Error: " . $sqlAddCountyData . "<br>" . mysqli_error($conn);
  }
  $conn->close();

  header('Location: ../../tables/countyTable.tab.php');
  die();
?>
