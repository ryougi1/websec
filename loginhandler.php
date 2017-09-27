<?php include 'sessioninit.php'; ?>
<html>
  <?php include 'header.php'; ?>
  <body>
    <?php
    if (!($_POST["form-token"] === $_SESSION["form-token"]))
      header('location:login.php?msg=expired');
    $db = mysqli_connect(
      ini_get("mysqli.default_host"),
      ini_get("mysqli.default_user"),
      ini_get("mysqli.default_pw"),
      "Webshop");
    $stmt = $db->prepare("SELECT pwhash FROM Users WHERE email = ?;");
    $stmt->bind_param("s", $_POST["email"]);
    $stmt->execute();
    $stmt->bind_result($pwhash);
    $stmt->fetch();
    if (password_verify($_POST["psw"], $pwhash)) {
      session_regenerate_id();
      session_regenerate_form_token();
      $_SESSION['email'] = $_POST["email"];
      $_SESSION['auth'] = true;
      header('location:index.php');
    } else {
      header('location:login.php?msg=authfail');
    }
    ?>
  </body>
</html>
