<?php
require_once "config.php";
if(isset($_POST['post'])){
//image start 
$image = $_FILES['profile'];
$image_name = $image['name'];
$image_type=$image['type'];
$image_tmp = $image['tmp_name'];
$image_error = $image['error'];
$image_size = $image['size']; //na ty t e s --> name type tmp_name error size
$file_ext = explode("." , ".$image_name");
$acctualExt = strtolower(end($file_ext));
$extensions  = array("jpg" , "png" , "jpeg");
if(in_array( $acctualExt , $extensions)){
if($image_size < 2000000){
$new_name = uniqid().".$acctualExt";
if(empty($image_error)){
$location = "uploads/".$new_name;
move_uploaded_file($image_tmp , $location);
//echo "<img src='$location'/>";
}else {
?>
<script type="text/javascript">
alert("You have some error at the time of uploading");
window.location="post_user.php";
</script>
<?php
}
}else {
?>
<script type="text/javascript">
alert("Your file is too big please select 2 mb or lower");
window.location="post_user.php";
</script>
<?php
}
}else {
?>
<script type="text/javascript">
alert("This extention are not allowed please select jpg , jpeg or png type file");
window.location="post_user.php";
</script>
<?php
}
//image end 
session_start();
$title = mysqli_real_escape_string ($con , $_POST['title']);
$description =mysqli_real_escape_string ($con , $_POST['description']);
$category =mysqli_real_escape_string ($con , $_POST['category']);
date_default_timezone_set("Asia/Dhaka");
$date = date( "d,M,Y" );
$author =    $_SESSION['username'];
$select = "INSERT INTO post (title  ,description , category , post_date ,  post_image , author)
VALUES('$title' ,  '$description' ,  '$category' , '$date' ,  '$new_name' , '$author');";
$select2 = $select."UPDATE category  SET post = post + 1 WHERE category_name = '{$category}'";
$result = mysqli_multi_query($con ,  $select2) ;
if($result){
header("location:show_add.php?added");
}else{
echo "our data not inserted.";
}
}
?>

