<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
/*This page displays all information that is on the
table named StudentIDData*/
  require "../../includes/DBConnection.inc.php";
  session_Start();

  $_first_name = $_POST['first_name'];
  $_last_name = $_POST['last_name'];

  $sqlAddDiscovererData = "INSERT INTO discoverer(first_name, last_name)
                      VALUES ('$_first_name', '$_last_name')";

  //running the query and printing error messages.
  if (mysqli_query($conn, $sqlAddDiscovererData)) {
  } else {
    echo "Error: " . $sqlAddDiscovererData . "<br>" . mysqli_error($conn);
  }
  $conn->close();

  header('Location: ../../tables/discovererTable.tab.php');
  die();
?>
