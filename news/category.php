<!DOCTYPE html>
<html lang="en">
<style>
    .bd {
        background-attachment: fixed;
        background-image: url("../picture/flower-garden.gif");
        background-size: cover;
    }

    .opacity {
        background-color: rgba(451, 24, 25, 0.4);
    }
</style>

<head>
    <!--Bootstrap Link -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> add category data </title>
</head>

<body class="bd">
    <div class="opacity">
        <br><br>
        <center>
            <?php
            session_start();
            if ($_SESSION['username'] == true) {
                echo "<h3 style='color:green;'  > Welcome this is " . $_SESSION['username'] . "</h3><br>";

                ?>
                <div align="left">
                    <a href="logout.php" class="btn btn-outline-success mx-2"> Log Out </a>
                </div>
                <?php
            } else {
                header("location:login.php");
            }

            ?>
        </center>
        <center>
            <div align="right" class="col-md-14">
                <a href="add_user.php" target="blank" class="btn btn-info mx-2">Add user</a>
            </div>
            <center>
                <br>
                <table>
                    <thead class="">
                        <th class="btn btn-success mx-3"> <a href="post_page.php" target="blank"
                                style="text-decoration: none; color: aliceblue;">
                                Post </a>
                        </th>
                        <th id="pad" class="btn btn-success mx-3">
                            <a href="category.php" target="blank" style="text-decoration: none; color: aliceblue;">
                                Catagory
                            </a>
                        </th>
                        <th id="pad" class="btn btn-success mx-3">
                            <a href="user.php" target="blank" style="text-decoration: none; color: aliceblue;"> User
                            </a>
                        </th>
                        <th id="pad" class="btn btn-success mx-3">
                            <a href="show_add_post.php" target="blank" style="text-decoration: none; color: aliceblue;">
                                Show add pot </a>
                        </th>
                        <th id="pad" class="btn btn-success mx-3">
                            <a href="live_news.php" target="blank" style="text-decoration: none; color: aliceblue;">
                            Home </a>
                        </th>
                    </thead>
                </table>
            </center>
            <br>
            <table class="table table-border table-hover" id="table">

                <?php

                if ($_SESSION['ROLE'] == 1) {

                    //$connection = mysqli_connect("localhost" , "root" , "" , "check");
                    require_once "config.php";
                    $sql2 = "SELECT * FROM post";
                    $query2 = mysqli_query($con, $sql2);
                    $count = mysqli_num_rows($query2);
                    if ($count == true) {
                        while ($row = mysqli_fetch_array($query2)) {
                            ?>
                            <?php
                        }
                    }

                    require_once "config.php";
                    if (isset($_REQUEST['update'])) {
                        echo " <h2 style='color:gree;'> You are successfull to update your data. </h2>";
                    }
                    $limit = 5;
                    if (isset($_GET['page_number'])) {
                        $page_number = $_GET['page_number'];

                    } else {
                        $page_number = 1;
                    }
                    $offset = ($page_number - 1) * $limit;
                    $query = "SELECT * FROM post LIMIT   {$offset} , {$limit}";
                    $result = mysqli_query($con, $query);
                    $row_count = mysqli_num_rows($result);
                    if ($row_count > 0) {
                        ?>
                <thead class="bg-dark" style="color:yellow;">
                    <tr>
                        <td>Serial Number </td>
                        <td> ID </td>
                        <td> Title </td>
                        <td> Description </td>
                        <td> Role </td>
                        <td>Submited On </td>
                        <th> Picture </th>
                        <td colspan="2">Action</td>
                    </tr>
                </thead>
                <?php
                $serial = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['post_id'];
                    $title = $row['title'];
                    $description = $row['description'];
                    $category = $row['category'];
                    $post_date = $row['post_date'];
                    //   $author   = $row['author'];
                    $image = $row['post_image'];
                    $serial++;
                    ?>
                    <tbody class="text-white">
                        <tr>
                            <td>
                                <?php echo $serial; ?>
                            </td>
                            <td>
                                <?php echo $id; ?>
                            </td>
                            <td>
                                <?php echo $title; ?>
                            </td>
                            <td>
                                <?php echo $description; ?>
                            </td>
                            <td>
                                <?php
                                if ($_SESSION['ROLE'] == 0) {
                                    echo "Moderator";
                                }
                                if ($_SESSION['ROLE'] == 1) {
                                    echo "Admin";
                                }
                                ?>
                            </td>
                            <td>
                                <?php echo $post_date; ?>
                            </td>
                            <td> <img src="uploads/<?php echo $image; ?> " class="rounded-circle"
                                    style="border:3px solid #ff12cd; height:45px; width:45px;" />
                            </td>
                            <td>
                                <a onclick=" return confirm('Are you want to update this page. Function will not available for gender and country');"
                                    href="update.php?update=<?php echo $id; ?> " class="btn btn-success mx-3">Update</a>
                                &nbsp;
                            </td>
                            <td>
                                <a onclick="  return confirm('Are you want to delete this data.');"
                                    href="delete.php?delete=<?php echo $id; ?> & image=<?php echo $image; ?> "
                                    class="btn btn-danger">Delete</a>

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
        $pag_sql = "SELECT * FROM post";
        $pag_query = mysqli_query($con, $pag_sql);
        $page_count = mysqli_num_rows($pag_query);
        if ($page_count == true) {
            $total_record = $page_count;
            $total_page = ceil($total_record / $limit);
            ?>
            <center>
                <?php
                if ($page_number > 1) {
                    echo ' <a href="category.php?page_number=' . ($page_number - 1) . '" class="btn btn-success mx-3"> Prev </a> ';
                }
                echo "&nbsp&nbsp";
                for ($i = 1; $i <= $total_page; $i++) {
                    if ($i == $page_number) {
                        $active = "<p class='active'> $i </p>";
                    } else {
                        $active = "";
                    }
                    echo "<a href='category.php?page_number=" . $i . "'  class='btn btn-primary mx-2'> " . $i . " </a>";
                }
                if ($total_page > $page_number) {
                    echo ' <a href="category.php?page_number=' . ($page_number + 1) . '" class="btn btn-success mx-3"> Next </a> ';

                }

                ?>
            </center>

            <br>
        </div>
    </body>

    </html>
    <?php
        }
                }
                ?>