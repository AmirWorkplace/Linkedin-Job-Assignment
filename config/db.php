<?php

$db_name = 'assignment';
$db_host = 'localhost';
$db_password = '';
$db_user = 'root';

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

echo !$conn && die(json_encode(["message" => "Database Not Connected!",]));


/** 
 * 
 * 
 * 
 * 
  $db_name = 'assignment';
  $db_host = 'localhost';
  $db_password = '';
  $db_user = 'root';

  $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  echo "Database Connected!";

 *
 */
