<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
/*This page displays all information that is on the
table named StudentIDData*/
  require "../../includes/DBConnection.inc.php";
  session_Start();

  $_Dragon_Name = $_POST['Dragon_Name'];
  $_fkey_ref_id = $_POST['fkey_ref_id'];
  $_Page_Number = $_POST['Page_Number'];
  $_Dragon_Description = $_POST['Dragon_Description'];
  $_fkey_country_id = $_POST['fkey_country_id'];
  echo $_Dragon_Name;

  $sqlAddTalesData = "INSERT INTO tales(Dragon_Name, fkey_ref_id,
                      Page_Number, Dragon_Description, fkey_country_id)
                      VALUES ('$_Dragon_Name', '$_fkey_ref_id',
                              '$_Page_Number', '$_Dragon_Description',
                              '$_fkey_country_id')";

  //running the query and printing error messages.
  if (mysqli_query($conn, $sqlAddTalesData)) {
  } else {
    echo "Error: " . $sqlAddTalesData . "<br>" . mysqli_error($conn);
  }
  $conn->close();

  header('Location: ../../tables/talesTable.tab.php');
  die();
?>
