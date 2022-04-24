<?php
$loginPageLink = "https://uqsr.world/admin/login/login.php";

session_start();

session_destroy();
if ($_SERVER['HTTP_REFERER'] =="") {
  header('Location: ' . $loginPageLink);
  exit;
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
 ?>
