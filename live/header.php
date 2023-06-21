
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="page.css"/>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> All user comment </title>
</head>
<body id="body">
<br><br>
<div align="left">
<a href="../news/live_news.php" class="btn btn-light">Home</a>
</div>
<br>
<!--navbar start  -->
<br>
<!--navbar start  -->
<br>
<center>
<div class="bg-dark text-white p-12px">
<div class="navbar">
<?php
require_once "config.php";
$select = "SELECT * FROM category ";
$query = mysqli_query($con , $select);
$row_count = mysqli_num_rows($query);
if($row_count>0){
while($row = mysqli_fetch_assoc($query)){
$category  =  $row['category_id']
?>
<div class="navbar bg-dark menu">
<a class="nav-item active" href="header.php?id=<?php echo $category;?>">     </a>

<?php echo $row['category_name'] ;?>
</div>
<?php
}
}
?>
</div>
</div>
</center>
<br>


<br>
</body>
</html>