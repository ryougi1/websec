<?php
/*
Login flow:
  Check if user password is stored
    If not, reply invalid
  If stored, check if passwords match
    If locked out and fails > 5, reply lockout
    Else check if password valid
      If, login, reset lockout
      Else, increment lockout, reply lockout
*/
include 'sessioninit.php';
function locktime($fails) {
  return 20 * 2 ** $fails;
}
check_token('login');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$db = mysqli_connect(
  ini_get("mysqli.default_host"),
  ini_get("mysqli.default_user"),
  ini_get("mysqli.default_pw"),
  "Webshop");
/*
$stmt = $db->prepare("SELECT pwhash, UNIX_TIMESTAMP(lastfail), fails FROM Users WHERE email = \"{$_POST['email']}\";");
$stmt->bind_param('s', $_POST['email']);
$stmt->execute();
$stmt->bind_result($pwhash, $lastfail, $fails);
$stmt->fetch();
$stmt->close();
*/
$q1 = "SELECT pwhash, UNIX_TIMESTAMP(lastfail), fails FROM Users WHERE email = \"{$_POST['email']}\";";
$db->multi_query($q1);
$result = $db->store_result();
if ($result->num_rows == 0)
  header('location:login.php?msg=wrongemail');
else {
  $row = $result->fetch_assoc();
  $pwhash = $row['pwhash'];
  $lastfail = $row['lastfail'];
  $fails = $row['fails'];
  if ($fails > 5 && $lastfail > time() - locktime($fails)) {
    $unlocks = $lastfail + locktime($fails);
    header("location:login.php?msg=lockout&time=$unlocks");
  } else {
    if (password_verify($_POST['psw'], $pwhash)) {
      session_regenerate_id();
      session_regenerate_form_token();
      $_SESSION['email'] = $_POST['email'];
      $_SESSION['auth'] = true;
      $_SESSION['cart'] = [];
      $fails = 0;
      $stmt = $db->prepare("UPDATE Users SET fails = ? WHERE email = ?");
      $stmt->bind_param('is', $fails, $_POST['email']);
      $stmt->execute();
      $stmt->close();
      header('location:index.php');
    } else {
      $fails = $fails + 1;
      $lastfail = time();
      $stmt = $db->prepare("UPDATE Users SET lastfail = FROM_UNIXTIME(?), fails = ? WHERE email = ?;");
      $stmt->bind_param("iis", $lastfail, $fails, $_POST['email']);
      $stmt->execute();
      $stmt->close();
      header('location:login.php?msg=authfail');
    }
  }
}
?>
