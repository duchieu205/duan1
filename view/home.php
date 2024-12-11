<?php
   
    if (isset($_SESSION['email'])) {
        header("Location: ?act=shop");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Web Bán Hàng</title>
    <!-- Thêm CSS -->
    <link rel="stylesheet" href="css/style.css?v=<?php echo time() ?>">
    <!-- Thêm thư viện icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo">
            <img src="img/1.png" alt="logo">
        </div>
        <nav>
            <ul>
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Giới thiệu</a></li>
                <li><a href="#">Liên hệ</a></li>

                
            </ul>
        </nav>
        <div class="search-cart">
            <a href="?act=signup">Sign Up</a>
            <a href="?act=signin">Sign In</a>
            <input type="text" placeholder="Tìm kiếm...">
            <a href="?act=cart"><i class="fas fa-shopping-cart"></i></a>
            
        </div>
    </header>

    <!-- Banner -->
    <section class="banner">
        <img src="img/banner.png" alt="Banner" />
    </section>

    <!-- Flash Sale -->
    <section class="flash-sale">
        <h2>Flash Sale</h2>
        <div class="product-grid">
            <?php foreach ($result as $rs) : ?>
                <div class="product-card">
                            <img src="<?= BASE_URL . $rs->image ?>" alt="Sản phẩm">
                            <h3>
                                <a href="?act=detail&id=<?= $rs->ma_sp ?>"><?= $rs->name ?></a>
                            </h3>
                            <p>Giá: <span><strong><?= number_format($rs->gia) . " Đ" ?></strong></span></p>
                            <a href="?act=detail&id=<?= $rs->ma_sp ?>"><button class="dathang" name="mua_sp">Xem chi tiết</button></a>
                        </div>
            <?php endforeach; ?>
        </div>
    </section>


    <!-- Sản phẩm nổi bật -->
    <!-- <section class="featured-products">
    <h2>Sản phẩm nổi bật</h2>
    <div class="product-grid">
        <?php  ?>
              <div class="product-card">
                        <img src="img/2.webp" alt="Sản phẩm">
                        <h3>
                            <a href="?act=detail&id=">Điện thoại iPhone 14 Pro</a>
                        </h3>
                        <p>Giá: <span>20,000,000đ</span></p>
                        <a href="?act=detail&id=" class="btn">MUA NGAY</a>
                </div>;
    </div>
</section> -->


    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <p>© 2024 Trang Bán Hàng. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
