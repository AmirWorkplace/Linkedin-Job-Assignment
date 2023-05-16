<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("location: login.php");
}

include_once("./config/db.php");
include_once("./app/AuthenticationController.php");

$Auth = new Auth();

$sid = $_SESSION['id'];
$message = "";

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  if ($sid === $id) {
    $message = $Auth->deleteUserAccount($conn, $id);
  } else {
    $message = "You are in Wrong!";
  }
}

?>

<div class="message">
  <p class="danger"><?php echo $message; ?></p>
</div>