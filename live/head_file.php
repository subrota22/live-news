<!DOCTYPE html>
<html lang="en">
<head>
    <!--Bootstrap Link -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="page.css"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> post page  </title>
</head>
<body id="bd4">
    <br>
<?php
require "header.php";
 if(isset($_REQUEST['id'])){
    $post_id = $_REQUEST['id'];
}
?>

<?php
require_once "config.php";
$select3 = "SELECT * FROM post WHERE post_id=     $post_id ";
$query4 = mysqli_query($con , $select3);
$row_num = mysqli_num_rows($query4);
if($row_num>0){
    while($row_cat = mysqli_fetch_assoc($query4)){
        ?>
<h2 style="color:green;">   <?php echo strtoupper($row_cat['category']); ?>  </h2>
        <?
    }
}
?>
<hr style="border: 2px solid blue;">
<?php
$post_id = $_REQUEST['id'];
$con = mysqli_connect("localhost" , "root" , "" , "live_news");
$select = "SELECT * FROM post WHERE post_id={$post_id}";
$query = mysqli_query($con , $select);
$row_count = mysqli_num_rows($query);
if($row_count > 0){
    ?>
    <?php
    $serial = 0 ; 
    while($row = mysqli_fetch_assoc($query)){
        $post_id = $row['post_id'];
        $title = $row['title'];
        $cat = $row['category'];
        $description = $row['description'];
        $date = $row['post_date'];
        $image = $row['post_image'];
       $serial++;
       ?>
          <!--title  , photos and description strat -->
          <center>
          <div align="left" id="div4">
          <div  align="right">
    <?php echo $date; ?>
</div>
<br>
    <div  id="div">
        <center> 
    <h2>  <caption> <a href="live_news.php?cid=<?php echo  $post_id;  ?>"> 
    <?php  echo    $title  ?> </a>   </caption></h2>
</center>
<br>
            <table> 
            <tbody>  
                <tr id="table">  
                    <td id="table" colspan="4">    
                        <div class="w-50 picture3 " >
                        <a href="live_news.php?id=<?php echo  $post_id;  ?>">
                          <img  src="../news/image/<?php echo $image ;  ?>" alt="user post" style="height: 128px; width: 129px; border:2px solid blue;" />      
                          
     </a>
                        </div>
                                       </td> 
                    <td id="table" colspan="4">    
            <div class="text">
                <?php echo $description ;?>
       </td>     
            </div>
        </tr>  
        </tbody>
        </table>
        </div>
    </div>
    </div>
    <!--title  , photos and description end -->
       <?php

    }
           }
include("write.html");
?>

</center>
    </table>
    <br><br>
    </center>
    </body>
    </html>