<?php
session_start();
require_once "config.php";
if (isset($_REQUEST['post'])) {
          $title = mysqli_real_escape_string($con, $_REQUEST['title']);
       $description = mysqli_real_escape_string($con, $_REQUEST['description3']);
    $category = mysqli_real_escape_string($con, $_REQUEST['category']);
    //image start 
    $image = $_FILES['file'];
      $image_name = $image['name'];
         $image_type = $image['type'];
          $image_tmp = $image['tmp_name'];
             $image_error = $image['error'];
              $image_size = $image['size']; //na ty t e s --> name type tmp_name error size
          $file_ext = explode(".", ".$image_name");
         $acctualExt = strtolower(end($file_ext));
    $extensions = array("jpg", "png", "jpeg");
    if (in_array($acctualExt, $extensions)) {
        if ($image_size < 2000000) {
            $new_name = uniqid() . ".$acctualExt";
            if (empty($image_error)) {
                $location = "uploads/" . $new_name;
                move_uploaded_file($image_tmp, $location);
                echo "<img src='$location'/>";
            } else {
                ?>
                <script type="text/javascript">
                    alert("You have some error at the time of uploading");
                    window.location = "update.php";
                </script>
                <?php
            }
        } else {
            ?>
            <script type="text/javascript">
                alert("Your file is too big please select 2 mb or lower");
                window.location = "update.php";
            </script>
<?php
        }
    } else {
        ?>
        <script type="text/javascript">
            alert("This extention are not allowed please select jpg , jpeg or png type file");
            window.location = "update.php";
        </script>
<?php
    }
    //image end 
    $hidden_id = $_REQUEST['hidden_id'];
    $update = "UPDATE post SET title='$title' , description='$description'
       ,category='$category' , post_image='$new_name'  WHERE post_id = '$hidden_id' ";
    $result = mysqli_query($con, $update);
    if ($result == true) {
        header("location:category.php");
    } else {
        echo "You are unable to update";
    }
    mysqli_close($con);
    die();
}
?>