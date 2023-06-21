<?php
$dat = date("D, M , Y"); 
$time = time_nanosleep();
echo $time;
echo $dat;
if(isset($_POST['log_in'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role  = $_POST['role'];

 $con = mysqli_connect("localhost" , "root" , "" , "news");
$sql = "insert into add_user(First_Name  ,  Last_Name , Username , Email , Password , User_Role)
 values('$fname' , '$lname' , '$username' , '$email' , '$password' , '$role' )";

$query = mysqli_query($con , $sql) or die ("Query failed");
if($query){
    $_SESSION['username'] = $username ; 
    header("location:welcome.php");
}else{
    echo "failed";
}
  
   }
?>