<?php
require_once "config.php";
if(isset($_POST['save'])){
    $cata = mysqli_real_escape_string ($con , $_POST['category']);
    $date = date("d,M,Y");
  //  $email = mysqli_real_escape_string ($con , $_POST['chandra']);
    $insert = "insert into category (category_name,  date) values('$cata', '$date')";
    $query = mysqli_query($con  , $insert);
    if($query){
    header("location:show_add.php");
    }else {
      echo "failed query" ;
    }
}   
?>