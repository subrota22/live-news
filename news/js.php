<!DOCTYPE html>
<html lang="en">
    
<head>
    <link rel="stylesheet" href="show.css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>  show live data of news  </title>
</head>
<body class="body">
    <br>

    <form action="js.php" method="post">
    <input type="text" id="right-side" name="text" id="search" placeholder="Search by catagory" class="hover"/>

<input type="submit" value="Search"  id="right-side" name="search" class="btn btn-success"/>

</form>

    <br>
<div style="background-color: rgba(12,78,45,0.7); padding: 12px;"> 

    <br> 
        <div class="col-lg-24 " style="text-align:right;">
            <a href="logout.php" class="btn btn-danger">Log Out</a>
        </div>
  
    <br><br>
    <div id="header">
      
    <div>
     <center>
      
        <marquee behavior="scroll" direction="left">
        <h2 id="h2"> LIVE NEWS </h2>    
</marquee>
     </center>
    </div>
   <div class="col-md-5">
   <a href="cata.html" class="btn btn-success"> Add Catagory </a>
   </div>
    <br>
   <a href="add_user.php" class="btn btn-success"> Add User </a>
   <br>   <br>
<div style="background:green;">
<center>
   <table>
       <thead class="">
       <th  class="btn btn-success"> <a href="post2.php" target="blank"
        style="text-decoration: none; color: aliceblue;" >
         Post </a> 
          </th>
           <th  id="pad" class="btn btn-success"> 
               <a href="cata.html" target="blank" style="text-decoration: none; color: aliceblue;"> Catagory </a> 
           </th>
           <th  id="pad" class="btn btn-success"> 
           <a href="admin.php" target="blank" style="text-decoration: none; color: aliceblue;"> User </a>        
        </th>
       </thead>
     </table>
</center>
</div>
<br>
    <div id="right-side">

<?php
   require_once "config.php";

if(isset($_REQUEST['search'])){

   $catagory =  $_REQUEST['text'];

//$select = "select * from add_cata";
$select = "SELECT * FROM `add_cata` WHERE `Catagory` LIKE '% $catagory%' ";
$result = mysqli_query($con , $select);
$row_count = mysqli_num_rows($result);
if($row_count > 0 ){
    while($row = mysqli_fetch_assoc($result)){

  $id = $row ['ID'] ;
  $des = $row ['Description'];
  $image = $row['Image'];
  $cata = $row['Catagory'];
?>
<br>
<div align="right">
    <div id="text-content">

       <?php   
echo $des ;
       ?>
        </div>
        <div align="left">
    <div id="image">
<img src="image/<?php echo $image ; ?> "/>
        </div>
    
        <div>
        </div>
<?php
    }
}
}
?>
<br><br>