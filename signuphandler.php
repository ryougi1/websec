<?php include 'sessioninit.php'; ?>
<html>
  <?php include 'header.php'; ?>
  <body>
    <?php

     $db = new mysqli(
      ini_get("mysqli.default_host"),
      ini_get("mysqli.default_user"),
      ini_get("mysqli.default_pw"),
      "Webshop");

    if (!($_POST["form-token"] === $_SESSION["form-token"])) {
      header('location:register.php?msg=expired');
      die();
    }

    
/* Error handlers*/

//Make sure password length >= 10, includes one upper case, one lower case and a digit
if(!preg_match("/(?=.*[a-Z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{10,}/", $_POST["psw"])) {
  header('location:register.php?signup=weakpw');
  die();
}
//Make sure passwords match   
if(!($_POST["psw"] === $_POST["psw-repeat"])) {
  header('location:register.php?signup=nomatchpw');
  die();
}
//Check valid email, also check if email already in use
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
  header('location:register.php?signup=invalidemail');
  die();
}else {
  $stmt2 = $db->prepare("SELECT * FROM users WHERE email = ?;");
  $stmt2->bind_param($_POST["email"]);
  $stmt2->execute();
  mysqli_stmt_store_result($stmt2);
  $resultCheck = mysqli_stmt_num_rows($stmt2);
  if ($resultCheck > 0) {
    $stmt2->close();
    header('location:register.php?signup=emailinuse');
    die();
  }
}
  
$stmt3 = $db->prepare("INSERT INTO Users
          (email, firstname, lastname, country, city, zip, address, pwhash)
          VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
$stmt3->bind_param("sssssiss",
                      $_POST["email"],
                      $_POST["fname"],
                      $_POST["lname"],
                      $_POST["country"],
                      $_POST["city"],
                      $_POST["zipcode"],
                      $_POST["address"],
                      $pwhash);
$pwhash = password_hash($_POST["psw"], PASSWORD_DEFAULT);
$stmt3->execute();
$stmt3->close();
echo "Sign up successfull";

    ?>
  </body>
</html>
