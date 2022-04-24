<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
/*This page displays all information that is on the
table named StudentIDData*/
  require "../../includes/DBConnection.inc.php";
  session_Start();

  $questionMark = "(?)"; //holds the question mark string for use in the prepare()
  $addQuestionMark = ", (?)";//appends additional question mark strings for use
                             //in the second while loop.
  $prepString = 's'; //appends additional strings related to the type of inputs
                     //required for the bind_param first argument
  $bigPrepString = ''; //holds the string required for bind_param's first argument
  $count = -1; //holds a count at one less than the true count to properly generate
               //the required string of question marks for the prepare() function.
  $countryNameArray = $_POST['country_name']; //holds the data from the user.

//This for loop counts the amount of data we have from the user, and
//generates the proper string of characters for the first argument of the
//bind_param function.
  for ($x = 0; $x < count($countryNameArray) ; $x++) {
    $bigPrepString = $bigPrepString."".$prepString;
    $count++;
  }
//This for loop generates the string of question marks for the data to be inserted
//into in the bind_param() function.
  for ($i = 0; $i < $count; $i++) {
    $questionMark = $questionMark."".$addQuestionMark;
  }

//This stmt is generated using a prepare() function and populated using a
//bind_param() function. The prepare() command is compiled when it is generated,
//before user input.
$stmt = $conn->prepare("INSERT INTO `country` (`country_name`) VALUES $questionMark");
$stmt->bind_param($bigPrepString, ...$countryNameArray);
$stmt->execute();

header('Location: ../../tables/countryTable.tab.php');
  $conn->close();
  die();
?>
