<html>
<?php include 'header.php'; ?>
<body>
  <?php
	 function uuid() {
	 return 4;
	 }

	 $uuid = uuid();
	 $pwhash = password_hash($_POST["psw"], PASSWORD_DEFAULT);
	 $db = new mysqli("localhost", "root", "", "Webshop");
	 $stmt = $db->prepare("INSERT INTO Users VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);");
	 $stmt->bind_param("isssssiss",
	 $uuid,
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
