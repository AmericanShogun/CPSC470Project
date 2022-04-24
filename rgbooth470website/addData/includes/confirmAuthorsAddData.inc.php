<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
/*This page displays all information that is on the
table named StudentIDData*/
  require "../../includes/DBConnection.inc.php";
  session_Start();

  $_author_first_name = $_POST['author_first_name'];
  $_author_last_name = $_POST['author_last_name'];

  $sqlAddAuthorData = "INSERT INTO author(author_first_name, author_last_name)
                      VALUES ('$_author_first_name', '$_author_last_name')";

  //running the query and printing error messages.
  if (mysqli_query($conn, $sqlAddAuthorData)) {
  } else {
    echo "Error: " . $sqlAddAuthorData . "<br>" . mysqli_error($conn);
  }
  $conn->close();

  header('Location: ../../tables/authorsTable.tab.php');
  die();
?>
