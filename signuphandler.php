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

//Make sure passwords match   
if(!($_POST["psw"] === $_POST["psw-repeat"])) {
  header('location:register.php?signup=nomatchpw');
  die();
}

//Make sure password length >= 10, includes one upper case, one lower case and a digit

if(!preg_match("/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{10,}/", $_POST["psw"])) {
  header('location:register.php?signup=weakpw');
  die();
}

//Check valid email, also check if email already in use
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
  header('location:register.php?signup=invalidemail');
  die();
}else {
  $stmt = $db->prepare("SELECT email FROM Users WHERE email = ?;");
    $stmt->bind_param("s", $_POST["email"]);
    $stmt->execute();
    $stmt->bind_result($dbEmail);
    $stmt->fetch();
  if ($dbEmail === $_POST["email"]) {
    $stmt->close();
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
