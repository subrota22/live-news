<?php
session_start();
//call the server panel for the host with control panel//
  $host_name = "localhost";
    $user_name = "root";
      $control_panel_pwd = "";
        $database_name ="news";
        //database connection with mysql  or online
   $con = mysqli_connect("$host_name" , "$user_name" , "$control_panel_pwd" , "$database_name");


if(isset($_POST['add'])){
  
    $title = mysqli_real_escape_string($con , $_POST['title']);
   
 $cata = mysqli_real_escape_string($con , $_POST['cata_text']);

 $des = mysqli_real_escape_string($con , $_POST['description']);


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
  
    $insert = "insert into add_cata (Title ,  Catagory , Description , Image)
     values('$title' , '$cata' ,  '$des' , '$new_name')";
    $result = mysqli_query($con , $insert);
    if($result){
        $_SESSION['title'] =     $title;
     header("location:welcome.php");
    }else{
        echo "error";
    }
}
?>
