<?php include 'sessioninit.php'; ?>
<html>
  <?php include 'header.php'; ?>
<head>
<body>

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

<div class="gallery">
  <a target="_blank" href="ayo-ogunseinde-132344.jpg">
    <img src="ayo-ogunseinde-132344.jpg" alt="sko1" width="600" height="400">
  </a>
  <div class="desc">
    <p>Shoe 1</p>
    <p>699kr</p>
      <button class="button">Buy</button>
  </div>
</div>

<div class="gallery">
  <a target="_blank" href="dominik-martin-100802.jpg">
    <img src="dominik-martin-100802.jpg" alt="sko2" width="600" height="400">
  </a>
  <div class="desc">
  <p>Shoe 2</p>
  <p>699kr</p>
    <button class="button">Buy</button>
  </div>
</div>

<div class="gallery">
  <a target="_blank" href="jakob-owens-102203.jpg">
    <img src="jakob-owens-102203.jpg" alt="sko3" width="600" height="400">
  </a>
  <div class="desc">
  <p>Shoe 3</p>
  <p>699kr</p>
    <button class="button">Buy</button>
  </div>
</div>

<div class="gallery">
  <a target="_blank" href="joseph-barrientos-82309.jpg">
    <img src="joseph-barrientos-82309.jpg" alt="sko4" width="600" height="400">
  </a>
  <div class="desc">
      <p>Shoe 4</p>
  <p>699kr</p>
  <button class="button">Buy</button>
  </div>
</div>


</body>
</html>

