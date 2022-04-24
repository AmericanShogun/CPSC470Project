<?php
$conn = new mysqli("localhost", "rgbooth", "boothman226", "rgbooth_db");

if ($conn->connect_error) {
  die ("Connection failed: " . $conn->connect_error);
}
?>
