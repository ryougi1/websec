<!DOCTYPE html>
<?php include 'sessioninit.php';
check_token('cart')
?>
<html>
  <head/>
  <body>
    <?php include 'header.php' ?>
    <h2>Purchase receipt</h2>
    <link rel="stylesheet" href="webshop.css">
    <?php
  include 'cartview.php';
$_SESSION['lastpurchase'] = $_SESSION['cart'];
$_SESSION['cart'] = [];
make_cart($_SESSION['lastpurchase']);
$db = mysqli_connect(
  ini_get("mysqli.default_host"),
  ini_get("mysqli.default_user"),
  ini_get("mysqli.default_pw"),
  "Webshop");
$stmt = $db->prepare("SELECT firstname, lastname, address, zip, city, country FROM Users WHERE email = ?;");
$stmt->bind_param("s", $_SESSION['email']);
$stmt->execute();
$stmt->bind_result($firstname, $lastname, $address, $zip, $city, $country);
$stmt->fetch();
$stmt->close();;
    ?>
    <p>Shipping to:<br>
      <?= htmlentities("$firstname $lastname") ?><br>
      <?= $address ?><br>
      <?= htmlentities("$zip $city") ?><br>
      <?= htmlentities($country) ?>
    </p>
  </body>
</html>