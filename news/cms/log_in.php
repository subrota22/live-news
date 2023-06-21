<?php 
session_start();
require_once  "config.php";
     if(isset($_REQUEST['log_in'])){
          $user = mysqli_real_escape_string( $con, $_REQUEST['username']);
   $pass = md5($_REQUEST['password']) ;
      $select =  "SELECT * FROM hello  WHERE  Username  = '{$user}' AND  Password ='{$pass}' ";
       $result = mysqli_query($con  , $select ) or die("Query failed");
       $row_count = mysqli_num_rows ( $result );
        if( $row_count > 0 ){
      while($row = mysqli_fetch_assoc($result , MYSQLI_BOTH)){
      $_SESSION['name']  =  $row['username']; //session always take variable left side //
      $_SESSION['role']  = $row['role']; //role from table
      $_SESSION['password']  = $row['password']; //password from table 

      header("location:user.php");  //file location 
      }
        }else{
          echo "
          <script>
          alert(' You are username or password was wrong');
                  </script>
          ";
         // header("location:login.html");
        }
    }
