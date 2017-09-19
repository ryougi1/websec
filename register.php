<html>
<?php include 'header.php'; ?>

<link rel="stylesheet" href="webshop.css">
<body>

<h2>Signup Form</h2>

<form action="/signuphandler.php" method="post" style="border:1px solid #ccc">
  <div class="container">
    
     <label><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" name="name" required>

     <label><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="name" required>

    <label><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

    <label><b>Address</b></label>
    <input type="text" placeholder="Enter Address" name="address" required>

    <label><b>Zipcode</b></label>
    <input type="text" placeholder="Enter Zipcode" name="zipcode" required>

    <label><b>City</b></label>
    <input type="text" placeholder="Enter City" name="city" required>

    <label><b>Country</b></label>
    <input type="text" placeholder="Enter Country" name="country" required>
    

    <input type="checkbox" checked="checked"> Remember me
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>

</body>
</html>
