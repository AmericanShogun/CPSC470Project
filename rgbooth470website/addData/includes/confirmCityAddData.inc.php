<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
/*This page displays all information that is on the
table named StudentIDData*/
  require "../../includes/DBConnection.inc.php";
  session_Start();

  $_fkey_country_id = $_POST['fkey_country_id'];
  $city_name = $_POST['city_name'];

  $sqlAddCityData = "INSERT INTO city(fkey_country_id, city_name)
                      VALUES ('$_fkey_country_id', '$city_name')";

  //running the query and printing error messages.
  if (mysqli_query($conn, $sqlAddCityData)) {
  } else {
    echo "Error: " . $sqlAddCityData . "<br>" . mysqli_error($conn);
  }
  $conn->close();

  header('Location: ../../tables/cityTable.tab.php');
  die();
?>
