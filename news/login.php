<!DOCTYPE html>
<html lang="en">
<style>
  #body {
    background-image: url("picture/s5.jpg");
    background-size: cover;
    background-attachment: fixed;
    padding: 12px;
    color: rgb(38, 0, 255);
  }

  #form {
    background-color: rgba(14, 224, 112, 0.7);
    padding: 43px;
    font-size: x-large;
    font-family: Arial, Helvetica, sans-serif;
  }

  #text {
    font-size: x-large;
    background-color: indigo;
    padding: 32px;
    font-family: serif;
  }
</style>

<head>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>log in form </title>
</head>

<body id="body">
  <br>
  <center>
    <center>
      <div class="col-md-23 col-sm-34 w-50" id="text">
        <i>Log in Page</i>
      </div>
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="was-validated w-50" id="form">
        <br>
        <div>
          <?php
          session_start();
          require_once "config.php";
          if (isset($_POST['log_in'])) {
            $username = mysqli_real_escape_string($con, $_POST['username']);
            $password = md5($_POST['password']);
            $query = "SELECT username , password , user_id , role  FROM user_info WHERE username ='{$username}' AND password= '{$password}'";
            $result = mysqli_query($con, $query);
            $row_count = mysqli_num_rows($result);
            if ($row_count > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['ROLE'] = $row['role'];
                if ($_SESSION['ROLE'] == '0') {
                  header("location:live_news.php");
                } elseif ($_SESSION['ROLE'] == '1') {
                  header("location:category.php");
                }
              }
            } else {
              echo "<center> <h3 class='alert alert-danger'> Your username or password was mismatched. </h3> </center>";
            }
          }
          ?>
        </div>
        <br>
        <div class="col-md-23 col-sm-34">
          <label for="username" class="form-check-label"> Username:</label>
          <input type="text" name="username" placeholder="Insert your username" class="form-control" required />


          <div class="invalid-feedback alert-danger">As soon as possible enter your username.</div>
          <div class="valid-feedback alert-success"> It's will be valid if you entered valid username.</div>
        </div>
        <br>
        <div class="col-md-23 col-sm-34">
          <label for="password" class="form-check-label"> Password:</label>

          <input type="password" name="password" placeholder="Insert your password" class="form-control" required />
          <div class="invalid-feedback alert-danger">As soon as possible enter your password.</div>
          <div class="valid-feedback alert-success"> It's will be valid if you entered valid password.</div>
        </div>
        <br>
        <input type="submit" value="Log In " name="log_in" class="btn btn-info form-control w-50">
        <br>
        <br>
        <input type="reset" value="Delete" class="form-control btn-outline-danger" />
        <br><br>
        <div>
          &nbsp;&nbsp;&nbsp;
          <input type="checkbox" id="check2" style="height: 28px; width: 28px;" class="form-check-input" required />
          &nbsp;&nbsp;&nbsp; <label for="check2" class="form-check-label">Agree to terms and condition.</label>
        </div>
        <br><br>
        <center>
          <b> <strong>Reset your account</strong> | <a target="blank" href="reset_password.html">Forgot password
            </a></b>
        </center>
        <br>
        <center>
          <b> <strong>Create your account</strong> | <a target="blank" href="register.php"> Sign up page </a></b>
        </center>
        <br>
      </form>
      <br>
    </center>
    <br>
</body>

</html>