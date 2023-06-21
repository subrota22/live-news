<?php
require_once "config.php";
if(isset($_POST['add'])){
    $title = mysqli_real_escape_string($con , $_POST['title']);
    $des = mysqli_real_escape_string($con , $_POST['description']);
 $cata = mysqli_real_escape_string($con , $_POST['cata_text']);
  $pic = $_FILES['profile'];
    $pic_name = $pic['name'];
    $pic_tmp = $pic['tmp_name'];
    $new_name = uniqid().".png";
    if(!empty($pic_name)){
        $loction = "image/";
        move_uploaded_file($pic_tmp , $loction.$new_name);
    }else{
        echo "not inserted";
    }
  
    $insert = "insert into add_catagory values('$title' , '$des' , '$cata' , '$new_name')";
    $result = mysqli_query($con , $insert);
    if($result){
     header("location:catagory.php");
    }else{
        echo "error";
    }
}
?>
