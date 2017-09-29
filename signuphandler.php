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
    check_token('register');
    
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

//Check password against password blacklist
$stmt = $db->prepare("SELECT password FROM PwBlacklist WHERE password = ?;");
$stmt->bind_param("s", $_POST["psw"]);
$stmt->execute();
$stmt->bind_result($blacklistedPw);
$stmt->fetch();
if ($blacklistedPw === $_POST["psw"]) {
    $stmt->close();
    header('location:register.php?signup=passwordtoocommon');
    die();
}

//Check valid email, also check if email already in use
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
  header('location:register.php?signup=invalidemail');
  die();
}else {
  $stmt1 = $db->prepare("SELECT email FROM Users WHERE email = ?;");
    $stmt1->bind_param("s", $_POST["email"]);
    $stmt1->execute();
    $stmt1->bind_result($dbEmail);
    $stmt1->fetch();
  if ($dbEmail === $_POST["email"]) {
    $stmt1->close();
    header('location:register.php?signup=emailinuse');
    die();
  }
}
  
$stmt2 = $db->prepare("INSERT INTO Users
          (email, firstname, lastname, country, city, zip, address, pwhash)
          VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
$stmt2->bind_param("sssssiss",
                      $_POST["email"],
                      $_POST["fname"],
                      $_POST["lname"],
                      $_POST["country"],
                      $_POST["city"],
                      $_POST["zipcode"],
                      $_POST["address"],
                      $pwhash);
$pwhash = password_hash($_POST["psw"], PASSWORD_DEFAULT);
$stmt2->execute();
$stmt2->close();
echo "Sign up successfull";
    ?>
  </body>
</html>
