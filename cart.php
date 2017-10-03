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

      <?php include 'header.php'; ?>
    </body>


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

  <table>
    <tr>
      <th>Product</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Total</th>
    </tr>
    <?php
    $db = new mysqli(
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
    echo '</table>';
    ?>



    <style>
      /* The Modal (background) */
      .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */

      }

      /* Modal Content */
      .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
      }

      /* The Close Button */
      .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
      }

      .close:hover,
      .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
      }
    </style>
    </head>
  <body>

    <!-- Trigger/Open The Modal -->
    <button id="myBtn" style ="background-color: #4CAF50;
                               border: none;
                               color: white;
                               padding: 15px 32px;
                               text-align: center;
                               text-decoration: none;
                               display: inline-block;
                               font-size: 16px;
                               margin: 4px 2px;
                               cursor: pointer;">Buy</button>

    <!-- The Modal -->
    <div id="myModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <span class="close">&times;</span>
        <p>You have successfully bought products! Thank you! </p>
      </div>

    </div>

    <script>
      // Get the modal
      var modal = document.getElementById('myModal');

      // Get the button that opens the modal
      var btn = document.getElementById("myBtn");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks the button, open the modal
      btn.onclick = function() {
        modal.style.display = "block";
      }

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal.style.display = "none";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
    </script>


  </body>
  </html>


