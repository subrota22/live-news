<!DOCTYPE html>
<html lang="en">

<head>
    <!--Boostrap link-->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="show.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Data page </title>
</head>

<body style="  background-color:rgba(17, 93, 235, 0.849);  padding:23px; text-align:center;">
    <br><br>
    <div id="header">

        <div>
            <center>

                <marquee behavior="scroll" direction="left">
                    <h2 id="h2" style="color:indigo;"> LIVE NEWS </h2>
                </marquee>
            </center>
        </div>
        <div class="col-md-5">
            <a href="cata.html" class="btn btn-success"> Add Catagory </a>
        </div>
        <br>
        <a href="add_user.php" class="btn btn-success"> Add User </a>
        <br> <br>
        <div style="background:green;">
            <center>
                <table>
                    <thead class="">
                        <th class="btn btn-success"> <a href="post2.php" target="blank"
                                style="text-decoration: none; color: aliceblue;">
                                Post </a>
                        </th>
                        <th id="pad" class="btn btn-success">
                            <a href="cata.html" target="blank" style="text-decoration: none; color: aliceblue;">
                                Catagory </a>
                        </th>
                        <th id="pad" class="btn btn-success">
                            <a href="admin.php" target="blank" style="text-decoration: none; color: aliceblue;"> User
                            </a>
                        </th>
                    </thead>
                </table>
            </center>
        </div>
        <br>
        <center>
            <form action="" method="POST">
                <input type="text" name="text" id="" placeholder="Search by catagory" style="height: 40px;" />
                <input type="submit" name="search" value="Search" class="btn btn-success" />
            </form>
        </center>
        <br>
        <center>
            <a href="data_info.php" class="btn btn-success">HOME</a>
        </center>
        <br>
        <?php
        require_once "config.php";

        if (isset($_REQUEST['search'])) {
            $user_name = $_REQUEST['text'];

            $select = "SELECT * FROM `add_cata` WHERE `Category` LIKE '%$user_name%' ";

            $query = mysqli_query($con, $select);
            $row_count = mysqli_num_rows($query);

            if (isset($_REQUEST['updated'])) {
                echo "<h2 style='color:darkblue;'> You are success to update your data </h2>";
            }
            if ($row_count == true) {
                ?>
                <br>

                <br><br>
                <form method="post">
                    <center>
                        <?php
                        $serial = 0;
                        while ($row = mysqli_fetch_assoc($query)) {
                            $db_id = $row['ID'];
                            $title = $row['Title'];
                            $cata = $row['Category'];
                            $des = $row['Description'];
                            $image = $row['Image'];

                            $Sent_date_time = $row['Date_Time'];

                            $serial++;
                            ?>
                            <br>
                            <center>
                                <div>
                                    <p placeholder="your catagory">

                                        <?php echo "<h3 style='color:blue;' > Your catagory is : " . $cata . "</h3>"; ?>
                                </div>
                                <hr style="border: 3px solid blue;">
                            </center>
                            <br>
                            <div align="right">
                                <div id="text-content">
                                    <?php echo $des; ?>
                                </div>
                            </div>
                            <div id="image" align="left">

                                <img src="image/<?php echo $image; ?> " width="240px" />
                            </div>
                            <?php
                        }
                        ?>
                        <?php
            } else {
                echo "This type of data not have in our room";
            }
        }
        ?>
        </form>
</body>

</html>