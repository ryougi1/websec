<h1> Web shop </h1>
<h2>
  <link rel="stylesheet" href="header.css">
</h2>
<body>
  <ul>
    <li><a class="active" href="index.php">Home</a></li>
    <!--<li style="float:right"><a href="#about">To checkout</a></li>-->
    <?php if ($_SESSION['auth']): ?>
    <li style="float:right;font-size:18px;color:#f2f2f2;"> <a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span></a> </li>
    <?php endif; ?>
    <?php if (isset($_SESSION['auth']) && $_SESSION['auth'] === true): ?>
    <li style="float:right">
      <form action="logouthandler.php" method="post">
        <?php insert_token(); ?>
        <button type="submit">Sign out</button>
      </form>
    </li>
    <!--<li style="float:right"><a href="logouthandler.php">Sign out</a></li>-->
    <li style="float:right">Signed in as <?php echo $_SESSION['email'] ?></li>
    <?php else: ?>
    <li style="float:right"><a href="login.php">Log in</a></li>
    <li style="float:right"><a href="register.php">Sign up</a></li>
    <?php endif; ?>
  </ul>
</body>
