<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
/*This page displays all information that is on the
table named StudentIDData*/
  require "../../includes/DBConnection.inc.php";
  session_Start();

  $_publisher_name = $_POST['publisher_name'];
  $_fkey_city_id = $_POST['fkey_city_id'];

  $sqlAddPublisherData = "INSERT INTO publisher(publisher_name, fkey_city_id)
                      VALUES ('$_publisher_name', '$_fkey_city_id')";

  //running the query and printing error messages.
  if (mysqli_query($conn, $sqlAddPublisherData)) {
  } else {
    echo "Error: " . $sqlAddPublisherData . "<br>" . mysqli_error($conn);
  }
  $conn->close();

  header('Location: ../../tables/publisherTable.tab.php');
?>
