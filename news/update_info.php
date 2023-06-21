<?php
session_start();
$con = mysqli_connect("localhost" , "root" , "" , "news");
if(isset($_POST['sign_up'])){
$first_name = mysqli_real_escape_string($con , $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($con ,$_REQUEST['last_name']);
$username = mysqli_real_escape_string($con ,$_REQUEST['username']);
$email = mysqli_real_escape_string($con ,$_REQUEST['email']);
$password  =mysqli_real_escape_string($con , $_REQUEST['password']);
$password_hash = password_hash($password , PASSWORD_BCRYPT);
// $user_role  =  mysqli_real_escape_string($con , $_REQUEST['user_role']);
$hidden = mysqli_real_escape_string($con , $_REQUEST['hidden']);
$insert = "UPDATE `hello` SET `First_Name`='$first_name',`Last_Name`='$last_name',`Username`='$username',`Email`='$email',`Password`='$password'  WHERE ID ='$hidden'";
$query = mysqli_query($con , $insert);
if($query==true){            
$_SESSION['username'] = $username; 
header("location:data_info.php");
}
}
?>