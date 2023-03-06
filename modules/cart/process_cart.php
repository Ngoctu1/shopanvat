<?php 
    session_start();

    $action = $_GET['action'];

    switch ($action) {
        case 'add':
            $prd_id = "";
            if(isset($_GET['prd_id'])) {
                $prd_id = $_GET['prd_id'];
            }
            if(isset($_SESSION['cart'][$prd_id])){
                $_SESSION['cart'][$prd_id]++;
            }else{
                $_SESSION['cart'][$prd_id] =  1;
            }
            // echo "<pre>";
            // print_r($_SESSION['cart']);
            // exit();
            header("location: ../../index.php?page_layout=cart");
            break;
        
        case 'submit':
            // Cập nhật giỏ hàng - Kiểm tra người dùng bấm vào nút cập nhật
            if(isset($_POST['update_cart'])) {
                foreach ($_POST['quantity'] as $prd_id => $qty) {
                    $_SESSION['cart'][$prd_id] = $qty;
                }
                header("location: ../../index.php?page_layout=cart");
            }
            // Mua hàng - Kiểm tra người dùng bấm vào nút mua hàng.

            if(isset($_POST['insert_cart'])) {
       
                include_once "../../config/db.php";
                date_default_timezone_set("Asia/Ho_Chi_Minh");
                //Thêm dữ liệu vào bảng order
                $user_name = $_SESSION['user_login']['users_name'];
                $user_email = $_SESSION['user_login']['user_mail'];
                $user_phone = $_SESSION['user_login']['user_phone'];
                $user_address = $_SESSION['user_login']['user_address'];

                $status = 0;
                $total = $_POST['total'];
                $created = date('Y-m-d H:i:s');
                $sqlOrder = "INSERT INTO orders(user_name,user_email,user_phone,user_address,status,amount,created)
                VALUES('$user_name','$user_email','$user_phone','$user_address',$status,$total,'$created')";
                mysqli_query($conn, $sqlOrder);

                $orderId = mysqli_insert_id($conn);
                //Thêm dữ liệu vào bảng detail order
                $sqlOrderDetail = "INSERT INTO orderdetail(order_id,prd_id,qty,price) VALUES ";
                foreach ($_SESSION['cart'] as $prd_id => $qty) {
                    $price = $_POST['price'][$prd_id]; //lấy giá sp dựa vào mảng $_POST['price']
                    $sqlOrderDetail .= "($orderId,$prd_id, $qty, $price),";
                }
                $sqlOrderDetail = rtrim($sqlOrderDetail,",");
                

                mysqli_query($conn, $sqlOrderDetail);
              
               

               
 unset($_SESSION['cart']);
                header("location: ../../index.php?page_layout=success");
                    
               


            }
            break;
        case 'del':
            if(isset($_SESSION['cart'][$_GET['prd_id']])){
                unset($_SESSION['cart'][$_GET['prd_id']]);
            }

            if(empty($_SESSION['cart'])){
                unset($_SESSION['cart']);
            }
            header("location: ../../index.php?page_layout=cart");
            break;
    }
    //thêm sản phẩm vào giỏ hàng
    //cập nhật giỏ hàng
    //xóa sản phẩm khỏi giỏ hàng
    //mua hàng (insert sản phẩm mua hàng vào csdl)
?>