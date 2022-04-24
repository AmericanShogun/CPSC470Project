<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
/*This page displays all information that is on the
table named StudentIDData*/
  require "../../includes/DBConnection.inc.php";
  session_Start();

  $questionMark = "(?, ?)"; //holds the question mark string for use in the prepare()
  $addQuestionMark = ", (?, ?)"; //appends additional question mark strings for use
                                 //in the second while loop.
  $prepString = 'ss'; //appends additional strings related to the type of inputs
                      //required for the bind_param first argument
  $bigPrepString = ''; //holds the string required for bind_param's first argument
  $count = -1; //holds a count at one less than the true count to properly generate
               //the required string of question marks for the prepare() function.
  $firstNameArray = $_POST['first_name']; //holds the first name data from the user.
  $lastNameArray = $_POST['last_name']; //holds the last name data from the user.
  $index = 0; //used to insert data into the correct location in $bigArray;
  $bigArray = array(); //large array holds all the data for insertion into the
                       //query using the bind_param() function.
//This for loop counts the amount of data we have from the user, and
//generates the proper string of characters for the first argument of the
//bind_param function. And populates the $bigArray for use in bind_param.
  for ($x = 0; $x < count($firstNameArray) ; $x++) {
    $bigArray[$index] = $firstNameArray[$x];
    $index++;
    $bigArray[$index] = $lastNameArray[$x];
    $index++;
    $bigPrepString = $bigPrepString."".$prepString;
    $count++;
  }
  //ASSERT:
  //Data in $bigArray is in the order of:
  //$firstNameArray[0], $lastNameArray[0],
  //$firstNameArray[1], $lastNameArray[1], etc...

  //This for loop generates the string of question marks for the data to be inserted
  //into in the bind_param() function.
  for ($i = 0; $i < $count; $i++) {
    $questionMark = $questionMark."".$addQuestionMark;
  }

//This stmt is generated using a prepare() function and populated using a
//bind_param() function. The prepare() command is compiled when it is generated,
//before user input.
$stmt = $conn->prepare("INSERT INTO `discoverer` (`first_name`, `last_name`) VALUES $questionMark");
$stmt->bind_param($bigPrepString, ...$bigArray);
$stmt->execute();

header('Location: ../../tables/discovererTable.tab.php');
  $conn->close();
  die();
?>
