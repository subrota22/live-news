<?php
require_once "../config.php";
if(isset($_REQUEST['delete_id'])){
$post_id = $_REQUEST['delete_id'];
$cat_id = $_REQUEST['category_id'];
$query = "DELETE FROM post WHERE post_id = {$post_id };";
$query = $query."UPDATE category SET post = post - 1 WHERE category_id = {$cat_id };";
$result = mysqli_multi_query($con , $query);
if($result){
 header("location:post_page.php?deleted");
}else {
    echo "Your date is not deleted";
}
}else {
    echo "query failed";
}
?>