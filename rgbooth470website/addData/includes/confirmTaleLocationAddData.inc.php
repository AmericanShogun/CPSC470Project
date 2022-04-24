<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
/*This page displays all information that is on the
table named StudentIDData*/
  require "../../includes/DBConnection.inc.php";
  session_Start();

  $_latitude = $_POST['latitude'];
  $_longitude = $_POST['longitude'];
  $_fkey_reference = $_POST['fkey_reference'];
  $_City = $_POST['City'];

  $sqlAddTaleLocationData = "INSERT INTO tale_location(latitude, longitude,
                        fkey_reference, City)
                      VALUES ('$_latitude', '$_longitude', '$_fkey_reference',
                        '$_City')";

  //running the query and printing error messages.
  if (mysqli_query($conn, $sqlAddTaleLocationData)) {
  } else {
    echo "Error: " . $sqlAddTaleLocationData . "<br>" . mysqli_error($conn);
  }
  $conn->close();

  header('Location: ../../tables/taleLocationTable.tab.php');
  die();
?>
