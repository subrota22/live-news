<!DOCTYPE html>
<html lang="en">
<style>
#body {
background-image: url("../picture/nature.gif");
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
<title> Add post  form  page </title>
</head>
<body id="body">
<br><br>
<center>
<form action="post.php" method="post" id="form"  enctype="multipart/form-data" class="was-validated w-50">
<br>
<h3 class="text-white"> Add user post </h3>
<br>
<div class="">
<label for="title"> Title </label>
<input type="text" name="title" id="title" placeholder="Enter your title" class="form-control" required/>
</div>
<br>
<div>
<label for="description"> Description </label>
<textarea name="description" rows="5"  class="form-control" placeholder="Enter your description.">
</textarea>
</div>
<br>
<div>
<?php
require_once "config.php" ;
?>
<label for="catagory"> Catagory </label>
<select name="category"  class="form-control">
<option selected disabled > Select your category </option>
<?php
session_start();
$select = "select * from category";
$query = mysqli_query($con , $select) or die("Query failed") ;
$count = mysqli_num_rows($query);
if($count > 0){
?>
<?php
while($row = mysqli_fetch_assoc($query)){ 
$_SESSION['user_id'] =  $row['user_id'] ;
?>
<option value="<?php echo $row['category_name'] ?>"><?php echo $row['category_name'] ?></option>
<?php 
}
}
?>
</select>
</div>
<br>
<div>
<input type="file" name="profile" class="form-control"/>
<div>You mus be choice jpg , jpeg and png file lower than 2 mb </div>
</div>
<input type="hidden" name="old-file" value="<?php  echo $row['post_image'] ?>">
<br>
<div> 
</div>
<input type="submit" name="post" value=" Save " id="click" class="form-control w-100 btn-info"/>
<br>
<input type="reset" value="Delete" class="form-control btn-danger w-100"/>
<br>
<div>
&nbsp;&nbsp;&nbsp;  <input type="checkbox" style="height: 28px; width: 28px;" id="check2" class="form-check-input" required/>
&nbsp;&nbsp;&nbsp; <label for="check2" class="form-check-label">Agree to terms and condition.</label>
</div>
<br>
&copy; copy write by subrota chandra sharker 
<br>
<center>
</form>
</center>
<br><br>
</body>
</html>