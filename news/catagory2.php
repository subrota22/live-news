<?php
require_once "config.php";
session_start();
$title = mysqli_real_escape_string($con, $_POST['title']);
$description = mysqli_real_escape_string($con, $_POST['discription']);
$catagory = mysqli_real_escape_string($con, $_POST['catagory']);
//image start //
$file = $_FILES['picture_name'];
$file_name = $file['name'];
$file_tmp = $file['tmp_name'];
$new_name = uniqid() . ".png";
if (!empty($file_name)) {
    $target = "image/";
    move_uploaded_file($file_tmp, $target . $new_name);
    //image end 
    $select = "insert into catagory (Title  , Description , Catagory , Picture)
 values('$title' , '$description' , '$catagory' , $new_name)";
    //$select  =  $select . "update catagory set post  = post + 1 where ID = { $catagory }";
    $result = mysqli_multi_query($con, $select);
    if ($result) {
        header("location:catagory.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<style>
    #body {
        background-image: url("picture/f6.jpg");
        background-size: cover;
        background-attachment: fixed;
        padding: 12px;
        color: lime;
    }

    #form {
        background-color: rgba(45, 78, 56, 0.8);
        padding: 23px;
        font-size: x-large;
        font-family: serif;
        border-radius: 12px;
    }
</style>

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Catagory page </title>
</head>

<body id="body">
    <br><br>
    <center>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form" enctype="multipart/form-data"
            class="was-validated w-50">
            <br>
            <h3> Add user </h3>
            <br>
            <div class="">
                <label for="title"> Title </label>
                <input type="text" name="title" id="title" placeholder="Enter your title" class="form-control"
                    required />
            </div>
            <br>
            <div>
                <label for="description"> Description </label>
                <textarea name="discription" rows="5" class="form-control">
             </textarea>
            </div>
            <br>
            <div>
                <label for="catagory"> Catagory </label>
                <select name="catagory" class="form-control">
                    <option selected disabled> Select your catagory </option>
                    <option> HTML </option>
                    <option> PYTHON </option>
                    <option> JAVA </option>
                    <option> PHP </option>
                    <option> C++ </option>
                </select>
            </div>
            <br>
            <div>
                <input type="file" name="picture_name" class="form-control" required />
            </div>
            <br>
            <div>
            </div>
            <br>
            <input type="submit" name="catagory" value=" Save " id="click" class="form-control w-50 btn-info" />
            <br><br>
            <input type="reset" value="Delete" class="form-control btn-danger w-50" />
            <br><br>
            <div>
                &nbsp;&nbsp;&nbsp; <input type="checkbox" style="height: 28px; width: 28px;" id="check2"
                    class="form-check-input" required />
                &nbsp;&nbsp;&nbsp; <label for="check2" class="form-check-label">Agree to terms and condition.</label>
            </div>
            <br>
            <center>
                <!-- 
<c/center>
<br>
<center>
  <b> <strong>Create your account</strong> | <a target="blank" href="signup.html"> Sign up page  </a></b>
enter>
  <b> <strong>Reset your account</strong> | <a target="blank" href="reset_password.html">Forgot password  </a></b>
<</center>
<br>
</center>
-->
        </form>
    </center>
    <br><br>
</body>

</html>