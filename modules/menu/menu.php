<?php
$rowPerPage = 20;
$sqlProduct = "SELECT prd_id FROM product";
$resultAll = mysqli_query($conn, $sqlProduct);

$totalRecords = mysqli_num_rows($resultAll);
$totalPage = ceil($totalRecords / $rowPerPage);

if (isset($_GET['current_page'])) {
    $current_page = $_GET['current_page'];
} else {
    $current_page = 1;
}

if ($current_page < 1) {
    $current_page = 1;
}
if ($current_page > $totalPage) {
    $current_page = $totalPage;
}

$start = ($current_page - 1) * $totalPage;
$sqlPagination = "SELECT * FROM product INNER JOIN category ON product.cat_id = category.cat_id ORDER BY prd_id DESC LIMIT $start, $rowPerPage";
$resultPagination = mysqli_query($conn, $sqlPagination);


?>

<img src="images/2110.w023.n001.1293B.p1.1293.jpg" alt="" class="image_top">

<section class="menu" id="menu">

    <h1 class="heading"> Thực <span>Đơn</span> </h1>

    <div class="box-container">
        <?php
        if (mysqli_num_rows($resultPagination) > 0) {
            while ($product = mysqli_fetch_assoc($resultPagination)) {
        ?>
                <div class="box">
                    <img class="items" src="images/<?php echo $product['prd_image']; ?>" alt="">
                    <h3><?php echo $product['prd_name']; ?></h3>
                    <div class="price"><?php echo number_format($product['prd_price'], 0, ',', '.'); ?> đ</div>
                    <a href="modules/cart/process_cart.php?action=add&prd_id=<?php echo $product['prd_id']; ?>" class="btn-add add-cart">Thêm vào giỏ</a>
                </div>
        <?php
            }
        }
        ?>
    </div>
    <div class="panel-footer">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <!-- Hiển thị nút bấm trở về trang trước -->
                <?php if ($current_page > 1) { ?>
                    <li class="page-item"><a class="page-link" href="index.php?page_layout=menu&current_page=<?php echo $current_page - 1; ?>">&laquo;</a></li>
                <?php } else { ?>
                    <li class="page-item disabled"><a class="page-link">&laquo;</a></li>
                <?php } ?>
                <!-- Hiển thị các nút phân trang -->
                <?php for ($i = 1; $i <= $totalPage; $i++) {
                    if ($i >= $current_page - 2 && $i <= $current_page + 2) {
                ?>

                        <?php if ($i == $current_page) { ?>
                            <li class="page-item active"><a class="page-link" href="index.php?page_layout=menu&current_page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php } else { ?>
                            <li class="page-item"><a class="page-link" href="index.php?page_layout=menu&current_page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php } ?>

                <?php
                    }
                }
                ?>
                <!-- Hiển thị nút chuyển trang kế tiếp -->
                <?php if ($current_page < $totalPage) { ?>
                    <li class="page-item"><a class="page-link" href="index.php?page_layout=menu&current_page=<?php echo $current_page + 1; ?>">&raquo;</a></li>
                <?php } else { ?>
                    <li class="page-item disabled"><a class="page-link">&raquo;</a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>

</section>
<script src="./script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>