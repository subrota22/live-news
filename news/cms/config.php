<?php
//call the server panel for the host with control panel//
  $host_name = "localhost";
    $user_name = "root";
      $control_panel_pwd = "";
        $database_name ="news";
        //database connection with mysql  or online
   $con = mysqli_connect("$host_name" , "$user_name" , "$control_panel_pwd" , "$database_name");
?>