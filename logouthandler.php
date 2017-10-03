<?php
include 'sessioninit.php';
check_token('index');
session_destroy();
header('location:index.php');
?>