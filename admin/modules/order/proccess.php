<?php 
    include_once "../../config/db.php";

    $action = $_GET['action'];
    switch ($action) {
        case 'update':
            $orderId = $_GET['order_id'];
            $sqlUpdate= "UPDATE orders SET status=1 WHERE order_id = $orderId ";
            mysqli_query($conn,$sqlUpdate);
            header("location: ../../index.php?page=order");
            break;
            case 'update_back':
                $orderId = $_GET['order_id'];
                $sqlUpdate= "UPDATE orders SET status=0 WHERE order_id = $orderId ";
                mysqli_query($conn,$sqlUpdate);
                header("location: ../../index.php?page=order");
                break;
        case 'delete'::
            $orderId = $_GET['order_id'];
            $sqlUpdate= "DELETE FROM orders WHERE order_id = $orderId ";
            mysqli_query($conn,$sqlUpdate);
            header("location: ../../index.php?page=order");
            break;
    }

?>