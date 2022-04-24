<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
/*This page displays all information that is on the
table named StudentIDData*/
  require "../../includes/DBConnection.inc.php";
  session_Start();

  $_fkey_city_id = $_POST['fkey_city_id'];
  $_fkey_plant_id = $_POST['fkey_plant_id'];
  $_fkey_discoverer_id = $_POST['fkey_discoverer_id'];
  $_lattitude = $_POST['lattitude'];
  $_longitude = $_POST['longitude'];
  $_year = $_POST['year'];
  $_fkey_reference_id = $_POST['fkey_reference_id'];

  $sqlAddFossilData = "INSERT INTO fossils(fkey_city_id, fkey_plant_id,
    fkey_discoverer_id, lattitude, longitude, year, fkey_reference_id)
                      VALUES ('$_fkey_city_id', '$_fkey_plant_id',
                        '$_fkey_discoverer_id', '$_lattitude', '$_longitude',
                        '$_year', '$_fkey_reference_id')";

  //running the query and printing error messages.
  if (mysqli_query($conn, $sqlAddFossilData)) {
  } else {
    echo "Error: " . $sqlAddFossilData . "<br>" . mysqli_error($conn);
  }
  $conn->close();

  header('Location: ../../tables/FossilDataPage.tab.php');
  die();
?>
