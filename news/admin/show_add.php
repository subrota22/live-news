<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>  show add category </title>
</head>
<body class="body">
<br><br>
<center>
<a href="post_user.php" class="btn btn-info"> Add post number </a>  
<br><br>
<table class="table">    
<?php
require_once "../config.php";
$select = "SELECT * FROM category";
$result =  mysqli_query($con , $select) or die("Query Failed");
$row_count = mysqli_num_rows($result);
if($row_count > 0){
?>
<thead class="bg-dark text-white">
<th> Serial Number </th>
<th>Category  ID </th>
<th> Category Name </th>
<th> Post </th>
<th> Date </th>
</thead>
<?php
$serial = 0 ;

while($row = mysqli_fetch_assoc($result)){
$ca_id = $row['category_id'];
$ca_name = $row['category_name'];
$post = $row['post'];
$date = $row['date'];
$serial++;
?>
<tbody>    
<td> <?php echo $serial ;  ?> </td>
<td> <?php echo $ca_id ;  ?> </td>
<td> <?php echo $ca_name ;  ?> </td>
<td> <?php echo   $post  ;  ?> </td>
<td> <?php echo $date ;  ?> </td>
</tbody>
<?php
}
}
?>
</table>
</center>
<br><br>
</body>
</html>