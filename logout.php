<?php

session_start();
if (!isset($_SESSION['email'])) {
  header("location: login.php");
}

include_once("./config/db.php");
include_once("./app/AuthenticationController.php");

$Auth = new Auth();

if (isset($_GET['logout'])) {
  if ($_GET['logout'] == 'true') {
    $Auth->logout();
  }
}
