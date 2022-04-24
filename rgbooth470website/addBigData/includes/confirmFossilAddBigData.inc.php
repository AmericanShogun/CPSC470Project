<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
/*This page displays all information that is on the
table named StudentIDData*/
  require "../../includes/DBConnection.inc.php";
  session_Start();

  $questionMark = "(?, ?, ?, ?, ?, ?, ?)"; //holds the question mark string for use in the prepare()
  $addQuestionMark = ", (?, ?, ?, ?, ?, ?, ?)"; //appends additional question mark strings for use
                                 //in the second while loop.
  $prepString = 'iiiddii'; //appends additional strings related to the type of inputs
                      //required for the bind_param first argument
  $bigPrepString = ''; //holds the string required for bind_param's first argument
  $count = -1; //holds a count at one less than the true count to properly generate
               //the required string of question marks for the prepare() function.
  $cityIDArray = $_POST['fkey_city_id']; //holds the city id data from the user.
  $plantIDArray = $_POST['fkey_plant_id']; //holds the plant id data from the user.
  $discovererIDArray = $_POST['fkey_discoverer_id']; //holds the discoverer id data from the user.
  $lattitudeArray = $_POST['lattitude']; //holds the lattitude data from the user.
  $longitudeArray = $_POST['longitude']; //holds the longitude data from the user.
  $yearArray = $_POST['year']; //holds the year data from the user.
  $referenceIDArray = $_POST['fkey_reference_id']; //holds the reference id data from the user.
  $index = 0; //used to insert data into the correct location in $bigArray;
  $bigArray = array(); //large array holds all the data for insertion into the
                       //query using the bind_param() function.

//This for loop counts the amount of data we have from the user, and
//generates the proper string of characters for the first argument of the
//bind_param function. And populates the $bigArray for use in bind_param.
  for ($x = 0; $x < count($cityIDArray) ; $x++) {
    $bigArray[$index] = $cityIDArray[$x];
    $index++;
    $bigArray[$index] = $plantIDArray[$x];
    $index++;
    $bigArray[$index] = $discovererIDArray[$x];
    $index++;
    $bigArray[$index] = $lattitudeArray[$x];
    $index++;
    $bigArray[$index] = $longitudeArray[$x];
    $index++;
    $bigArray[$index] = $yearArray[$x];
    $index++;
    $bigArray[$index] = $referenceIDArray[$x];
    $index++;
    $bigPrepString = $bigPrepString."".$prepString;
    $count++;
  }
  //ASSERT:
  //Data in $bigArray is in the order of:
  //$cityIDArray[0], $plantIDArray[0], $discovererIDArray[0],
  //$lattitudeArray[0], $longitudeArray[0], $yearArray[0], $referenceIDArray[0],
  //$cityIDArray[1], $plantIDArray[1], $discovererIDArray[1],
  //$lattitudeArray[1], $longitudeArray[1], $yearArray[1], $referenceIDArray[1],
  //etc...

  //This for loop generates the string of question marks for the data to be inserted
  //into in the bind_param() function.
  for ($i = 0; $i < $count; $i++) {
    $questionMark = $questionMark."".$addQuestionMark;
  }

  //This stmt is generated using a prepare() function and populated using a
  //bind_param() function. The prepare() command is compiled when it is generated,
  //before user input.
$stmt = $conn->prepare("INSERT INTO `fossils` (`fkey_city_id`, `fkey_plant_id`,
  `fkey_discoverer_id`, `lattitude`, `longitude`, `year`, `fkey_reference_id`)
VALUES $questionMark");
$stmt->bind_param($bigPrepString, ...$bigArray);
$stmt->execute();

header('Location: ../../tables/FossilDataPage.tab.php');
  $conn->close();
  die();
?>
