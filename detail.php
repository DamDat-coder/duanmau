<?php
extract($data['spct']);
?>
<nav class="main-menu">
    <ul>
        <li><a href="index.php?page=home">Trang chủ</a></li>
        <li>
            <a href="products.html">Sản phẩm</a>

        </li>
        <li><a href="#">Giới thiệu</a></li>
        <li><a href="#">Liên hệ</a></li>
    </ul>
</nav>

<div class="product-container">
    <div class="image-container">
        <img id="product-image" src="img/<?= $image ?>" alt="" />
    </div>
    <div class="details-container">
        <h4 id="product-name"><?= $name ?></h4>
        <hr class="divider" />
        <p class="price" id="product-discount-price">Giá: $<?= $price ?></p>
        <p class="original-price" id="product-price">Lượt xem: <?= $view ?></p>

        <div class="description" id="product-description">
            <p>Mô tả sản phẩm.</p>
        </div>
        <div class="quantity">
            <label for="quantity">Số lượng:</label>
            <div class="quantity-control">
                <button id="decrement">-</button>
                <span id="quantity-display">1</span>
                <button id="increment">+</button>
            </div>
        </div>
        <div class="buy">
            <a class="buy-btn" href="#" id="btn-show"><button>Thêm vào vỏ hàng</button></a>
            <a class="buy-btn" href="index.php?page=cart"><button>Mua ngay</button></a>
        </div>
    </div>
</div>

<section class="cmt">
    <iframe src="comment.php?idsp=<?=$_GET['id'] ?>" frameborder="0"></iframe>
</section>


<h2 class="featured-title">Sản phẩm liên quan</h2>
<div id="related-products-container1" class="container">
    <?php
    $listpro = $data['dsspdm'];
    foreach ($listpro as $item) {
        extract($item);
        echo '<div class="product">
            <img src="img/' . $image . '" alt="1">
    <h5>' . $name . '</h5>
    <hr class="divider">
    <p class="price">Giá: $' . $price . '</p>
    <p class="original-price"><span>Lượt xem:' . $view . '</span></p>
    <button class="details-btn"><a href="index.php?page=detail&id=' . $id . '">Chi tiết sản phẩm</a></button>
    </div>';
    };
    ?>
</div>


