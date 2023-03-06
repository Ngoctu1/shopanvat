<?php 
    session_start();
    if(isset($_SESSION['user_login'])) {
        unset($_SESSION['user_login']);
        unset($_SESSION['cart']);
        //session_destroy();
    }
    header("location: login.php");

?>