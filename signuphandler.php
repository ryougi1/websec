<?php include 'sessioninit.php'; ?>
<html>
  <?php include 'header.php'; ?>
  <body>
    <?php
    if (!($_POST["form-token"] === $_SESSION["form-token"])) {
      header('location:register.php?msg=expired');
      die();
    }
    if(!($_POST["psw"] === $_POST["psw-repeat"]))
      $errors["psw"] = true;
    $db = new mysqli(
      ini_get("mysqli.default_host"),
      ini_get("mysqli.default_user"),
      ini_get("mysqli.default_pw"),
      "Webshop");
    $stmt = $db->prepare("INSERT INTO Users
          (email, firstname, lastname, country, city, zip, address, pwhash)
          VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
    $stmt->bind_param("sssssiss",
                      $_POST["email"],
                      $_POST["fname"],
                      $_POST["lname"],
                      $_POST["country"],
                      $_POST["city"],
                      $_POST["zipcode"],
                      $_POST["address"],
                      $pwhash);
    $pwhash = password_hash($_POST["psw"], PASSWORD_DEFAULT);
    $stmt->execute();
    ?>
  </body>
</html>
