<?php
include_once "config/db.php";
$sqlUser = "SELECT * FROM users ";
$resultAll = mysqli_query($conn, $sqlUser);
if (isset($_POST['sbm'])) {

    if (empty($_POST['users_name'])) {
        $errors['users_name'] = "Bạn chưa nhập tên người dùng";
    } else {
        $user_name = $_POST['users_name'];
    }

    if (empty($_POST['user_mail'])) {
        $errors['user_mail'] = "Bạn chưa nhập mail tài khoản ";
    } else {
        $user_mail = $_POST['user_mail'];
    }

    if (empty($_POST['user_pass'])) {
        $errors['user_pass'] = "Bạn chưa nhập pass tài khoản";
    } else {
        $user_pass = $_POST['user_pass'];
    }

    if (empty($_POST['user_phone'])) {
        $errors['user_phone'] = "Bạn chưa nhập số điện thoại tài khoản";
    } else {
        $user_phone = $_POST['user_phone'];
    }

    if (empty($_POST['user_address'])) {
        $errors['user_address'] = "Bạn chưa nhập địa chỉ tài khoản";
    } else {
        $user_address = $_POST['user_address'];
    }

    $user_phone =  $_POST['user_phone'];
    $user_address =  $_POST['user_address'];
    $user_name = $_POST['users_name'];
    $user_mail =  $_POST['user_mail'];
    $user_pass =  $_POST['user_pass'];
    $user_level = 2;
    if (!isset($errors['users_name']) && !isset($errors['user_mail']) && !isset($error['user_pass']) && !isset($error['user_address']) && !isset($error['user_phone'])) {
        $sqlUser = "INSERT INTO 
    users( users_name,user_mail,user_pass,user_level,user_address,user_phone)
            VALUES
           ('$user_name','$user_mail','$user_pass','$user_level','$user_address','$user_phone' )";

        if (mysqli_query($conn, $sqlUser)) {
            header("location:login.php");
        } else {
            echo "<script>alert('Thêm tài khoản không thành công!');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="css/account.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <header class="header">
        <a href="index.php" class="logo">
            <img src="images/logo_size.jpg" alt="">
        </a>
        <nav class="navbar">
            <a href="index.php">Trang Chủ</a>
            <a href="index.php?page_layout=menu">Thực Đơn</a>
            <a href="index.php#contact">Liên Hệ</a>
            <a href="index.php#about">Giới Thiệu</a>
        </nav>
        <div class="icons">
            <!-- <a href="?page_layout=cart" class="fas fa-shopping-cart" id="cart-btn"> <span>0</span> </a> -->
            <a href="login.php" id="user-btn" style="font-size: 28px"> Đăng Nhập </a>
            <div class="fas fa-bars" id="menu-btn"></div>
        </div>
    </header>
    <div style="top: 420px" class="center">
        <h1> Đăng Ký </h1>
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="txt-field">
                <input type="text" name="users_name">
                <label> Tên Tài Khoản</label>
                <div class="has-error">
                    <span> <?php echo (isset($errors['users_name'])) ? $errors['users_name'] : '' ?></span>
                </div>
            </div>
            <div class="txt-field">
                <input type="text" name="user_mail">
                <label> Email</label>
                <div class="has-error">
                    <span> <?php echo (isset($errors['user_mail'])) ? $errors['user_mail'] : '' ?></span>
                </div>
            </div>
            <div class="txt-field">
                <input type="password" name="user_pass">
                <label> Mật Khẩu</label>
                <div class="has-error">
                    <span> <?php echo (isset($errors['user_pass'])) ? $errors['user_pass'] : '' ?></span>
                </div>
            </div>
            <div class="txt-field">
                <input type="text" name="user_phone">
                <label> Số điện thoại</label>
                <div class="has-error">
                    <span> <?php echo (isset($err['user_phone'])) ? $err['user_phone'] : '' ?></span>
                </div>
            </div>
            <div class="txt-field">
                <input type="text" name="user_address">
                <label> Địa chỉ</label>
                <div class="has-error">
                    <span> <?php echo (isset($err['user_address'])) ? $err['user_address'] : '' ?></span>
                </div>
            </div>
            <input type="submit" name="sbm" value="Đăng Ký">
            <!-- <button type="submit" name="submit"> Đăng ký</button> -->
            <div class="signup-link">
                Đã có tài khoản? <a href="login.php"> Đăng Nhập</a>
            </div>
        </form>
    </div>
</body>

</html>