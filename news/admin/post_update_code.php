<?php
require_once "config.php" ;
if(isset($_REQUEST['hidden_id'])){
$title = $_REQUEST['title_name'];
$des = $_REQUEST['description'];
$cata = $_REQUEST['category_name'];
//image start from here to display and validation
if(empty($_FILES['new-file'])){
$new_name = $_POST['old_image']; 
}else {
$file_name = $_FILES['new-file']['name'];
$file_size = $_FILES['new-file']['size'];
$file_tmp = $_FILES['new-file']['tmp_name'];
$file_error =  $_FILES['new-file']['error'];
$file_type = $_FILES['new-file']['type'];
$fileEX = explode("." , $file_name);
$file_ext =  strtolower(end($fileEX));
$extentions = array("jpg" , "png" , "jpeg");
if(in_array($file_ext,$extentions)){
if($file_size <= 2097152){
$new_image_name = uniqid().".$file_ext";
if(empty( $file_error)){
$location = "uploads/".$new_image_name;
move_uploaded_file($file_tmp, $location);
}else {
echo "please select a file";
}
}else {
echo "Your file is too big please select 2 mb size file";
}
}else {
    ?>
    <script type="text/javascript">
    alert("This type of extention are not allowed please select jpg or png type file"); 
  //  window.location = "update_post.php";
     </script>
<?php
}
}
//image end from here to display and validation
$hidden = $_REQUEST['hidden_id'];
$old_category = $_REQUEST['old-category'];
$query = "UPDATE post SET post.title ='$title' , post.description = '$des', 
post.category='$cata' , post.post_image='$new_image_name'  WHERE post.post_id ={$hidden}";
if($old_category != $cata ){
$query = $query . "UPDATE category SET post = post - 1 WHERE category_id = {$old_category}";
$query = $query .  " UPDATE category SET post = post + 1 WHERE category_id={$category}"; //law--> a+=1 --> a=a+1//
} 
echo $query;
$result = mysqli_multi_query($con , $query);
if($result){
header("location:post_page.php?updated");
}else {
echo "Your date is not updated";
}
}
?>
