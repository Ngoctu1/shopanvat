<?php 
    session_start();
    if(isset($_SESSION['user_login1'])) {
        unset($_SESSION['user_login1']);
            //session_destroy();
    }
    header("location: index.php");

?>