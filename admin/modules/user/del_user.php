<?php 
session_start();
define("ISLOGGED", true);
include_once "../../config/db.php";
    if(isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
        $sqlDel = "DELETE FROM users WHERE user_id = $user_id";
         if(mysqli_query($conn, $sqlDel)) {
             header("location:../../index.php?page=user");
         }else{
             echo "<script>alert('Xóa tài khoản không thành công!');</script>";
             header("<location:../../index.php?page=user");
         }
    }

?>