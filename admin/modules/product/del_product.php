<?php 
session_start();
define("ISLOGGED", true);
include_once "../../config/db.php";

if(isset($_SESSION['user_login'])) {
    if(isset($_GET['prd_id'])) {
        $prd_id = $_GET['prd_id'];
        $sqlDel = "DELETE FROM product WHERE prd_id = $prd_id";
        if(mysqli_query($conn, $sqlDel)) {
            header("location:../../index.php?page=product");
        }else{
            echo "<script>alert('Xóa sản phẩm không thành công!');</script>";
            header("location:../../index.php?page=product");
        }
    }
}
?>