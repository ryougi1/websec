<html>
<h1>Webshop</h1>

<h2>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
}
</style>
</h2>

<?php include 'header.php'; ?>

</body>








<style>
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
    float: left;
    width: 25%;
}

/* Float cancel and signup buttons and add an equal width */
.signupbtn {
    float: right;
    width: 25%;
}

/* Add padding to container elements */
.container {
    padding: 100px;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
</style>
<body>

<h2>Signup Form</h2>

<form action="/action_page.php" style="border:1px solid #ccc">
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
