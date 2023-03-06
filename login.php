<?php
session_start();
include_once "config/db.php";
unset($_SESSION['cart']);
$sqlUser = "SELECT * FROM users ";
$resultAll = mysqli_query($conn, $sqlUser);

//if(!defined("ISLOGGED")) { 
//   header("location: index.php");
//}

if (isset($_POST['login'])) {
    //validate email
    if (empty($_POST['email'])) {
        $error['email'] = "Bạn chưa nhập email";
    } else {
        $email = ($_POST['email']); //nếu người dùng đã nhập email thì gán giá trị cho biến $email
    }

    //validate password
    if (empty($_POST['password'])) {
        $error['password'] = "Bạn chưa nhập password";
    } else {
        $password = $_POST['password'];
    }


    if (!isset($error['email']) && !isset($error['password'])) {

        $sqlLogin = "SELECT * FROM users WHERE user_mail = '$email' && user_pass='$password' ";
        $result = mysqli_query($conn, $sqlLogin);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            $user_login_info = mysqli_fetch_assoc($result);
            $_SESSION['user_login'] = $user_login_info;
            header("location: masterpage.php ");
        } else {

            $error['invalid'] = '<div class="alert alert-danger">Tài khoản không hợp lệ !</div>';
            unset($_SESSION['user_login']);
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
    <title>Đăng Nhập</title>
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
            <a href="register.php" id="user-btn" style="font-size: 28px" > Đăng Ký </a>
            <div class="fas fa-bars" id="menu-btn"></div>
        </div>
    </header>
    <div class="center">
        <h1> Đăng Nhập </h1>
        <form role="form" action="" method="post">

            <div class="txt-field">
                <input type="text" name="email">
                <label> Email</label>
                <span style="color:red">
                    <?php if (isset($error['email']))  echo $error['email']; ?></span>
            </div>
            <div class="txt-field">
                <input type="password" name="password">
                <label> Mật Khẩu</label>
                <span style="color:red"><?php if (isset($error['password']))  echo $error['password']; ?></span>
            </div>
            <input type="submit" name="login" value="Đăng Nhập">
            <div class="signup-link">
                Chưa có tài khoản? <a href="register.php"> Đăng Ký</a>
            </div>
        </form>
    </div>
</body>

</html>