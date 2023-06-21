<?php
require_once "config.php";
if(isset($_REQUEST['search'])){
    $search = mysqli_real_escape_string($con , $_REQUEST['text-search'] ) ;
    $select = "SELECT * FROM `post` WHERE `category` LIKE '%$search%' ";
    $query = mysqli_query($con , $select);
    if($query){
        header("location:live_news.php");
    }else{
      ?>
<script type="text/javascript">
     alert('This type of data not available in our side');
     window.location="live_news.php";
</script>
      <?php
    }
}
?>