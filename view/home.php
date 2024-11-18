

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time() ?>">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo"></div>
        <nav>
            <ul>
                <li><a href="#">Trang Chủ</a></li>
                <li><a href="#">Iphone</a></li>
                <li><a href="#">SamSung</a></li>
                <li><a href="#">Oppo</a></li>
                <li><a href="#">Xiaomi</a></li>
            </ul>
        </nav>
        <div class="search-bar">
            <input type="text" placeholder="Tìm kiếm sản phẩm...">
            <button>Tìm</button>
        </div>
    </header>

    <!-- Banner -->
    <section class="banner">
        <h1></h1>
        <p></p>
        <button></button>
    </section>

    <!-- Sản phẩm nổi bật -->
    <section class="featured-products">
        <h2>Sản phẩm nổi bật</h2>
        <div class="product-list">
            <?php foreach ($result as $rs) { ?>
                    <div class="product-item">
                        <img src="<?= BASE_URL . $rs->image ?>" alt="<?=$rs->name; ?>">
                        <h3><?= $rs->name ?></h3>
                        <p>Giá: <?= number_format($rs->gia); ?> đ</p>
                        <button>Thêm vào giỏ</button>
                    </div>
                <?php }?>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>\</p>
        <div class="social-links">
            <a href="#">Facebook</a> | <a href="#">Instagram</a>
        </div>
    </footer>

</body>
</html>