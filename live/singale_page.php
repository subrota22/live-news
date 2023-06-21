<!DOCTYPE html>
<html lang="en">

<head>
    <!--Bootstrap Link -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="page.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> singale user page </title>
</head>

<body id="bd" class="bg-info">
    <br>
    <?php
    require "header.php";

    session_start();
    //$post_id = $_REQUEST['user_id'];
    
    require_once "../news/config.php";
    if (isset($_REQUEST['pid'])) {
        $post_id = $_REQUEST['pid'];
        $select = "SELECT * FROM post WHERE post_id='$post_id'";
        $query = mysqli_query($con, $select);
        $row_count = mysqli_num_rows($query);
        if ($row_count > 0) {
            ?>
            <?php
            $serial = 0;
            while ($row = mysqli_fetch_assoc($query)) {
                $post_id = $row['post_id'];
                $title = $row['title'];
                $description = $row['description'];
                $date = $row['post_date'];
                $image = $row['post_image'];
                $author = $row['author'];
                $serial++;
                ?>
                <!--title  , photos and description strat -->
                <center>
                    <div>
                        <?php echo "<i style='color:white; font-size : 24px;     font-family: cursive;'> Author : <span class='text-warning'> " . $author . " </span> </i>"; ?>
                        <hr style="border: 2px solid blue; border-bottom:none;">
                        </hr>
                    </div>
                    <br>
                    <div align="left" id="div3" class="bg-white rounded">
                        <div align="right">
                            <?php echo "<p style='font-size: 24px; color:indigo;'> Post date : " . $date . "</p>"; ?>
                        </div>
                        <br>
                        <div id="div" class="bg-dark rounded">
                            <center>
                                <h2>
                                    <h3 style="color:white;"> Title </h3>

                                    <br>
                                    <caption>
                                        <?php echo $title; ?>
                                    </caption>
                                </h2>
                            </center>
                            <br>
                            <table>
                                <tbody>
                                    <tr id="table">
                                        <td id="table" colspan="4">
                                            <div class="w-50 picture3 ">
                                                <a href="live_news.php?id=<?php echo $post_id; ?>">
                                                    <a href="search_news.php">
                                                        <img src="../news/uploads/<?php echo $image; ?>" alt="user post"
                                                            class="image-style" />
                                                    </a>

                                            </div>
                                        </td>
                                        <td id="table" colspan="4">
                                            <div class="text">

                                                <b style="color:white;"> Description </b>
                                                <br><br>
                                                <?php echo $description; ?>
                                        </td>
                        </div>
                        </tr>
                        </tbody>
                        </table>
                    </div>
                    <a href="../news/live_news.php">
                        <button class="btn btn-success mx-2 my-4">Back to this page </button>
                    </a>
                    </div>
                    </div>
                    <!--title  , photos and description end -->
                    <?php

            }
        }
    }
    include("write.html");
    ?>

    </center>
    </table>
    <br><br>
    </center>
</body>

</html>