<html>
<?php include 'header.php'; ?>
<body>
  <?php
	 $db = new mysqli("localhost", "root", "", "customers");
	 $stmt = $db.prepare("SELECT pwhash FROM Users WHERE email = ?;");
	 $stmt.bind_param("s", $_POST["email"]);
	 $stmt.execute();
	 $pwhash = $stmt.fetch;
	 if (password_verify($rawpw, $_POST["psw"])) {
	 echo "valid password!";
	 } else {
	 echo "wrong password!";
	 }
	 ?>
</body>
</html>
