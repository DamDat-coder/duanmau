<nav class="main-menu">
    <ul>
        <li><a href="index.php?page=home">Trang chủ</a></li>
        <li>
            <a href="products.html">Sản phẩm</a>
            <ul class="sub-menu">
                <?php
                $listcate = $data['dsdm'];
                foreach ($listcate as $item) {
                    extract($item);
                    echo '
                        <li><a href="index.php?page=procate&id=' . $id . '">' . $name . '</a></li>
            ';
                };
                ?>
            </ul>
        </li>
        <li><a href="#">Giới thiệu</a></li>
        <li><a href="#">Liên hệ</a></li>
    </ul>
</nav>

<h2 class="featured-title">Sản phẩm nổi bật</h2>
<div id="featured-products" class="container">
    <?php
    $listview = $data['dsview'];
    foreach ($listview as $item) {
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

<h2 class="featured-title">Sản phẩm sắp hết</h2>
<div id="featured-products" class="container">
    <?php
    $listview = $data['dssh'];
    foreach ($listview as $item) {
        extract($item);
        echo '<div class="product">
                <img src="img/' . $image . '" alt="1">
        <h5>' . $name . '</h5>
        <hr class="divider">
        <p class="price">Giá: $' . $price . '</p>
        <p class="original-price"><span>Còn:' . $amount . '</span></p>
        <button class="details-btn"><a href="index.php?page=detail&id=' . $id . '">Chi tiết sản phẩm</a></button>
        </div>';
    };
    ?>
</div>  

<h2 class="featured-title">Sản phẩm </h2>
<div id="featured-products" class="container">
    <?php
    $listpro = $data['dssp'];
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