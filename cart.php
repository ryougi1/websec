<?php include 'sessioninit.php'; ?>
<html>
  <head>
    <body>

      <!--<title>Webshop</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel = "stylesheet"
            type = "text/css"
            href = "style.css" />
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

      <div class="header" style = "color: #fff">
        <h1> AB Shoes </h1>
      </div>-->

      <?php include 'header.php';?>
    </body>
    <?php show_token_error(); ?>


  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    tr:hover{background-color:#f5f5f5}
  </style>
  </head>
<body>

  <h2>Shopping Cart</h2>
<!--
  <table>
    <tr>
      <th>Product</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Total</th>
    </tr>
    <?php
    /*$db = new mysqli(
      ini_get("mysqli.default_host"),
      ini_get("mysqli.default_user"),
      ini_get("mysqli.default_pw"),
      "Webshop");
    $stmt = $db->prepare("SELECT prodName, prodCost FROM Products WHERE prodID = ?;");
    $total = 0;
    foreach ($_SESSION["cart"] as $product => $quantity) {
      $stmt->bind_param("i", $product);
      $stmt->execute();
      $stmt->bind_result($name, $price);
      $stmt->fetch();
      $cost = $price * $quantity;
      $total += $cost;
      $out =
<<<HTML
    <tr>
      <td>$name</td>
      <td>$price kr</td>
      <td>$quantity</td>
      <td>$cost kr</td>
    </tr>
HTML;
      echo $out;
    }
    echo "<tr><td/><td/><td>Total:</td><td>$total kr</td></tr>";
    echo '</table>';*/
    ?>
-->
  <?php include 'cartview.php';  make_cart($_SESSION['cart']); ?>

    <form action="paymentprocessor.php" method="post">
      <?php insert_token(); ?>
      <button type="submit">Buy</button>
    </form>

  </html>


