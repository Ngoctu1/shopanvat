<?php 
    $sqlFeatured = "SELECT * FROM product WHERE prd_featured = 1 ORDER BY prd_id DESC LIMIT 3";
    $query = mysqli_query($conn, $sqlFeatured);
?>


<!-- products section -->
<section class="products" id="products">
    <h1 class="heading"> Sản phẩm <span>Bán chạy</span> </h1>
    <div class="box-container">
        <?php 
            if(mysqli_num_rows($query) > 0) {
                while ($productFeatured = mysqli_fetch_assoc($query)) {
        ?>
            <div class="box">
                <div class="icons">
                    <a href="modules/cart/process_cart.php?action=add&prd_id=<?php echo $productFeatured['prd_id']; ?>" class="fas fa-shopping-cart add-cart"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="images/<?php echo $productFeatured['prd_image']; ?>" alt="">
                </div>
                <div class="content">
                    <h3><?php echo $productFeatured['prd_name']; ?></h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price"><?php echo number_format($productFeatured['prd_price'],0,',','.');?> đ</div>
                </div>
            </div>
        <?php
                }
            }
        ?>
        
    </div>
</section>