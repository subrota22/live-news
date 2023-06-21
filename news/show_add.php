<!DOCTYPE html>
<html lang="en">
<style>
    #body {
        background-attachment: fixed;
        background-image: url("picture/f2.jpg");
        background-size: cover;
    }
</style>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> show add category </title>
</head>

<body id="body">
    <br><br>
    <center>
        <a href="post_user.php" class="btn btn-info"> Add post number </a>
        <a href="live_news.php" class="btn btn-info mx-2"> Home </a>
        <br><br>
        <?php if (isset($_GET['added'])) {
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </symbol>
                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                </symbol>
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </symbol>
            </svg>
            <div class="alert alert-success d-flex mx-2 align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div class="mx-2">
                    Post added successfully !!
                </div>
            </div>
            <?php
        } ?>
        <table class="table">
            <?php
            require_once "config.php";
            $select = "SELECT * FROM category";
            $result = mysqli_query($con, $select) or die("Query Failed");
            $row_count = mysqli_num_rows($result);
            if ($row_count > 0) {
                ?>
                <thead class="bg-dark text-white">
                    <th> Serial Number </th>
                    <th>Category ID </th>
                    <th> Category Name </th>
                    <th> Post </th>
                    <th> Date </th>
                </thead>
                <?php
                $serial = 0;

                while ($row = mysqli_fetch_assoc($result)) {
                    $ca_id = $row['category_id'];
                    $ca_name = $row['category_name'];
                    $post = $row['post'];
                    $date = $row['date'];
                    $serial++;
                    ?>
                    <tbody class="text-white">
                        <td>
                            <?php echo $serial; ?>
                        </td>
                        <td>
                            <?php echo $ca_id; ?>
                        </td>
                        <td>
                            <?php echo $ca_name; ?>
                        </td>
                        <td>
                            <?php echo $post; ?>
                        </td>
                        <td>
                            <?php echo $date; ?>
                        </td>
                    </tbody>
                    <?php
                }
            }
            ?>
        </table>
    </center>
    <br><br>
   
  </body>
</body>

</html>