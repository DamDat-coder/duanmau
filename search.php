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

    <h2 class="featured-title">Kết quả tìm kiếm</h2>
    <div id="featured-products" class="container">
        <?php
        // kiểm tra mảng rỗng
        if (!empty($data['products'])) { 
            foreach ($data['products'] as $product) {
                echo '<div class="product">
                        <img src="img/' . htmlspecialchars($product['image']) . '" alt="' . htmlspecialchars($product['name']) . '">
                        <h5>' . htmlspecialchars($product['name']) . '</h5>
                        <hr class="divider">
                        <p class="price">Giá: $' . htmlspecialchars($product['price']) . '</p>
                        <p class="original-price"><span>Lượt xem: ' . htmlspecialchars($product['view']) . '</span></p>
                        <button class="details-btn"><a href="index.php?page=detail&id=' . htmlspecialchars($product['id']) . '">Chi tiết sản phẩm</a></button>
                    </div>';
            }
        } else {
            echo '<p>Không tìm thấy sản phẩm nào phù hợp với từ khóa.</p>';
        }
        ?>
    </div>


