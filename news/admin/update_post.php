<!DOCTYPE html>
<html lang="en">
<style>
#body {
background-image: url("picture/f6.jpg");
background-size: cover;
background-attachment: fixed;
padding: 12px;
color:lime;
}
#form{
background-color: rgba(45,78,56,0.8);
padding: 23px;
font-size: x-large;
font-family: serif;
border-radius: 12px;
}
</style>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Catagory form  page </title>
</head>
<body id="body">
<br><br>
<center>
<?php
require_once "../config.php"; ;
if(isset($_REQUEST['edit_id'])){
$re_id = $_REQUEST['edit_id'];
$select2 = "SELECT  post.post_id , post.post_date , post.description ,
post.post_image, post.title, category.category_name , user.username 
FROM post LEFT JOIN  category ON post.category = category.category_id
LEFT JOIN user ON post.post_id = user.user_id WHERE post_id = {$re_id}";
$result = mysqli_query($con , $select2);
$row_count = mysqli_num_rows($result);
if($row_count > 0 ){
while($row = mysqli_fetch_assoc($result)){
?>
<form action="post_update_code.php" method="post" id="form"  enctype="multipart/form-data" class="was-validated w-50">
<br>
<h3>  post user update form  </h3>
<br>
<div class="">

<label for="title"> Title </label>
<input type="text" name="title_name" id="title" value="<?php echo $row ['title']  ?>" placeholder="Enter your title" class="form-control" required/>
</div>
<br>
<div>
<label for="description"> Description </label>
<textarea name="description" rows="5"  class="form-control" placeholder="Enter your description.">
<?php echo $row ['description']  ?>
</textarea>
</div>
<br>
<div>
<?php
require_once "../config.php";
?>
<label for="catagory"> Catagory </label>
<select name="category_name"  class="form-control"  value="<?php echo $row ['category_name']  ?>">
<option selected disabled > Select your category </option>
<?php
session_start();
$select = " SELECT * FROM category";
$query = mysqli_query($con , $select) or die("Query failed") ;
$count = mysqli_num_rows($query);
if($count > 0){
?>
<?php
while($row1 = mysqli_fetch_assoc($query)){ 
  $cat  =   $row1['category_id'];
//$_SESSION['user_id'] =  $row['user_id'] ;
if($row['category']== $row1['category_id']){ //post category and category table from category_id
$selected = "selected";
}else {
$selected = "";
}
echo "<option {$selected} value='{$row1['category_id']}'> 
{$row1['category_name']} </option>";
}
    
}

?>
</select>
</div>
<input type="hidden" name="old-category" value="<?php echo $row ['category']  ?>"/>
<br>
<div>
<div>You mus be choice jpg , jpeg and png file lower than 2 mb </div>
<input type="file" name="new-file" class="form-control"  value="<?php echo $post_row ['post_image']  ?>" />
<input type="hidden" name="old-image" value="<?php echo $row ['post_image']  ?>"/>
<br>
<div> 
<img src="uploads/<?php echo $row['post_image']  ?>" style="hieght: 124px; width:128px;"/>
</div>
<input type="hidden" name="old-image" value="<?php echo $row['post_image']  ?>"/>
<br>
<input type="submit" name="post" value="Update Post" id="click" class="form-control w-50 btn-info"/>
<input type="hidden" name="hidden_id"  value="<?php echo $row['post_id']?>"/>
<br><br>
<input type="reset" value="Delete" class="form-control btn-danger w-50"/>
<br><br>
<div>
&nbsp;&nbsp;&nbsp;  <input type="checkbox" style="height: 28px; width: 28px;" id="check2" class="form-check-input" required/>
&nbsp;&nbsp;&nbsp; <label for="check2" class="form-check-label">Agree to terms and condition.</label>
</div>
<center>
</form>
<?php
}
}
}
?>
<br>
</center>
<br><br>
</body>
</html>