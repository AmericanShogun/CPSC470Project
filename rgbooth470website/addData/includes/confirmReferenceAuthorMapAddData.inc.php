<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
/*This page displays all information that is on the
table named StudentIDData*/
  require "../../includes/DBConnection.inc.php";
  session_Start();

  $_fkey_reference_id = $_POST['fkey_reference_id'];
  $_fkey_author_id = $_POST['fkey_author_id'];
  $sqlAddReferenceAuthorMapData = "INSERT INTO reference_author_map(
                        fkey_reference_id, fkey_author_id)
                      VALUES ('$_fkey_reference_id', '$_fkey_author_id')";

  //running the query and printing error messages.
  if (mysqli_query($conn, $sqlAddReferenceAuthorMapData)) {
  } else {
    echo "Error: " . $sqlAddReferenceAuthorMapData . "<br>" . mysqli_error($conn);
  }
  $conn->close();

  header('Location: ../../tables/referenceAuthorMapTable.tab.php');
  die();
?>
