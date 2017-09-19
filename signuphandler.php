<html>
<?php include 'header.php'; ?>
<body>
  <?php
	 function uuid() {
	 return 4;
	 }

	 $uuid = uuid();
	 $pwhash = password_hash($_POST["psw"], PASSWORD_DEFAULT);
	 $db = new mysqli(
	 ini_get("mysqli.default_host"),
	 ini_get("mysqli.default_user"),
	 ini_get("mysqli.default_pw"),
	 "Webshop");
	 $stmt = $db->prepare("INSERT INTO Users 
          (email, firstname, lastname, country, city, zip, address, pwhash)
          VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
	 $stmt->bind_param("sssssiss",
	 $_POST["email"],
	 $_POST["fname"],
	 $_POST["lname"],
	 $_POST["country"],
	 $_POST["city"],
	 $_POST["zipcode"],
	 $_POST["address"],
	 $pwhash);
	 $stmt->execute();
	 ?>
</body>
</html>
