<?php
if (isset($_SESSION['cart'])) {
    $arr_prd_id = array();
    foreach ($_SESSION['cart'] as $prd_id => $qty) {
        $arr_prd_id[] = $prd_id;
    }
    $str_prd_id = implode(",", $arr_prd_id);
    $sqlCart = "SELECT * FROM product WHERE prd_id IN($str_prd_id)";
    $queryCart = mysqli_query($conn, $sqlCart);

    

?>
<div class="slide-top">
    <img src="images/—Pngtree—flat style fast food truck_1443087.png" alt="" class="image_top">
    <h1>Giỏ Hàng</h1>
</div>
<div class="wrapper">
    <form method="post" action="modules/cart/process_cart.php?action=submit" id="form">
    <div class="project">
        <div class="shop">
        <?php 
            if (mysqli_num_rows($queryCart)) {
                $price_unit = 0;
                $total_price = 0;
                $subtotal_price = 0;
                while ($cart = mysqli_fetch_assoc($queryCart)) {
                    
                    $price_unit = $cart['prd_price'] * $_SESSION['cart'][$cart['prd_id']];
                    $subtotal_price +=  $price_unit;
                    $sale = $subtotal_price * 0.05;
                    $total_price = $subtotal_price + 15000 - $sale;
            ?>
            <div class="box-cart">
                <img src="images/<?php echo $cart['prd_image']; ?>" alt="">
                <div class="content-cart">
                    <h2><?php echo $cart['prd_name']; ?></h2>
                    <h3>Giá: <?php echo number_format($cart['prd_price'], 0, ',', '.'); ?> đ</h3>
                    <input type="hidden" name="total" value="<?php echo $total_price; ?>">
                    <p class="unit">Số lượng: <input value="<?php echo $_SESSION['cart'][$cart['prd_id']]; ?>" name="quantity[<?php echo $cart['prd_id']; ?>]"></p>
                    <input type="hidden" name="price[<?php echo $cart['prd_id']; ?>]" value="<?php echo $cart['prd_price']; ?>">
                    <p class="btn-area">
                        <i class="fa fa-trash"></i>
                        <span class="btn-2"> <a href="modules/cart/process_cart.php?action=del&prd_id=<?php echo $cart['prd_id']; ?>"> Xóa </a> </span>
                    </p>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>
        <div class="right-bar">
            <p><span>Tính Tạm</span> <span> <?php echo number_format($subtotal_price, 0, ',', '.') ; ?>đ</span></p>
            <hr>
            <p><span>Giảm Giá (5%)</span> <span> <?php echo number_format($sale, 0, ',', '.') ; ?>đ</span></p>
            <hr>
            <p><span>Giá Ship</span> <span> 15.000đ</span></p>
            <hr>
            <p><span>Tổng</span> <span> <?php echo number_format($total_price, 0, ',', '.') ; ?>đ</span></p>
            
            <button class="btn-3" type="submit" value="update_cart" name="update_cart"> Cập Nhật </button>
            <button class="btn-3" type="submit" name="insert_cart" value="insert_cart"> Đặt Hàng </button>
        </div>
    </form>
    </div>
</div>
<?php 
    } else {
        echo '<div class="space_med"></div>';
        echo '<div class="alert alert-danger center">Có 0 sản phẩm trong giỏ hàng!</div>';
        echo '<div class="space_med"></div>';
    }
?>