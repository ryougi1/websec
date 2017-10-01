
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
$db = mysqli_connect(
  ini_get("mysqli.default_host"),
  ini_get("mysqli.default_user"),
  ini_get("mysqli.default_pw"),
  "Webshop");
$stmt = $db->prepare("SELECT pwhash, UNIX_TIMESTAMP(lastfail), fails FROM Users WHERE email = ?;");
$stmt->bind_param('s', $_POST['email']);
$stmt->execute();
$stmt->bind_result($pwhash, $lastfail, $fails);
$stmt->fetch();
$stmt->close();
if ($pwhash === NULL)
  header('location:login.php?msg=wrongemail');
else {
  if ($fails > 5 && $lastfail > time() - locktime($fails)) {
    $unlocks = $lastfail + locktime($fails);
    header("location:login.php?msg=lockout&time=$unlocks");
  } else {
    if (password_verify($_POST['psw'], $pwhash)) {
      session_regenerate_id();
      session_regenerate_form_token();
      $_SESSION['email'] = $_POST['email'];
      $_SESSION['auth'] = true;
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
/* if (password_verify($_POST["psw"], $pwhash)) {
  session_regenerate_id();
  session_regenerate_form_token();
  $_SESSION['email'] = $_POST["email"];
  $_SESSION['auth'] = true;
  header('location:index.php');
} else {
  mysqli_report(MYSQLI_REPORT_ALL);
  $stmt = $db->prepare("SELECT UNIX_TIMESTAMP(lastfail), fails FROM Users WHERE email = ?;");
  $stmt->bind_param("s", $_POST['email']);
  $stmt->execute();
  $stmt->bind_result($lastfail, $fails);
  $stmt->fetch();
  $stmt->close();
  if ($lastfail > time() - 20 * 2 ** $fails) {
    $fails += 1;
  } else {
    $fails = 1;
  }
  $lastfail = time();
  $stmt = $db->prepare("UPDATE Users SET lastfail = FROM_UNIXTIME(?), fails = ? WHERE email = ?;");
  $stmt->bind_param("iis", $lastfail, $fails, $_POST['email']);
  $stmt->execute();
  {
    echo "$lastfail + 20 * 2 ** $fails}";
    die();
  }
  $lockout = $lastfail + 20 * 2 ** $fails;
  header("location:login.php?msg=authfail&unlocks=$lockout");
}*/
?>
