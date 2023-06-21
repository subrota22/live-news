<?php
session_start();
session_destroy();
session_unset();
header("location:post_login.php");
?>