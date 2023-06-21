<!DOCTYPE html>
<html lang="en">
<style>
    #form {
        background-color: chartreuse;
        color: green;
        font-size: x-large;
        font-family: Arial, Helvetica, sans-serif;
        padding: 27px;
    }

    #text {
        background-color: rgb(0, 162, 255);
        color: rgb(119, 128, 0);
        font-size: x-large;
        font-family: Arial, Helvetica, sans-serif;
        padding: 37px;
    }

    #body {
        background-image: url("picture/f8.jpg");
        background-size: cover;
        background-attachment: fixed;
        padding: 12px;
        color: lime;
    }
</style>

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
</head>

<body id="body">
    <br>
    <center>
        <div class="col-sm-12 col-md-14 col-lg-16 w-50" id="text">
            Sign up page
        </div>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="was-validated w-50" id="form">
            <br>
            <div>
                <?php
                session_start();
                $con = mysqli_connect("localhost", "root", "", "live_news");
                if (isset($_POST['save'])) {
                    $username = mysqli_real_escape_string($con, $_POST['username']);
                    $pass = mysqli_real_escape_string($con, md5($_POST['password']));
                    // $email =   mysqli_real_escape_string($con , $_POST['email']);
                    $f_name = mysqli_real_escape_string($con, $_POST['f_name']);
                    $l_name = mysqli_real_escape_string($con, $_POST['l_name']);
                    $role = mysqli_real_escape_string($con, $_POST['role']);
                    $today = date("m.d.y"); 
                    $select = "SELECT * FROM user_info WHERE username ='{$username}'";
                    $result3 = mysqli_query($con, $select);
                    $row_count = mysqli_num_rows($result3);
                    if ($row_count > 0) {
                        echo "<p class='alert alert-danger'>
               This username already exist tray some another username
                     </p>
                     ";
                    } else {
                        $con2 = mysqli_connect("localhost", "root", "", "live_news");
                        $query = "insert into user_info (first_name , last_name , username  , password  ,  role, date_time) 
                  values ( '$f_name' , '$l_name' ,'$username' , '$pass' ,   '$role' , '$today')";
                        $result = mysqli_query($con2, $query);
                        if ($result == true) {
                            $_SESSION['username'] = $username;
                            $_SESSION['ROLE'] = $role;
                            header("location:user.php");
                        } else {
                            echo "tray again";
                        }
                    }
                }

                ?>
            </div>
            <br>
            <div class="col-sm-12 col-md-14 col-lg-16">
                <input type="text" name="f_name" placeholder="Insert your first name" class="form-control" required />
            </div>
            <br>
            <div class="col-sm-12 col-md-14 col-lg-16">

                <input type="text" name="l_name" placeholder="Insert your last name" class="form-control" required />
            </div>
            <br>
            <div class="col-sm-12 col-md-14 col-lg-16">
                <input type="text" name="username" placeholder="Insert your username" class="form-control" required />
            </div>
            <br>
            <div class="col-sm-12 col-md-14 col-lg-16">

                <input type="password" name="password" placeholder="Insert your password" class="form-control"
                    required />
            </div>
            <br>
            <div class="col-sm-12 col-md-14 col-lg-16">

                <select name="role" class="form-control" required>
                    <option selected disabled> Select your role </option>
                    <option value="0"> Moderator </option>
                    <option value="1"> Admin </option>
                </select>
            </div>
            <br><br>
            <div class="col-sm-12 col-md-14 col-lg-16">

                <input type="submit" value="Save" name="save" class="form-control btn-info w-50" required />
            </div>
            <br>
            <br>
            <input type="reset" value="Delete" class="form-control btn-outline-danger" />
            <br>
            <strong>Log in your account : </strong> <a href="login.php" class="btn btn-info w-50 form-control">login</a>
            <br><br>
            <div>
                &nbsp;&nbsp;&nbsp;
                <input type="checkbox" id="check2" style="height: 28px; width: 28px;" class="form-check-input"
                    required />
                &nbsp;&nbsp;&nbsp; <label for="check2" class="form-check-label">Agree to terms and condition.</label>
            </div>
            <br><br>

        </form>
    </center>
    <br><br>
</body>

</html>