<?php
  include("config/config.php");
  include("includes/form_handlers/register_handler.php");
  include("includes/form_handlers/login_handler.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="assets/js/register.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register | Coinallet</title>
  <link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.8.1/css/all.css">
  <link rel="stylesheet" href="https://static.fontawesome.com/css/fontawesome-app.css">
</head>
<body>
  <?php
    if(isset($_POST['register_btn'])) {
      echo '
        <script>
          $(document).ready(function () {
            $(".first").hide();
            $(".second").show();
          });
        </script>
      ';
    }
  ?>
  <div class="container">
    <div class="header">
      <h2>Coinallet - The Multiple CryptoCurrency Wallet!</h2>
    </div>
    <div class="body">
      <div class="form_wrapper">
        <div class="form_header">
          Register/Login to get started to Coinallet - The Multiple CryptoCurrency Wallet!
        </div>
        <div class="first">
          <form action="register.php" method="POST">
            <input type="email" name="log_email" id="log_email" placeholder="Email" value="<?php 
              if(isset($_SESSION['log_email'])) echo $_SESSION['log_email'];
              ?>" required>
            <br>
            <input type="password" name="log_password" id="log_password" placeholder="Password">
            <br>
            <?php if(in_array("Email or password was incorrect<br>", $error_array))
                echo "Email or password was incorrect<br>"; ?>
            <?php if(in_array("Your account was not activated! A new activation email has been sent to your email<br>", $error_array))
                echo "Your account was not activated! A new activation email has been sent to your email<br>"; ?>
            <input type="submit" name="login_btn" value="Login!">
            <br>
            <a href="#" id="signup" class="signup">Need an account? Register Here</a>
          </form>
        </div>
        <div class="second">
          <div class="form_body">
            <form action="register.php" method="POST">
              <input type="text" name="reg_fname" id="reg_fname" placeholder="First Name" value="<?php
                if(isset($_SESSION['reg_fname'])) echo $_SESSION['reg_fname']; ?>"><br>
              <?php if(in_array("Your first name should be between 2 and 32 characters long!<br>", $error_array))
                      echo "Your first name should be between 2 and 32 characters long!<br>"; ?>
              <input type="text" name="reg_lname" id="reg_lname" placeholder="Last Name" value="<?php
                if(isset($_SESSION['reg_lname'])) echo $_SESSION['reg_lname']; ?>"><br>
              <?php if(in_array("Your last name should be between 2 and 32 characters long!<br>", $error_array))
                      echo "Your last name should be between 2 and 32 characters long!<br>"; ?>
              <input type="email" name="reg_email" id="reg_email" placeholder="Email" value="<?php
                if(isset($_SESSION['reg_email'])) echo $_SESSION['reg_email']; ?>"><br>
              <input type="email" name="reg_conf_email" id="reg_conf_email" placeholder="Confirm Email" value="<?php
                if(isset($_SESSION['reg_conf_email'])) echo $_SESSION['reg_conf_email']; ?>"><br>
              <?php if(in_array("Emails do not match!<br>", $error_array))
                      echo "Emails do not match!<br>";
                    else if(in_array("Email is in invalid format!<br>", $error_array))
                      echo "Email is in invalid format!<br>";
                    else if(in_array("Email already exists in database!<br>", $error_array))
                      echo "Email already exists in database!<br>"; ?>
              <input type="password" name="reg_password" id="reg_password" placeholder="Password" autocomplete="new-password"><br>
              <input type="password" name="reg_conf_password" id="reg_conf_password" placeholder="Confirm Password" autocomplete="new-password"><br>
              <?php if(in_array("Your passwords do not match!<br>", $error_array))
                      echo "Your passwords do not match!<br>";
                    else if (in_array("Your password should have a length between 8 and 64 characters long!<br>", $error_array))
                      echo "Your password should have a length between 8 and 64 characters long!<br>"; ?>
              <input type="submit" name="register_btn" value="Register!"><br>
              <?php if(in_array("<span style='color: #14C800;'>You're all set! Go ahead and verify your email with the link sent to your profile!</span><br>", $error_array))
                      echo "<span style='color: #14C800;'>You're all set! Go ahead and verify your email with the link sent to your profile!</span><br>"; ?>
              <a href="#" id="login" class="login">Already have an account? Signin here</a>
            </form>
          </div>
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