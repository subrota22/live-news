<html>
<style>
    #bd {
        padding: 12px;
        background-color: indigo;
        color: white;
    }
</style>

<head>
    <!--Bootstrap Link -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> post page </title>
</head>

<body id="bd">
    <br>
    <center>
        <?php
        session_start();
        if ($_SESSION['username'] == true) {
            echo "<h3 style='color:white;'  > Welcome this is " . $_SESSION['username'] . "</h3><br>";
            ?>
            <div align="right">
                <a href="post_logout.php" class="btn btn-outline-danger"> Log Out </a>
            </div>
            <?php
        } else {
            header("location:post_page.php");
        }
        ?>
    </center>
    <?php
    $limit = 6;
    if (isset($_GET['page_number'])) {
        $page_number = $_GET['page_number'];

    } else {
        $page_number = 1;
    }
    $offset = ($page_number - 1) * $limit;
      require_once 'config.php' ; 
    //$select = "SELECT * FROM thanks  LIMIT {$offset} , {$limit}"
    if ($_SESSION['ROLE'] = '1') {
        $select = "SELECT  post.post_id , post.post_date , post.author, post.description , post.title, post.post_image, category.category_name , user_info.username 
            FROM post LEFT JOIN  category ON post.category = category.category_id
           LEFT JOIN user_info ON post.post_id = user_info.user_id
       ORDER BY post.post_id DESC LIMIT  {$offset} , {$limit}"; //DESC LIMIT {$offset} , {$limit}
    } elseif ($_SESSION['ROLE'] = '0') {

        $select = "SELECT  post.post_id, post.post_date,  post.author, post.description , post.post_image, post.title, category.category_name , user_info.username 
     FROM post LEFT JOIN  category ON post.category = category.category_id
         LEFT JOIN user_info ON post.post_id = user_info.user_id
            WHERE post.author = '{$_SESSION['user_id']}'
                ORDER BY post.post_id DESC LIMIT {$offset} , {$limit}";
    }
    $query = mysqli_query($con, $select);
    $row_count = mysqli_num_rows($query);
    if ($row_count > 0) {
        ?>
        <center>
            <a href="show_add.php" target="blank" class="btn btn-warning col-md-20"> Show Add Category</a>
            <a href="add_category.html" target="blank" class="btn btn-info col-md-18"> Add Category </a>
            <a href="post_user.php" target="blank" class="btn btn-info col-md-25"> Add user post </a>
            <a href="live_news.php" target="blank" class="btn btn-info col-md-25">  Home </a>
            <br><br>
            <table class="table">
                <thead class="bg-dark text-white">
                    <th>Serial Number </th>
                    <th>ID</th>
                    <th> Title </th>
                    <th> Category </th>
                    <th>Date</th>
                    <th>Author </th>
                    <th>Post image </th>
                    <th>Update </th>
                    <th>Delete</th>
                </thead>
                <?php

                $serial = 0;
                while ($row = mysqli_fetch_assoc($query)) {
                    $serial++;
                    ?>
                    <tbody>
                        <td>
                            <?php echo $serial; ?>
                        </td>
                        <td>
                            <?php echo $row['post_id']; ?>
                        </td>
                        <td>
                            <?php echo $row['title']; ?>
                        </td>
                        <td>
                            <?php echo $row['category_name']; ?>
                        </td>
                        <td>
                            <?php echo $row['post_date']; ?>
                        </td>
                        <td>
                            <?php echo $row['author']; ?>
                        </td>
                        <td>
                            <img src="uploads/<?php echo $row['post_image'] ?>" style="height:45; width: 45px;" class="rounded"
                                alt="post" />
                        </td>
                        <td> <a href="update.php?update_id=<?php echo $row['post_id'];?>"
                                onclick="return confirm('Are you want to update this date?')" class="btn btn-success">Update</a>
                        </td>
                        <td> <a href="delete.php?delete_id=<?php echo $row['post_id'] ?>&image_name=<?php echo $row['post_image']; ?>"
                                onclick="return confirm('Are you want to delete this date?')" class="btn btn-danger">Delete </a>
                        </td>
                    </tbody>
                    <?php

                }
    } else {
        ?>
                <h2 class="text-danger fs-2 fw-bold text-center my-2"> Post not found !! </h2>
                <?php
    }
    ?>
    </center>
    </table>
    <br><br>
    <?php
    $con = mysqli_connect("localhost", "root", "", "live_news");
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
                echo '<a href="post_page.php?page_number=' . ($page_number - 1) . '"  class="btn btn-success"> Prev </a> </li>';

            }

            echo "&nbsp&nbsp";
            for ($i = 1; $i <= $total_page; $i++) {
                if ($i == $page_number) {
                    $active = "active";
                } else {
                    $active = "";
                }
                echo "<a href='post_page.php?page_number=" . $i . "'  class='btn btn-primary mx-2'> " . $i . " </a>";
            }
            if ($total_page > $page_number) {
                echo '   <a href="post_page.php?page_number=' . ($page_number + 1) . '"  class="btn btn-success"> Next </a> </li>';

            }
    }

    ?>
    </center>
</body>

</html>