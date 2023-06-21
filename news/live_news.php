<!DOCTYPE html>
<html lang="en">
<style>
    #div2 {
        background-color: rgba(0, 0, 255, 0.5);
        height: auto;
        width: 745px;
        padding: 5px;
        border-radius: 12px;
    }

    #div2:hover {
        border: 2px solid rgb(140, 10, 202, 0.5);
        transition: border 1s;
    }
</style>

<head>
    <link rel="stylesheet" href="page.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> All user comment </title>
</head>

<body id="body">
    <br><br>
    <div align="left">
        <a href="post_user.php" class="btn btn-warning">Post new one</a>
        <a href="user.php" class="btn btn-warning">User</a>
        <a href="logout.php" class="btn btn-danger">Log Out</a>
    </div>
    <!--navbar start  -->
    <br>
    <center>
        <div class="bg-dark text-white p-12px">
            <div class="navbar">
                <?php
                require_once 'config.php';
                $select_category = "SELECT category_name FROM category";
                $category_query = mysqli_query($con, $select_category);
                while ($row = mysqli_fetch_array($category_query)) {
                    ?>
                    <p class="btn btn-info">
                        <?php echo $row['category_name']; ?>
                    </p>
                    <?php
                }
                ?>
            </div>
        </div>
    </center>
    <br>
    <!--navbar end  -->
    <table align="right">
        <tr>
            <td id="search" colspan="2">
                <!--search option start -->
                <div align="left">
                    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" class="was-validate mt-3">
                        <span>
                            <input type="search" id="txt" class="w-100 form-control" placeholder="Search by category"
                                name="text_search" required />

                        </span>
            <td>
                <span>
                    <input type="submit" value="Search" name="search" class="btn btn-success mt-3">
                </span>
                </form>
                </div>
        <tr>

    </table>
    <!--search option end -->
    <?php
    require_once "config.php";
    if (isset($_REQUEST['search'])) {
        $search = mysqli_real_escape_string($con, $_REQUEST['text_search']);
        $select = "SELECT * FROM `post` WHERE `category` LIKE '%$search%'";
        $query = mysqli_query($con, $select) or die("Query failed");
        $row_count = mysqli_num_rows($query);
        if ($row_count > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $title = $row['title'];
                $description = $row['description'];
                $category = $row['category'];
                $image = $row['post_image'];
                ?>
                <br>
                <!--title  , photos and description strat -->
                <div align="left" id="div2">
                    <div id="div">
                        <div>
                            <center>
                                <h2>
                                    <caption>
                                        <?php echo $category; ?>
                                    </caption>
                                </h2>
                            </center>
                            <table>
                                <tbody>
                                    <tr id="table">
                                        <td id="table" colspan="4">
                                            <div class="w-50 picture ">
                                                <img src="uploads/<?php echo $image; ?>" alt="user post"
                                                    style="height: 128px; width: 129px; border:2px solid blue;" />
                                            </div>
                                        </td>
                                        <td id="table" colspan="4">
                                            <div class="text">
                                                <?php echo substr($description, 0, 35) . "..." ?>
                                        </td>
                        </div>
                        </tr>
                        </tbody>
                        </table>
                        <div align="right">
                            <br>
                            <a href="../live/singale_page.php?pid=<?php echo $row['post_id'] ?>">
                                <p class="btn  btn-dark ">Read more </p>
                            </a>
                        </div>
                    </div>
                </div>
                </div>
                <!--title  , photos and description end -->
                <?php
            }
        } else {
            ?>
        <script>
            alert("No data found !!");
        </script>
    <?php
        }
    }
    ?>

</body>

</html>