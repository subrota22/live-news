<!DOCTYPE html>
<html lang="en">
<style>
    .bd {
        background-attachment: fixed;
        background-image: url("picture/f4.jpg");
        background-size: cover;
        padding: 12px;
    }
</style>

<head>
    <!--Bootstrap Link -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> User information </title>
</head>

<body class="bd">
    <br>
    <!--
<center>
    <div align="right">
        <a href="post_user.php" target="blank" class="btn btn-info">Add Catagory</a>
    </div>
<center>-->
    <table>
        <thead class="">
            <?php
            session_start();
            if ($_SESSION['ROLE'] == 1) {
                ?>

                <th class="btn btn-success mx-3"> <a href="post_page.php" target="blank"
                        style="text-decoration: none; color: aliceblue;">
                        Post </a>
                </th>
                <th id="pad" class="btn btn-success mx-3">
                    <a href="category.php" target="blank" style="text-decoration: none; color: aliceblue;"> Catagory </a>
                </th>
            <?php } else { ?>
                <th id="pad" class="btn btn-success mx-3">
                    <a href="user.php" target="blank" style="text-decoration: none; color: aliceblue;"> user </a>
                </th>
            <?php } ?>
        </thead>
    </table>
    </center>
    <center>
        <?php

        if ($_SESSION['username'] == true) {
            echo "<h3 style='color:blue;'  > Welcome this is " . $_SESSION['username'] . "</h3><br>";

            ?>
            <div align="right">
                <a href="logout.php" class="btn btn-outline-success"> Log Out </a>
            </div>
            <?php
        } else {
            header("location:login.php");
        }
        ?>
    </center>

    <?php
    //if($_SESSION['role'] && $_SESSION['role']!==1){
    if (isset($_REQUEST['updated'])) {
        echo "<h4 style='color:blue;'  > Your data is updated. </h4>";
    }
    //delete message
    if (isset($_REQUEST['deleted'])) {
        echo "<h4 style='color:blue;'  > Your data is deleted. </h4>";
    }
    ?><br>
    <table class="table table-border table-hover" id="table">
        <?php
        //show picture
//$connection = mysqli_connect("localhost" , "root" , "" , "check");
        $connection = mysqli_connect("localhost", "root", "", "live_news");
        $sql2 = "SELECT * FROM user_info limit 2";
        $query2 = mysqli_query($connection, $sql2);
        $count = mysqli_num_rows($query2);
        if ($count == true) {
            while ($row = mysqli_fetch_array($query2)) {
                ?>
                <?php
            }
        }


        //show image end 
        
        if (isset($_REQUEST['update'])) {
            echo " <h2 style='color:gree;'> You are successfull to update your data. </h2>";
        }

        $limit = 6;
        if (isset($_GET['page_number'])) {
            $page_number = $_GET['page_number'];

        } else {
            $page_number = 1;
        }
        $offset = ($page_number - 1) * $limit;
        $query = "SELECT * FROM user_info LIMIT   {$offset} , {$limit}";
        $result = mysqli_query($connection, $query);
        $row_count = mysqli_num_rows($result);

        //we should right this code after the data sql connection //
        
        //delete mutiple data start 
        /*
  if(isset($_POST[' submit_delete '])){
      $delete_name = $_POST[' delete_id '];
      $for_mark_all = implode("," , $delete_name);
      echo "$for_mark_all";
  }*/
        //delete mutiple data end
        if ($row_count > 0) {
            ?>
        <thead class="bg-dark " style="color:yellow;">
            <tr>
                <th>Serial Number </th>
                <th> ID </th>
                <th>First Name</th>
                <th>Last Name</th>
                <th> Username</th>
                <th> User Role </th>
                <th>Submited On </th>
            </tr>


        </thead>
        <?php
        $serial = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['user_id'];
            $fname = $row['first_name'];
            $lname = $row['last_name'];
            $username = $row['username'];
            $role = $row['role'];
            $data_time = $row['date_time'];
            $serial++;
            ?>


                <tbody class="text-white fs-5">
                    <tr>

                        <td>
                            <?php echo $serial; ?>
                        </td>
                        <td>
                            <?php echo $id; ?>
                        </td>
                        <td>
                            <?php echo $fname; ?>
                        </td>

                        <td>
                            <?php echo $lname; ?>
                        </td>
                        <td>
                            <?php echo $username; ?>
                        </td>
                        <td>

                            <?php
                            if ($role == 1) {
                                echo "Admin";
                            } else {
                                echo "Moderator";
                            }
                            ?>
                        </td>

                        <td>
                            <?php echo $data_time; ?>
                        </td>
                    </tr>
                </tbody>

                <?php
        }
        }

        ?>


    </table>
    </form>
    </center>

    <?php
    require_once 'config.php';
    $pag_sql = "SELECT * FROM user_info";
    $pag_query = mysqli_query($con, $pag_sql);
    $page_count = mysqli_num_rows($pag_query);
    if ($page_count == true) {
        $total_record = $page_count;
        $total_page = ceil($total_record / $limit);
        ?>
        <center>
            <?php
            if ($page_number > 1) {
                echo '   <li class="btn btn-success mx-3"> <a href="user.php?page_number=' . ($page_number - 1) . '"> Prev </a> </li>';

            }

            echo "&nbsp&nbsp";
            for ($i = 1; $i <= $total_page; $i++) {
                if ($i == $page_number) {
                    $active = "active";
                } else {
                    $active = "";
                }
                echo "<a href='user.php?page_number=" . $i . "'  class='btn btn-primary'> " . $i . " </a>";
            }
            if ($total_page > $page_number) {
                echo '   <li class="btn btn-success mx-3"> <a href="user.php?page_number=' . ($page_number + 1) . '"> Next </a> </li>';

            }

            ?>
        </center>

        <br>
    </body>

    </html>
    <?php
    }
    // }
    ?>