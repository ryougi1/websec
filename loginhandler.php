<html>
<?php include 'header.php'; ?>
<body>
  <?php
	 $db = new mysqli("localhost", "root", "", "Webshop");
	 $stmt = $db->prepare("SELECT pwhash FROM Users WHERE email = ?;");
     $stmt->bind_param("s", $_POST["email"]);
     $stmt->execute();
     $stmt->bind_result($pwhash);
     $stmt->fetch();
	 if (password_verify($_POST["psw"], $pwhash)) {
	 echo "valid password!";
	 } else {
	 echo "wrong password!";
	 }
	 ?>
</body>
</html>
