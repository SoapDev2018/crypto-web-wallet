<?php
  $first_name = "";
  $last_name = "";
  $email = "";
  $conf_email = "";
  $password = "";
  $conf_password = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register | Project Sapphire</title>
  <link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.8.1/css/all.css">
  <link rel="stylesheet" href="https://static.fontawesome.com/css/fontawesome-app.css">
</head>
<body>
  <div class="container">
    <div class="header">
      <h2>Coinallet - The Multiple CryptoCurrency Wallet!</h2>
    </div>
    <div class="body">
      <div class="form_wrapper">
        <div class="form_header">
          Register to get started to Coinallet - The Multiple CryptoCurrency Wallet!
        </div>
        <div class="form_body">
          <form action="register.php" method="POST">
            <input type="text" name="reg_fname" id="reg_fname" placeholder="First Name"><br>
            <input type="text" name="reg_lname" id="reg_lname" placeholder="Last Name"><br>
            <input type="email" name="reg_email" id="reg_email" placeholder="Email"><br>
            <input type="email" name="reg_conf_email" id="reg_conf_email" placeholder="Confirm Email"><br>
            <input type="password" name="reg_password" id="reg_password" placeholder="Password" autocomplete="new-password"><br>
            <input type="password" name="reg_conf_password" id="reg_conf_password" placeholder="Confirm Password" autocomplete="new-password"><br>
            <input type="submit" name="register_btn" value="Register!">
          </form>
        </div>
      </div>
    </div>
    <div class="footer">
      <h4>Find us in Facebook or Twitter or email us directly</h4>
      <ul>
        <li><a href="#"><i style="color: white;" class="fab fa-facebook-square fa-2x"></i></a></li>
        <li><a href="#"><i style="color: white;" class="fab fa-twitter-square fa-2x"></i></a></li>
        <li><a href="#"><i style="color: white;" class="fas fa-envelope fa-2x"></i></a></li>
      </ul>
    </div>
  </div>
</body>
</html>