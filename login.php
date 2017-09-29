<?php include 'sessioninit.php'; ?>
<html>
  <?php include 'header.php'; ?>
  <link rel="stylesheet" href="webshop.css">
  <body>

    <h2>Login Form</h2>
    <?php
    if(isset($_GET['msg']) && $_GET['msg'] === 'authfail') {
      echo '<font color=red> Wrong email or password! </font>';
    }
    show_token_error();
    ?>

    <form action="/loginhandler.php" method="post">
      <? insert_token(); ?>

      <div class="container">
        <label><b>Username</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>

        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <button type="submit">Login</button>
        <input type="checkbox" checked="checked"> Remember me
      </div>

      <div class="container" style="background-color:#f1f1f1">
        <button type="button" class="cancelbtn">Cancel</button>
        <span class="psw">Forgot <a href="#">password?</a></span>
      </div>
    </form>

  </body>
</html>
