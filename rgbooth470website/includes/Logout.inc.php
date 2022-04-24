<?php
/*This file is just to end the session for the user when
the logout button is hit.
*/

session_start();
session_unset();
session_destroy();


Header('Location: http://cpsc.roanoke.edu/~rgbooth/cs470/rgbooth470website/index.php');
?>
