<!DOCTYPE html>
<?php include 'sessioninit.php'; ?>
<html>
  <head/>
  <body>
    <?php include 'header.php' ?>
    <h2>Purchase receipt</h2>
    <link rel="stylesheet" href="webshop.css">
    <?php include 'cartview.php';
    $_SESSION['lastpurchase'] = $_SESSION['cart'];
    $_SESSION['cart'] = [];
    make_cart($_SESSION['lastpurchase']);
    ?>
  </body>
</html>