
<!DOCTYPE html>
<html lang="en">
<head>
    <!--Boostrap link-->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Data page </title>
</head>
<body style="  background-color:rgba(17, 93, 235, 0.849);  padding:23px; text-align-center;">
<br><br>
<center>
<form action="" method="POST">
    <input type="text" name="text" id="" placeholder="Search by name" style="height: 40px;"/>
    <input type="submit" name="search" value="Search" class="btn btn-success"/>
    </form>
</center>
<br>
<center>
    <a href="page.php" class="btn btn-success">HOME</a>
</center>
    <br>
<?php
// echo "Welcome";
 //pagination 
 //pg end
require_once "config.php";
//multi dlt msg start

if(isset($_REQUEST['delete_multiple_data'])){
    echo "<h2 style='color:blue;'>  You have success to delete your multiple data. </h2>";
}
//multi dlt msg end
if(isset($_REQUEST['search'])){
    $user_name = $_REQUEST['text'];

$select = "SELECT * FROM `add_cata` WHERE `Catagory` LIKE '%$user_name%' ";
 // $query4 = mysqli_query($con , $select);
$query = mysqli_query($con,$select);
  $row_count = mysqli_num_rows($query);

  if(isset($_REQUEST['updated'])){
    echo "<h2 style='color:darkblue;'> You are success to update your data </h2>";
  }
      //multi delete form data start 
      if(isset($_POST['delt'])){
        $de_mult= $_POST['check_data'];
          $re_del = implode(',' , $de_mult);
    $de_qu = "DELETE FROM wish_info WHERE ID IN ($re_del)";
          $delete_query= mysqli_query($con ,$de_qu);
          if($delete_query==true){
              header("location:search.php?delete_multiple_data");
          }else{
              echo "Not delete your multiple data";
          }
      }
      //multi delete form data end 
  if($row_count==true){
   ?>
  <br>
 
   <!-- <a href="Add_user.php" class="btn btn-warning">Add user </a>-->
 <br><br>
  <form method="post">
   <center>
       <table class="table ">
<thead class="text-white bg-dark">
    <th> Serial Number: </th>
    <th>ID</th>
    <th>Title </th>
    <th>Catagory </th>

    <th> Description  </th>
    <th>Profile Picture </th>
    <th>Sent date and time </th>
    <th colspan="2">ACTION QUERY</th>
    <th>
    <center>
        <marquee behavior="alternate" direction="left">
        <b style="color:lime;">    First select one or more  checkbox than click on yellow button </b>
   </marquee>
        <br>
    <input type="submit" value="DELETE MULTIPLE DATA"
    onclick="return confirm('Are you wan to delete all this data')" class="btn btn-warning" name="delt"/>
</center>
    </th>
</thead>
      <?php
      $serial = 0;
      while($row  = mysqli_fetch_assoc($query)){
          $db_id =  $row['ID'];
           $title  = $row['Title'];
            $cata  = $row['Catagory'];
           //   $password = $row['Password'];
            $des  = $row['Description'];
               $image   = $row['Image'];
           
            $Sent_date_time = $row['Date_Time'];
            
$serial++;
?>
<tbody style="color:darkblue;">
           <tr>
           <td> <?php echo $serial; ?>   </td>
               <td> <?php echo $db_id; ?>   </td>
               <td> <?php echo $title; ?>   </td>
               <td> <?php echo $cata; ?>   </td>
               <td> <?php echo $des; ?>   </td>
               <td> <img src="image/<?php  echo $image; ?> "
                class="rounded-circle " width="50px"
                style="border:3px solid blue;"/>
               <td>  <?php echo $Sent_date_time ; ?>  </td>
          <td> <a onclick="return confirm('Are you want to update this data.')" 
      class="btn btn-info"     href="su.php?update=<?php echo $db_id ; ?>">Updated</a></td>
            <td>  <a onclick="return confirm('Are you want to delete this data forever.')" 
            class="btn btn-danger"      href="search_delete.php?delete=<?php echo $db_id; ?>">Delete</a>
        </td>
    <td>
            <center>
        <input type="checkbox" name="check_data[]" value="<?php echo $db_id; ?> "
      style="height: 28px; width: 28px;"/>
      </center>
    </td>
  
        </tr>
       </tbody>
<!-- <img src="picture/<?php //way to picture show // echo $profile_pic; ?>" -->
<?php
    }
      ?>
      <?php
  }else{
 echo "Unfortunatelay your all data has been deleted";
  }
      }
?>
   </table>
   </form>
</center> 
<br><br>
</body>
</html>
