<?php
$sqlSale = "SELECT * FROM product WHERE prd_sale = 1 ORDER BY prd_id DESC LIMIT 5";
$query = mysqli_query($conn, $sqlSale);
?>
<section class="menu" id="menu">
    <h1 class="heading"> Đang <span>Sale</span> </h1>
    <div class="box-container">
        <?php
        if (mysqli_num_rows($query) > 0) {
            while ($productSale = mysqli_fetch_assoc($query)) {
        ?>
                <div class="box">
                    <img class="items" src="images/<?php echo $productSale['prd_image']; ?>" alt="">
                    <h3><?php echo $productSale['prd_name']; ?></h3>
                    <div class="price">50.000 đ <span><?php echo number_format($productSale['prd_price'],0,',','.');?> đ</span></div>
                    <a href="modules/cart/process_cart.php?action=add&prd_id=<?php echo $productSale['prd_id']; ?>" class="btn-add add-cart">Thêm vào giỏ</a>
                </div>
        <?php
            }
        }
        ?>
    </div>
</section>