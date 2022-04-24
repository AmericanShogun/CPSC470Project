<?php
/*The user will never see this page, it is only used if the
user attempts to change their preference to something else*/
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
require "DBConnection.inc.php";

if(isset($_POST['changePreferenceButton'])) {

  $preference = $_POST['preferences'];
  $user_ID = $_SESSION["userSessionID"];
  /*An attempt to set a new preference for the user, for now however $this
  does not work properly.*/
  $sqlPreferences = "UPDATE Users
                    SET preference = '$preference'
                    WHERE user_ID = '$user_ID'";

                  //running the replace query and error message printing.
  if (mysqli_query($conn, $sqlPreferences)) {
    /*
    The query has been performed successfully, the last thing to do before
    going back to the preferences page is to update the session variables
    for preference.
    */
    $_SESSION["userSessionPreference"] = $preference;
  } else {
    echo "Error: " . $sqlPreferences . "<br>" . mysqli_error($conn);
  }


  $conn->close();
}
//send the user back to the proper page.
header('Location: http://cpsc.roanoke.edu/~rgbooth/cs470/DragonBaseQueries/rgbooth470website/PreferencesPage.php');
die();
