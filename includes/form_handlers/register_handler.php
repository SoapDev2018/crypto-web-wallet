<?php
  $first_name = "";
  $last_name = "";
  $email = "";
  $conf_email = "";
  $password = "";
  $conf_password = "";
  $error_array = array();
  if(isset($_POST['register_btn'])) {
    //First Name
    $first_name = strip_tags($_POST['reg_fname']);
    $first_name = mysqli_real_escape_string($con, $first_name);
    $first_name = str_replace(' ','',$first_name);
    $first_name = ucfirst(strtolower($first_name));
    $_SESSION['reg_fname'] = $first_name;

    //Last Name
    $last_name = strip_tags($_POST['reg_lname']);
    $last_name = mysqli_real_escape_string($con, $last_name);
    $last_name = str_replace(' ','',$last_name);
    $last_name = ucfirst(strtolower($last_name));
    $_SESSION['reg_lname'] = $last_name;

    //Email
    $email = strip_tags($_POST['reg_email']);
    $email = mysqli_real_escape_string($con, $email);
    $email = str_replace(' ','',$email);
    $email = strtolower($email);
    $_SESSION['reg_email'] = $email;

    //Confirm Email
    $conf_email = strip_tags($_POST['reg_conf_email']);
    $conf_email = mysqli_real_escape_string($con, $conf_email);
    $conf_email = str_replace(' ','',$conf_email);
    $conf_email = strtolower($conf_email);
    $_SESSION['reg_conf_email'] = $conf_email;
    
    //Password and confirm password
    $password = strip_tags($_POST['reg_password']);
    $password = mysqli_real_escape_string($con, $password);
    $conf_password = strip_tags($_POST['reg_conf_password']);
    $conf_password = mysqli_real_escape_string($con, $conf_password);

    //Current Date
    $date_object = new DateTime();
    $date = $date_object->format('Y-m-d');

    //Email checking
    if($email == $conf_email) {
      //Check if email is in valid format
      if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $email_check_query = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");
        if(mysqli_num_rows($email_check_query) > 0)
          array_push($error_array, "Email already exists in database!<br>");
      }
      else
        array_push($error_array, "Email is in invalid format!<br>");
    }
    else
      array_push($error_array, "Emails do not match!<br>");

    //Validating first name and last name
    if(strlen($first_name) > 32 || strlen($last_name) < 2)
      array_push($error_array, "Your first name should be between 2 and 32 characters long!<br>");
    if(strlen($last_name) > 32 || strlen($last_name) < 2)
      array_push($error_array, "Your last name should be between 2 and 32 characters long!<br>");

    if($password != $conf_password)
      array_push($error_array, "Your passwords do not match!<br>");
    if(strlen($password) > 64 || strlen($password) < 8)
      array_push($error_array, "Your password should have a length between 8 and 64 characters long!<br>");

    if(empty($error_array)) {
      $password = md5($password);

      //Generating username by concatenating first name and last name
      $last = "";
      $row = "";
      $username = strtolower($fname . "_" . $lname);
      $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
      $i = 0;
      while(mysqli_num_rows($check_username_query) != 0) {
        ++$i;
        $username = $username . "_" . $i;
        $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
        if(mysqli_num_rows($check_username_query) != 0) {
          $last = strrpos($username, "_");
          $last = substr($last, strlen($username)-1);
          $username = substr($username,0,$last-2);
          if(is_numeric($last))
            $i = (int)$last;
        }
      }

      //Generating hash for verification
      $code_date = date("Y-m-d H:i:s");
      $code_date = md5($date);
      $code = md5(rand(0, 1000));
      $code = $code . $code_date;
      $hash = md5($code);

      $query = mysqli_query($con, "INSERT INTO users VALUES('','$first_name','$last_name','$username','$email','$password','$date','$hash','no','no')");
      array_push($error_array, "<span class='error_' style='color: #14C800;'>You're all set! Go ahead and verify your email with the link sent to your profile!</span><br>");

      $to = $email;
      $subject = 'Signup | Verification | Coinallet | Multiple Cryptocurrency Wallet'; // Give the email a subject 
      $message = '
      
      Thanks for signing up!
      Your account has been created, you can login with the credentials you have provided after you have activated your account by pressing the url below.
      Please click this link to activate your account:
      http://example.com/verify.php?email='.$email.'&hash='.$hash.'
      
      ';
      $headers = 'From:noreply@example.com' . "\r\n"; // Set from headers
      mail($to, $subject, $message, $headers); // Send our email

      //Clear session variables
      $_SESSION['reg_fname']="";
      $_SESSION['reg_lname']="";
      $_SESSION['reg_email']="";
      $_SESSION['reg_conf_email']="";
    }
  }
?>