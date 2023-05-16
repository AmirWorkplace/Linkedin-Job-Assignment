<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("location: login.php");
}

include_once("./config/db.php");
include_once("./app/AuthenticationController.php");

$Auth = new Auth();

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $message = $Auth->deleteUserAccount($conn, $id);
}

?>

<div class="message">
  <p class="danger"><?php echo $message; ?></p>
</div>