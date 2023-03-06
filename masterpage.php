<?php
 if(!defined("ISLOGGED")) {
 		header("location: index.php");
 	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>An Vat Viet</title>
    <link rel="stylesheet" href="css/newmain.css">
    <link rel="stylesheet" href="css/newbootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body>

    <!-- header section -->
    <header class="header">
        <a href="index.php" class="logo">
            <img src="images/logo_size.jpg" alt="">
        </a>
        <nav class="navbar">
            <a href="index.php">Trang Chủ</a>
            <a href="?page_layout=menu">Thực Đơn</a>
            <a href="index.php#contact">Liên Hệ</a>
            <a href="index.php#about">Giới Thiệu</a>
        </nav>
        <div class="icons">
            <div class="fas fa-search" id="search-btn"></div>
            <?php include_once "modules/cart/cart_count.php"; ?>
            <!-- <a href="modules/customer/login.php" class="fas fa-user" id="user-btn"></a> -->

            <?php  if(isset($_SESSION['user_login'])) {?>
           
           <?php include_once "modules/cart/cart_count.php"; ?>
           <a> <?php  echo $_SESSION['user_login']['users_name'];?> </a>
           <a href="logout.php" class="fa fa-sign-out" id="user-btn"></a> 


           <?php
           } 
           ?>
           <?php  if(!isset($_SESSION['user_login'])) {?>
               <a href="login.php" class="fas fa-shopping-cart" id="cart-btn">
               <a href="login.php"  ><?php echo "Đăng Nhập"?> </a> 
           <?php
           }  
           ?>


                <div class="fas fa-bars" id="menu-btn"></div>
        </div>
        <?php include_once "modules/search/search_box.php"; ?>
    </header>
    <div class="space"></div>
    <?php
    if (isset($_GET['page_layout'])) {
        switch ($_GET['page_layout']) {
            case 'menu':
                include_once "modules/menu/menu.php";
                break;
            case 'cart':
                include_once "modules/cart/cart.php";
                break;
            case 'success':
                include_once "modules/cart/success.php";
                break;
            case 'search':
                include_once "modules/search/search.php";
                break;
            case 'account':
                include_once "modules/customer/account.php";
                break;
        }
    } else {
        include_once "modules/main/home.php";
        include_once "modules/main/sales.php";
        include_once "modules/main/featured.php";
        include_once "modules/main/review.php";
        include_once "modules/contact/contact.php";
        include_once "modules/main/about.php";
    }

    ?>
    <!-- footer section -->
    <section class="footer">
        <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
            <a href="#" class="fab fa-pinterest"></a>
        </div>
        <div class="links">
            <a class="active" href="index.php">Trang Chủ</a>
            <a href="?page_layout=menu">Thực Đơn</a>
            <a href="index.php#contact">Liên Hệ</a>
            <a href="index.php#about">Giới Thiệu</a>
        </div>
        <div class="credit">Địa chỉ: <span>Số 123 Đường ABC BK</span> | SĐT: 123456789</div>
    </section>

</body>

</html>
<script src="script/newscript.js"></script>
<script src="https://kit.fontawesome.com/5d1e1d669e.js" crossorigin="anonymous"></script>