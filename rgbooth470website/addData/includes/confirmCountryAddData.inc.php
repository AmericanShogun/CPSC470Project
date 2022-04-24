<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
/*This page displays all information that is on the
table named StudentIDData*/
  require "../../includes/DBConnection.inc.php";
  session_Start();

  $_country_name = $_POST['country_name'];

  $sqlAddCountryData = "INSERT INTO country(country_name) VALUES ('$_country_name')";

  //running the query and printing error messages.
  if (mysqli_query($conn, $sqlAddCountryData)) {
  } else {
    echo "Error: " . $sqlAddCountryData . "<br>" . mysqli_error($conn);
  }
  $conn->close();

  //header('Location: ../../tables/countryTable.tab.php');
?>
