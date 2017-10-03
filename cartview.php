<?php function make_cart($activecart) { ?>
<table>
  <?php
  $db = new mysqli(
    ini_get("mysqli.default_host"),
    ini_get("mysqli.default_user"),
    ini_get("mysqli.default_pw"),
    "Webshop");
  $stmt = $db->prepare("SELECT prodName, prodCost FROM Products WHERE prodID = ?;");
  $total = 0;
  foreach ($activecart as $product => $quantity):
  $stmt->bind_param("i", $product);
  $stmt->execute();
  $stmt->bind_result($name, $price);
  $stmt->fetch();
  $cost = $price * $quantity;
  $total += $cost;
  ?>
  <tr>
    <td><?=$name?></td>
    <td><?=$price?>kr</td>
    <td><?=$quantity?></td>
    <td><?=$cost?>kr</td>
  </tr>
  <?php endforeach; ?>
  <tr><td/><td/><td>Total:</td><td><?=$total?>kr</td></tr>
</table>
<?php } ?>