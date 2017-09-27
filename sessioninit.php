<?php
function session_regenerate_form_token() {
  $_SESSION['form-token'] = base64_encode(random_bytes(129));
}

function session_token() {
  return $_SESSION['form-token'];
}

session_start();
if (!isset($_SESSION['form-token'])) session_regenerate_form_token();
if (!isset($_SESSION['auth'])) $_SESSION['auth'] = false;
?>