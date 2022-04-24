<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
/*This page displays all information that is on the
table named StudentIDData*/
  require "../../includes/DBConnection.inc.php";
  session_Start();

  $_fkey_publisher_id = $_POST['fkey_publisher_id'];
  $_title = $_POST['title'];
  $_publish_date = $_POST['publish_date'];
  $_access_date = $_POST['access_date'];
  $_Notes = $_POST['Notes'];

  $sqlAddReferData = "INSERT INTO refer(fkey_publisher_id, title, publish_date,
                        access_date, Notes)
                      VALUES ('$_fkey_publisher_id', '$_title', '$_publish_date',
                        '$_access_date', '$_Notes')";

  //running the query and printing error messages.
  if (mysqli_query($conn, $sqlAddReferData)) {
  } else {
    echo "Error: " . $sqlAddReferData . "<br>" . mysqli_error($conn);
  }
  $conn->close();

  header('Location: ../../tables/referTable.tab.php');
  die();
?>
