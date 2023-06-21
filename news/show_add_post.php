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
    <title> User information of category post with update </title>
</head>

<body class="bd">
    <br><br>
    <center>
        <?php
        session_start();


        if ($_SESSION['username'] == true) {
            echo "<h3 style='color:blue;'  > Welcome " . $_SESSION['username'] . "</h3><br>";

            ?>
            <div align="left">
                <a href="logout.php" class="btn btn-outline-success"> Log Out </a>
            </div>
            <?php
        } else {
            header("location:login.php");
        }

        ?>
    </center>
    <br>
    <center>
        <div align="right">
            <a href="add_category.html" target="blank" class="btn btn-info">Add Catagory</a>
        </div>
        <div align="right" class="col-md-2 col-sm-2">
            <a href="post_user.php" target="blank" class="btn btn-info"> Post new one </a>
        </div>
        <center>

            <br>
            <table class="table table-border table-hover" id="table">
                <?php
                require_once "config.php" ;
                $sql2 = "SELECT * FROM post limit 2";
                $query2 = mysqli_query($con, $sql2);
                $count = mysqli_num_rows($query2);
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
                $query = "SELECT * FROM post LIMIT   {$offset} , {$limit}";
                $result = mysqli_query($connection, $query);
                $row_count = mysqli_num_rows($result);
                if ($row_count > 0) {
                    ?>
                <thead class="bg-dark" style="color:yellow;">

                    <th>Serial Number </th>
                    <th> ID</th>
                    <th> Title </th>
                    <th>Description </th>

                    <th> Category </th>
                    <th>Post Date </th>
                    <th> Author </th>
                    <th> Image </th>
                    <th>Update </th>
                    <th> Delete </th>
                </thead>
                <?php
                $serial = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['post_id'];
                    $title = $row['title'];
                    $descript = $row['description'];
                    $category = $row['category'];
                    $date = $row['post_date'];
                    $author = $row['author'];
                    $image = $row['post_image'];
                    $serial++;
                    ?>
                    <tbody class="text-success">
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
                                <?php echo $descript; ?>
                            </td>
                            <td>
                                <?php echo $category; ?>
                            </td>
                            <td>
                                <?php echo $date; ?>
                            </td>
                            <td>
                                <?php echo $author; ?>
                            </td>
                            <td> <img src="uploads/<?php echo $image; ?> " class="rounded-circle w-50"
                                    style="border:3px solid #ff12cd; height:45px; width: 45px;" />
                            </td>
                            <td>
                                <a onclick=" return confirm('Are you want to update this page. Function will not available for gender and country');"
                                    href="update.php?update=<?php echo $id; ?> " class="btn btn-success">Update</a> &nbsp;
                            </td>
                            <td>
                                <a onclick="  return confirm('Are you want to delete this data.');"
                                    href="delete.php?delete=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
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
        $pag_query = mysqli_query($connection, $pag_sql);
        $page_count = mysqli_num_rows($pag_query);
        if ($page_count == true) {
            $total_record = $page_count;
            $total_page = ceil($total_record / $limit);
            ?>
            <center>
                <?php
                if ($page_number > 1) {
                    echo '   <li class="btn btn-success"> <a href="show_add_post.php?page_number=' . ($page_number - 1) . '"> Prev </a> </li>';
                }
                echo "&nbsp&nbsp";
                for ($i = 1; $i <= $total_page; $i++) {
                    if ($i == $page_number) {
                        $active = "active";
                    } else {
                        $active = "";
                    }
                    echo "<a href='show_add_post.php?page_number=" . $i . "'  class='btn btn-primary'> " . $i . " </a>";
                }
                if ($total_page > $page_number) {
                    echo '   <li class="btn btn-success"> <a href="show_add_post.php?page_number=' . ($page_number + 1) . '"> Next </a> </li>';
                }
                ?>
            </center>
            <br>
    </body>

    </html>
    <?php
        }
        ?>