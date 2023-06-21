<?php
require_once "config.php";
if(isset($_REQUEST['delete_id'])){
$re_delete = $_REQUEST['delete_id'];
$pic_delt  = $_REQUEST['image_name'];
$select = "DELETE FROM `post` WHERE `post`.`post_id` =  $re_delete";
$result = mysqli_query($con , $select);
if($result){
   unlink("uploads/$pic_delt ");
    header("location:user.php");
}else{
    echo "fail to deleted";
  }
}
?>