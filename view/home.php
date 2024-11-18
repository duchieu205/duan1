

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ - Nước Hoa Trẻ Em</title>
    <link rel="stylesheet" href="styles.css">
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
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="product-item">
                        <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
                        <h3><?php echo $row['name']; ?></h3>
                        <p>Giá: <?php echo number_format($row['price'], 0, ',', '.'); ?> đ</p>
                        <button>Thêm vào giỏ</button>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Hiện chưa có sản phẩm nào.</p>
            <?php endif; ?>
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
