<?php include 'sessioninit.php'; ?>
<html>
  <?php include 'header.php'; ?>
  <head>

    <title>Webshop</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "stylesheet"
          type = "text/css"
          href = "style.css" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style>
      div.gallery {
        margin: 10px;
        border: 2px solid #ccc;
        float:left;
        width: 280px;
      }

      div.gallery:hover {
        border: 1px solid #777;
      }

      div.gallery img {
        width: 100%;
        height: auto;
      }

      div.desc {
        padding: 15px;
        text-align: center;
      }
    </style>
  </head>
  <body>

    <?php
    $db = new mysqli(
      ini_get("mysqli.default_host"),
      ini_get("mysqli.default_user"),
      ini_get("mysqli.default_pw"),
      "Webshop");
    $stmt = $db->prepare("SELECT prodID, prodName, prodCost, prodImage FROM Products;");
    $stmt->execute();
    $stmt->bind_result($id, $name, $cost, $image);
    while ($stmt->fetch()) {
      $out =
<<<HTML
  <div class="gallery">
    <a target="_blank" href="$image">
      <img src="$image" alt="$name" width="600" height="400">
    </a>
    <div class="desc">
      <p>$name</p>
      <p>$cost kr</p>
      <button class="button">Buy</button>
    </div>
  </div>
HTML;
      echo $out;
    }
    ?>
  </body>
</html>