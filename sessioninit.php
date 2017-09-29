<?php
function session_regenerate_form_token() {
  $_SESSION['form-token'] = base64_encode(random_bytes(129));
}

function session_token() {
  return $_SESSION['form-token'];
}

function insert_token() {
  echo
<<<HTML
  <input type="hidden" name="form-token" value="{$_SESSION['form-token']}">
HTML;
}

function check_token($location) {
  if (!($_POST["form-token"] === $_SESSION["form-token"])) {
    header("location:$location.php?msg=expired");
    die();
  }
}

function show_token_error() {
  if (isset($_GET['msg']) && $_GET['msg'] == 'expired')
    echo '<font color=red> Link from outside of session rejected</font>';
}

session_start();
if (!isset($_SESSION['form-token'])) session_regenerate_form_token();
if (!isset($_SESSION['auth'])) $_SESSION['auth'] = false;
?>