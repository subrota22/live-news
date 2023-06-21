<!DOCTYPE html>
<html lang="en">
    <style>
        .body{
            background-attachment: fixed;
            background-size:cover;
            background-image:url("picture/f2.jpg");
            padding: 12px;
        }
        #header{
            text-align: right;
            background-color: rgba(34,26,178,0.7);
            padding: 12px;
        }
        #h2{
            color: lime;
            font-family: cursive;
            line-height: -10px;
        }
#pad{
    margin: 41px;
}
 #td{
     background-color: royalblue; 
     padding: 12px;
 }
    </style>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>  Webpage information of user  </title>
</head>
<body class="body">

    <br>
    <?php
    session_start();
       echo "<center> <h2 style='color:blue'> welcome this is " .$_SESSION['username'] . "</h2> </center>"; 

    //if($_SESSION['username']==true){ 
       // echo "welcome this is" . $_SESSION['username'] ;
        ?>
        <div class="col-lg-24 " style="text-align:right;">
            <a href="logout.php" class="btn btn-danger">Log Out</a>
        </div>
        <?php
   // }else{
       // header("location:Login.html");
  //  }

?>
    <br><br>
    <div id="header">
      
    <div>
     <center>
        <h2 id="h2"> NEWS </h2>
     </center>
    </div>
   <a href="add_user.php" class="btn btn-success"> Add User </a>
   <br>   <br>
<div style="background:green;">
<center>
   <table>
       <thead> 
       <th  class="btn btn-success"> <a href="post2.php" target="blank"
        style="text-decoration: none; color: aliceblue;" >
         Post </a> 
          </th>
           <th  id="pad" class="btn btn-success"> 
               <a href="catagory.php" target="blank" style="text-decoration: none; color: aliceblue;"> Catagory </a> 
           </th>
           <th  id="pad" class="btn btn-success"> User  </th>
   
       </thead>
     </table>
</center>
</div>
<br>
    <center>
     <table class=" table">
<?php 
$limit = 6 ; 
if(isset($_POST['page_number'])){
    $page_number = $_POST['page_number'];
}else{
    $page_number = 1;
}
$offset = ($page_number - 1 ) * $limit ; 
require_once "config.php";
$select = "select * from hello limit {$offset} , {$limit}";
$query = mysqli_query($con , $select);
$row_count = mysqli_num_rows($query);
if($row_count > 0){
    ?>
   <thead class="bg-dark text-white">
            
            <th > SERIAL NUMBER  </th>
            <th > ID NUMBER  </th>
            <th> FIRST  NAME  </th>
            <th> LAST   NAME  </th>
            <th> USERNAME  </th>
            <th> EMAIL  </th>
            <th> USER ROLE   </th>
            <th> DATE AND TIME </th>
            <th>  DELETE   </th>
            <th>  UPDATE   </th>
   
        </thead>

<?php
$serial = 0;
    while($row = mysqli_fetch_assoc($query)){
        $db_id  =  $row['ID'];
       $fname =  $row['First_Name'];
       $lname =  $row['Last_Name'];
       $username =  $row['Username'];
       $email  =  $row['Email'];
       $user_role  =  $row['Role'];
       $time  =  $row['Date_Time'];
       $serial++;
       ?>
   <tbody class="text-white">
   <td>  <?php  echo $serial ; ?>  </td>
             <td>  <?php  echo $db_id ; ?>  </td>
             <td> <?php  echo $fname ; ?>   </td>
             <td> <?php  echo $lname ; ?>    </td>
             <td> <?php  echo $username ; ?>    </td>
             <td> <?php  echo $email ; ?>     </td>
             <td>  <?php  echo $user_role ; ?>    </td>
             <td>  <?php  echo $time ; ?>    </td>
             <td>  <a onclick="return confirm('Are you want to delete this data?')"
              href="delete.php?delete=<?php echo $db_id ; ?>" class="btn btn-danger"> Delete </a>  </td>
             <td>   
                 <a onclick="return confirm('Are you want to update this data?')" 
                  href="update.php?update=<?php echo $db_id ; ?>" class="btn btn-success"> Update </a>  </td>
         </tbody>
       <?php
     ///  session_start();
    }
}
//$db_id =  $_SESSION['ID'];
?>
</table>
</center>  
</div>
<br>
<center>
<?php

//pagination
require_once "config.php";
$select2 = "SELECT * FROM hello";
$query2 = mysqli_query($con , $select2);
$row_count2 = mysqli_num_rows($query2);
if($row_count2 ==true ){
    $total_records = $row_count2;
    $total_page = ceil($total_records / $limit );

      if($page_number > 1 ){
        echo "<a href='data_info.php?page_number=".($page_number - 1)."' class='btn btn-success'> Prev </a> ";
      }
    for($i=1; $i<$total_page; $i++){
        //
        if($i==$page_number){
            $active =  "active";
        }else{
            $active = "";
        }
        //
        echo "<a href='data_info.php?page_number=".$i."'  class='btn btn-danger' > ".$i." </a> ";
    }
    if($total_records > $page_number ){
        echo "<a href='data_info.php?page_number=".($page_number + 1)."' class='btn btn-success'> Next </a> ";
      }
}
//pagination end

?>
</center>  
    <br><br>
</body>
</html>