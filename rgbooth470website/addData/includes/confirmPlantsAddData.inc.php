<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
/*This page displays all information that is on the
table named StudentIDData*/
  require "../../includes/DBConnection.inc.php";
  session_Start();

  $_species = $_POST['species'];

  $sqlAddPlantsData = "INSERT INTO plants(species)
                      VALUES ('$_species')";

  //running the query and printing error messages.
  if (mysqli_query($conn, $sqlAddPlantsData)) {
  } else {
    echo "Error: " . $sqlAddPlantsData . "<br>" . mysqli_error($conn);
  }
  $conn->close();

  header('Location: ../../tables/plantsTable.tab.php');
  die();
?>
