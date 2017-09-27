<?php
include 'sessioninit.php';
if(!($_POST["form-token"] === $_SESSION["form-token"])) {
  header("location:index.php?msg=expired");
  die();
}
if(isset($_POST["prod-ID"])) {
  $pid = $_POST["prod-ID"];
  if(isset($_SESSION["cart"][$pid])) {
    $_SESSION["cart"][$pid] += 1;
  } else {
    $_SESSION["cart"][$pid] = 1;
  }
}
header("location:index.php");
?>