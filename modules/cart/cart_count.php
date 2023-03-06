    <a href="?page_layout=cart" class="fas fa-shopping-cart" id="cart-btn">
        <span>
            <?php
            if (isset($_SESSION['cart'])) {
                echo count($_SESSION['cart']);
            } else {
                echo 0;
            }
            ?>
        </span>
    </a>