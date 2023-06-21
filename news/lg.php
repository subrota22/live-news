
 <!DOCTYPE html>
<html lang="en">
  <style>
        #body {
        background-image: url("picture/s5.jpg");
        background-size: cover;
        background-attachment: fixed;
         padding: 12px;
         color:lime;
    }
   #form{
    background-color: rgba(14, 224, 112, 0.7);
        padding: 43px;
        font-size: x-large;
        font-family: Arial, Helvetica, sans-serif;
    }
    #text{
      font-size: x-large;
      background-color: indigo;
      padding: 32px;
      font-family: serif;
    }
  </style>
<head>
    <!--Bootstrap Link-->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <!--CSS Link-->
    <link rel="stylesheet" href="log_in.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in Page</title>
</head>
<body id="body">
    <br><br>
   <center>
   <div class="col-md-23 col-sm-34 w-50" id="text" >
<i >Log in Page</i>
</div>
       <form action="log_in.php" method="POST" enctype="application/x-www-form-urlencoded" class="was-validated w-50" id="form">

<br>
        <div class="col-md-23 col-sm-34" >
    <label for="username" class="form-check-label"> Username:</label>
    <input type="text" name="username" id="username"  class="form-control" placeholder="Enter your username."  required/>
 
  <div class="invalid-feedback alert-danger">As soon as possible enter your username.</div>
<div class="valid-feedback alert-success"> It's will be valid if you entered valid username.</div>
</div>
<br>

<div class="col-md-23 col-sm-34" >
    <label for="password" class="form-check-label"> Password:</label>
    <input type="password" name="password" id="password"  class="form-control" placeholder="Enter your  valid password." minlength="10" maxlength="50" required/>
    <div class="invalid-feedback alert-danger">As soon as possible enter your password.</div>
    <div class="valid-feedback alert-success"> It's will be valid if you entered valid password.</div>
</div>
<br>
<input type="submit" name="log_in" value="Log In" id="click" class="form-control btn-info"/>
<br>
<input type="reset" value="Delete" class="form-control btn-outline-danger"/>
<br>
<div>
    &nbsp;&nbsp;&nbsp; 
  <input type="checkbox" id="check2" style="height: 28px; width: 28px;" class="form-check-input" required/>
    &nbsp;&nbsp;&nbsp; <label for="check2" class="form-check-label">Agree to terms and condition.</label>
</div>

<center>
  <b> <strong>Reset your account</strong> | <a target="blank" href="reset_password.html">Forgot password  </a></b>
</center>
<br>
<center>
  <b> <strong>Create your account</strong> | <a target="blank" href="add_user.php"> Sign up page  </a></b>
</center>
<br>
</center>
       </form>
   </center> 
   <br><br>
   <script src="login.js"></script>
</body>
</html>
