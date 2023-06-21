<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> heading </title>
</head>
<body>
    <br>
     <!--navbar start  -->
     <br>
    <center>
        <div class="bg-dark text-white p-12px">
            <div class="navbar">
               <?php
require_once "config.php";
$select = "SELECT * FROM post ";
$query = mysqli_query($con , $select);
$row_count = mysqli_num_rows($query);
                             if($row_count>0){
                                 while($row = mysqli_fetch_assoc($query)){
                                     ?>
<div class="navbar bg-dark menu">
<a href="head_file.php?id=<?php echo $row['post_id'] ;?>" class="nav-item"> <?php echo $row['category'] ;?>  </a>
</div>
                                     <?php
                                 }
                             }
?>
            </div>
        </div>
    </center>
    <br>
</body>
</html>