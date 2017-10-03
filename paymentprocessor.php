<?php include 'sessioninit.php';
check_token('cart');
?>
<!DOCTYPE html>
<html>
<head/>
  <body>
  Note to purchasing: buy us a payment processor, we are <u>not</u> qualified to roll our own!
    <form action="receipt.php" method="post">
      <?php insert_token(); ?>
      <button type="submit">Continue</button>
    </form>
  </body>
</html>