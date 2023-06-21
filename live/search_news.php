<!DOCTYPE html>
<html lang="en">
    <style>
#img{
    height: 128px;
     width: 129px;
    align-items: center;
}
#img:hover{
    transform: scale(0.8);
    border: 2px solid blue;
    transition-duration: 2s;
}
    </style>
<head>
    <!--Bootstrap Link -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="search-design.css"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> search match page  </title>
</head>
<body id="bd4">
<?php
require "header.php";
?>
     <!--search option start -->
     <!--search form start -->
<div  class="div-right">
    <div  id="border"></div>
    <form  metod="post" action="search_news.php" class="was-validated w-100">
    <div class="input-left">
     <input type="search"   class="form-control" placeholder="Search by title" name="text-search"  required/>
    </div>
    
    <input type="submit" value="Search" name="search" class="btn btn-info" /> 
 
  
    
    </form> 
</div>
<br><br>
<!--search form end -->
<?php
//search query and fetch start 
require_once "config.php";
if(isset($_REQUEST['search'])){
  $search =  mysqli_real_escape_string ($con , $_REQUEST['text-search']);
$select = "SELECT * FROM `post` WHERE `title` LIKE '%$search%'  ";
$query = mysqli_query($con , $select);
$row_count = mysqli_num_rows($query);
if($row_count > 0){
    ?>
    <?php

    while($row = mysqli_fetch_assoc($query)){
        $post_id = $row['post_id'];
        $title = $row['title'];
        $cat = $row['category'];
        $description = $row['description'];
        $date = $row['post_date'];
        $image = $row['post_image'];

        //search query and fetch ends  
       ?>

<!--post image , title , description start -->
<div class="div4">
<center> 
    <h4 style="color:tomato;">  <caption > <?php echo  $title;  ?> </caption></h4>
</center>
<div   style="color:white;">
    <?php echo $date; ?>
</div>
<br> 
<div class="div" style="float:center; padding-left:45px; margin-bottom :10px;">
<a href="singale_page.php?pid=<?php echo $post_id ;  ?>" >             
<img  src="../news/uploads/<?php echo $image ;  ?>" alt="user post image" style="border: 2px solid green; height: 124px; width: 124px; " class="img"/>           
    </a>
</div>
        <div class="text">
      <?php  echo substr($description,0,45).".......";?>
        </div>
        <br>

        <div class="btn">

         <a href="singale_page.php?pid=<?php echo $post_id ;  ?>">
         
         <button class="btn btn-success">Read Mord</button>
     
        </a>
    </div>

</div>
<br><br>
<!--post image , title , description end -->  

    <!--title  , photos and description end -->
       <?php

    }
  }else{
      ?>
      <script type="text/javascript">
    alert("Sorry this type of data are not available in our room");
    </script>
      <?php
  }
              }
            
//include("write.html");
?>

</center>
    </table>
    <br><br>
    </center>
    </body>
    </html>