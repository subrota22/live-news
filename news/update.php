<!DOCTYPE html>
<html lang="en">
<style>
  #form {
    background-color: rgba(251, 148, 315, 0.5);
    color: green;
    font-size: x-large;
    font-family: Arial, Helvetica, sans-serif;
    padding: 27px;
  }

  #text {
    background-color: rgb(0, 162, 255);
    color: rgb(119, 128, 0);
    font-size: x-large;
    font-family: cursive;
    padding: 17px;
  }

  #body {
    background-image: url("../picture/nature.gif");
    background-size: cover;
    background-attachment: fixed;
    padding: 12px;
    color: lime;
  }
</style>

<head>
  <!--Bootstrap link-->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> update post page...</title>
</head>

<body id="body">
  <br><br>
  <center>
    <div class="col-sm-23 col-md-21 col-lg-12 w-50" id="text">
      <h2>Update Page</h2>
    </div>
    <?php
    require_once "config.php";
    if (isset($_REQUEST['update_id'])) {
      $receved_id = $_REQUEST['update_id'];
      $select = "select * from post where post_id='$receved_id'";
      $result = mysqli_query($con, $select);
        $row = mysqli_fetch_assoc($result) ;
          ?>
          <form action="update_code.php" method="post" id="form" enctype="multipart/form-data" class="was-validated w-50">
            <div class="">
              <label for="title"> Title </label>
              <input type="text" value="<?php echo $row['title'] ?>" name="title" id="title" placeholder="Enter your title"
                class="form-control" required />
            </div>
            <div>
              <label for="Description"> Description </label>
              <textarea name="description3" rows="5" class="form-control" placeholder="Enter your description."
                value=" <?php echo $row['description'] ?> ">
               <?php echo $row['description'] ?>
              </textarea>
            </div>

            <div>
              <?php
              require_once "config.php";

              ?>
              <label for="catagory"> Catagory </label>
              <select name="category" class="form-control" value="<?php echo $row['category'] ?>">
                <option selected disabled> Select your category </option>
                <?php
                $select = "select * from category";
                $query = mysqli_query($con, $select) or die("Query failed");
                $count = mysqli_num_rows($query);
                if ($count > 0) {

                  ?>
                  <?php
                  while ($row1 = mysqli_fetch_assoc($query)) {
                    echo "<option value='{$row1['category_id']}'> 
                               {$row1['category_name']}
                              </option>";
                  }
                }
                ?>
              </select>
            </div>
            <br>
            <div>
              <input type="file" name="file" class="form-control pb-2" required/>
              <div>You mus be choice jpg , jpeg and png file lower than 2 mb </div>
              <img src="uploads/<?php echo $row['post_image'] ?>" style="height: 68px; width: 68px;" class="rounded"/>
            </div>
            <div>
            </div>
            <br>
            <input type="submit" name="post" value=" Update " id="click" class="form-control w-100 btn-info" />
            <br>
            <input type="hidden" name="hidden_id" value="<?php echo $receved_id; ?>" />
            <input type="reset" value="Delete" class="form-control btn-danger w-100" />
            <br><br>
            <div>
              &nbsp;&nbsp;&nbsp; <input type="checkbox" style="height: 28px; width: 28px;" id="check2"
                class="form-check-input" required />
              &nbsp;&nbsp;&nbsp; <label for="check2" class="form-check-label">Agree to terms and condition.</label>
            </div>
            <br>

            &copy; copy write by subrota chandra sharker
            <br>
            <center>
          </form>
          <?php
        }
    ?>