<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "live_news");
if (isset($_POST['sign_up'])) {
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, md5($_POST['password']));
    $user_role = mysqli_real_escape_string($con, $_POST['user_role']);
    $select = "select * from user_info where username='$username'";
    $result = mysqli_query($con, $select);
    $row_count = mysqli_num_rows($result);
    if ($row_count > 0) {
        //while(mysqli_fetch_assoc($result)){
        echo "<h3 style='color:blue; text-align:center;' class='alert-danger'> This username  or email already exist </h3>";
        // }
    } else {
        $con = mysqli_connect("localhost", "root", "", "live_news");
        $insert = "insert into user_info (first_name , last_name , username ,  password  , role)
    values('$first_name' , '$last_name' ,'$username' , ' $password' , '$user_role' )";
        $query = mysqli_query($con, $insert);
        if ($query == true) {
            $_SESSION['username'] = $username;
            header("location:user.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<style>
    .form {
        background-color: rgba(130, 25, 78, 0.8);
        color: rgba(14, 125, 18, 0.9);
        padding: 20px;
        font-family: cursive;
    }

    .body {
        background-attachment: fixed;
        background-image: url("picture/s4.jpg");
        background-size: cover;
        padding: 12px;
    }
</style>

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User </title>
</head>

<body class="body">
    <br><br>
    <center>
        <br>
        <div class="col-lg-24 col-md-23 col-sm-34 w-50" style="background-color:lime; padding:30px; color:blue;">
            <h3>Add User </h3>
        </div>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="was-validated w-50 form">

            <br>
            <div class="col-lg-24 col-md-23 col-sm-34">
                <input type="text" name="first_name" placeholder="Insert your first name" class="form-control"
                    required />
                <div class="invalid-feedback alert-danger"> Enter your first name </div>
                <div class="valid-feedback alert-info">Your first name is taking </div>
            </div>
            <br>
            <div class="col-lg-24 col-md-23 col-sm-34">
                <input type="text" name="last_name" placeholder="Insert your last name" class="form-control" required />
                <div class="invalid-feedback alert-danger"> Enter your last name </div>
                <div class="valid-feedback alert-info">Your last name is taking </div>

            </div>
            <br>
            <div class="col-lg-24 col-md-23 col-sm-34">
                <input type="text" name="username" placeholder="Insert your username" class="form-control" required />
                <div class="invalid-feedback alert-danger"> Enter your first username </div>
                <div class="valid-feedback alert-info">Your username is taking </div>

            </div>
            <br>
            <div class="col-lg-24 col-md-23 col-sm-34">
                <input type="password" name="password" placeholder="Insert your valid password " class="form-control"
                    required />
                <div class="invalid-feedback alert-danger"> Create your password </div>
                <div class="valid-feedback alert-info">Your password is taking </div>

            </div>
            <br>
            <div class="col-lg-24 col-md-23 col-sm-34">
                <select name="user_role" class="form-control">
                    <option selected disabled> Select your role </option>
                    <option value="0"> Moderator </option>
                    <option value="1"> Admin </option>
                </select>
            </div>
            <br>
            <div class="col-lg-24 col-md-23 col-sm-34">
                <input type="submit" name="sign_up" value="Save" class="form-control w-50 btn-info" />
            </div>
            <br>

            <br>
            <center>
                <div class="form-check">
                    &nbsp; &nbsp; &nbsp;
                    <input class="form-check-input" type="checkbox" style="height: 28px; width: 28px;"
                        id="invalidCheck2" required>
                    &nbsp; &nbsp; &nbsp; <label class="form-check-label" for="invalidCheck2"> Agree to terms and
                        conditions </label>
                </div>
            </center>
            <br><br>
            <center>
                <b> <strong>Log in your account</strong> | <a target="blank" href="login.php">Login</a></b>
            </center>
            <br>
        </form>

    </center>
    <br><br>
</body>

</html>