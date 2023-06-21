<?php
require_once "config.php";
if(isset($_POST['post'])){
$title = mysqli_real_escape_string($con , $_POST['title']);
$desc = mysqli_real_escape_string($con ,$_POST['description']);
$categ =mysqli_real_escape_string($con , $_POST['category']);
//image start
$image = $_FILES['profile'];
$image_name = $image['name'];
$image_tmp = $image['tmp_name'];
$new_name = uniqid().".png";
if(!empty($image_name)){
    $location = "image/".$new_name;
    $upload = move_uploaded_file($image_tmp , $location);
  }
  //end
  $query = "insert into post(title , description , category , post_image)
  values('{$title}' , '{$desc}' , '{$categ}' , '{$new_name}')";
  $result = mysqli_query($con , $query) ;//or die("Query failed");
       if($result){
           header("location:live_news.php");
       }else{
           echo "Failed";
       }
}
?>