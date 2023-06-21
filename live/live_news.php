<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="search-design.css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> All user comment and post  </title>
</head>
<body id="body">
<br><br>
<center>
        <?php
        session_start();
      if( $_SESSION['username'] == true){
          echo "<h2 style='color:green;'> Welcome this is " . $_SESSION['username'] . "</h2>"  ;
          ?>
        <a href="logout.php" class="btn btn-danger">Log Out </a>
          <?php
      }else{
          header("location:login.php");
      }
      require_once("header.php");
        ?>
        </center>
        <br>
      <!--navbar start  -->
    <br>
    <?php
    //
//$cat_id = $_REQUEST['id'];
  if(isset($_REQUEST['id'])){
    $cat_id = $_REQUEST['id'];
  }
  //
    ?>
    <center>
        <div class="bg-dark text-white p-12px">

                                     <?php
                                //} 
                             //}
?>
            </div>
        </div>
    </center>
    <br>
      <!--navbar end  -->
 


<!--search form start -->
<div  class="div-right">
    <div  ihd="border"></div>
    <form  metod="post" action="search_news.php" class="was-validated w-100">
    <div class="input-left">
     <input type="search"   class="form-control" 
        
        placeholder="Search by title" name="text-search"  required/>
 
    </div>
   <div class="input-right">
    <input type="submit" value="Search" name="search" class="btn btn-info" /> 
 
   </div>
    </form> 
</div>
<!--search form end -->

<?php

require_once "config.php";
if(isset($_REQUEST['search'])){
    $search = mysqli_real_escape_string($con , $_REQUEST['text-search'] ) ;
    $select = "SELECT * FROM `post` WHERE `category` LIKE '%$search%' ";
    $query = mysqli_query($con , $select);
    if($query){
        header("location:live_news.php");
    }else{
      ?>
<script type="text/javascript">
     alert('This type of data not available in our side');
     window.location="live_news.php";
</script>
      <?php
}
}
require_once "config.php";
$select = "SELECT * FROM post";
$query = mysqli_query($con , $select) or die("Query failed");
$row_count = mysqli_num_rows($query);
 if($row_count > 0 ){
     ?>

     <?php
     while($row = mysqli_fetch_assoc($query)){
         $post_id = $row['post_id'];
         $title = $row['title'];
         $description = $row['description'];
         $category = $row['category'];
         $date = $row['post_date'];
         $image = $row['post_image'];
         ?>
   <br>
     <!--title  , photos and description strat -->
     <div id="div2">
<br>
        <center> 
    <h2>  <caption> <a href="singale_page.php?id=<?php echo  $post_id;  ?>"> <?php echo  $title ;  ?> </a>   </caption></h2>
</center>
<br>
            <table> 
            <tbody>  
                <tr id="table">  
                    <td id="table" colspan="4">    
                        <div class="w-50 picture " >
                        <a href="singale_page.php?pid=<?php echo  $post_id;  ?>">
                          <img  src="../news/uploads/<?php echo $image ;  ?>" alt="user post" style="height: 128px; width: 129px; border:2px solid blue;" />      
                          
     </a>
                        </div>
                                       </td> 
                    <td id="table" colspan="4">    
            <div class="text">
                <?php echo substr($description  , 0 ,40) . "...";?>
       </td>     
            </div>
        </tr>  
        </tbody>
        </table>
        </div>
    </div>

        <br>
        <a href="singale_page.php?pid=<?php echo $post_id ;  ?>">
         
         <button class="btn btn-success" class="button">Read Mord</button>
     
        </a>
    </div>
    <br>
    <!--title  , photos and description end -->
         <?php
     }
 }
   
 require "write.html";
?>
   <center> 

    </body>
</html>