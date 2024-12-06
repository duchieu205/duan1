

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
                <li><a href="?act=shop">Trang chủ</a></li>
                <li><a href="#">iPhone</a></li>
                <li><a href="#">Oppo</a></li>
                <li><a href="#">Samsung</a></li>
                <li><a href="#">Xiaomi</a></li>
                
            </ul>
        </nav>
        <div class="search-cart">
            Xin chào
            <input type="text" placeholder="Tìm kiếm...">
            <a href="?act=cart"><i class="fas fa-shopping-cart"></i></a>
            <a href="?act=logout">Đăng xuất</a>
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
                            <form method="POST" action="?act=cart">
                                    <input type="hidden" name="ma_sanpham" value="<?= $rs->ma_sp ?>">
                                    <input name="quantity" id="quantity" type="hidden" min="1" value="1"> 
                                    <button type="submit">Thêm vào giỏ hàng</button>
                                </form>
                        </div>
            <?php endforeach; ?>
        </div>
    </section>


    <!-- Sản phẩm nổi bật -->
    


    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <p>© 2024 Trang Bán Hàng. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
